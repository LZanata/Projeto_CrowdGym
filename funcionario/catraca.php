<?php 
include '../php/cadastro_login/check_login_funcionario.php'; 
include '../php/conexao.php'; 

function registrarEntrada($cpf, $academia_id, $conexao) {
    // Obter o ID do aluno pelo CPF
    $query = $conexao->prepare("SELECT id FROM aluno WHERE cpf = ?");
    $query->bind_param("s", $cpf);
    $query->execute();
    $resultado = $query->get_result();
    
    if ($resultado->num_rows == 0) {
        return "Aluno não encontrado.";
    }
    
    $aluno = $resultado->fetch_assoc();
    $aluno_id = $aluno['id'];

    // Verificar se já existe uma entrada sem saída
    $query = $conexao->prepare("
        SELECT * FROM entrada_saida
        WHERE Aluno_id = ? AND Academia_id = ? AND DATE(data_entrada) = CURDATE() AND data_saida IS NULL
    ");
    $query->bind_param("ii", $aluno_id, $academia_id);
    $query->execute();
    $resultado = $query->get_result();

    if ($resultado->num_rows > 0) {
        return "Entrada já registrada para hoje.";
    }

    // Inserir nova entrada
    $query = $conexao->prepare("
        INSERT INTO entrada_saida (data_entrada, Academia_id, Aluno_id)
        VALUES (NOW(), ?, ?)
    ");
    $query->bind_param("ii", $academia_id, $aluno_id);
    if ($query->execute()) {
        return "Entrada registrada com sucesso.";
    } else {
        return "Erro ao registrar entrada: " . $conexao->error;
    }
}

function registrarSaida($cpf, $academia_id, $conexao) {
    // Obter o ID do aluno pelo CPF
    $query = $conexao->prepare("SELECT id FROM aluno WHERE cpf = ?");
    $query->bind_param("s", $cpf);
    $query->execute();
    $resultado = $query->get_result();

    if ($resultado->num_rows == 0) {
        return "Aluno não encontrado.";
    }

    $aluno = $resultado->fetch_assoc();
    $aluno_id = $aluno['id'];

    // Atualizar saída para o registro mais recente
    $query = $conexao->prepare("
        UPDATE entrada_saida
        SET data_saida = NOW()
        WHERE Aluno_id = ? AND Academia_id = ? AND DATE(data_entrada) = CURDATE() AND data_saida IS NULL
    ");
    $query->bind_param("ii", $aluno_id, $academia_id);
    if ($query->execute() && $query->affected_rows > 0) {
        return "Saída registrada com sucesso.";
    } else {
        return "Nenhuma entrada aberta encontrada.";
    }
}

// Processar o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = $_POST['cpf'];
    $academia_id = $_POST['academia_id'];
    $acao = $_POST['acao'];

    if ($acao === 'entrada') {
        $mensagem = registrarEntrada($cpf, $academia_id, $conexao);
    } elseif ($acao === 'saida') {
        $mensagem = registrarSaida($cpf, $academia_id, $conexao);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catraca</title>
  <link rel="stylesheet" href="../css/index.css">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
  <!--Nesta tela deverá aparecer os dados de funcionamento da catraca e as opções de liberar e fechar acesso da catraca-->
  <?php include '../partials/header_funcionario.php'; ?> <!-- Inclui o cabeçalho -->
  <main>
    <h1>Simulador de Catraca</h1>
    <?php if (isset($mensagem)): ?>
      <p><strong><?= htmlspecialchars($mensagem) ?></strong></p>
    <?php endif; ?>
    <form method="POST">
      <label for="cpf">CPF do Aluno:</label>
      <input type="text" name="cpf" id="cpf" required>
      <input type="hidden" name="academia_id" value="1"> <!-- ID da academia fixa ou dinâmica -->
      <button type="submit" name="acao" value="entrada">Registrar Entrada</button>
      <button type="submit" name="acao" value="saida">Registrar Saída</button>
    </form>
  </main>
  <?php include '../partials/footer.php'; ?> <!-- Inclui o rodapé -->
</body>

</html>