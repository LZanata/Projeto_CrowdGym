<?php 
include '../php/cadastro_login/check_login_funcionario.php'; 
require_once '../php/conexao.php';

// Obtém o ID da academia a partir da sessão do gerente
$academia_id = $_SESSION['Academia_id'];

// Inicializa a variável $result como null
$result = null;

// Captura o termo de pesquisa, se existir
$pesquisa = isset($_GET['pesquisa']) ? trim($_GET['pesquisa']) : '';

try {
    // Base da consulta SQL
    $sql = "
        SELECT 
            aluno.id AS aluno_id,
            aluno.nome AS aluno_nome,
            aluno.email AS aluno_email,
            assinatura.id AS assinatura_id,
            assinatura.data_inicio,
            assinatura.data_fim,
            assinatura.status,
            planos.nome AS plano_nome,
            planos.valor AS plano_valor,
            planos.duracao AS plano_duracao
        FROM assinatura
        INNER JOIN aluno ON assinatura.Aluno_id = aluno.id
        INNER JOIN planos ON assinatura.Planos_id = planos.id
        INNER JOIN academia ON planos.Academia_id = academia.id
        WHERE academia.id = ? AND assinatura.status = 'ativo'";

    // Adiciona condição para pesquisa, se aplicável
    if (!empty($pesquisa)) {
        $sql .= " AND aluno.nome LIKE ?";
    }

    $query = $conn->prepare($sql);

    // Define os parâmetros para a consulta
    if (!empty($pesquisa)) {
        $pesquisa = "%$pesquisa%";
        $query->bind_param("is", $academia_id, $pesquisa);
    } else {
        $query->bind_param("i", $academia_id);
    }

    $query->execute();
    $result = $query->get_result();
} catch (Exception $e) {
    echo "Erro ao executar a consulta: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alunos Academia</title>
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/funcionario/alunos.css">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
  <?php include '../partials/header_funcionario.php'; ?> <!-- Inclui o cabeçalho -->
  <main>
    <!--Nesta tela tem que aparecer: Matricular Aluno - Alunos Matriculados - Pagamentos Pendentes dos Alunos - Informações dos Alunos Presentes-->
    <div class="container">
            <div class="userlist">
                <div class="userlist-header">
                    <div class="userlist-title">
                        <h1>Alunos da Academia</h1>
                    </div>
                    <div class="search-form">
                        <form method="GET" action="">
                            <input type="text" name="pesquisa" placeholder="Digite o nome do aluno"
                                value="<?php echo isset($_GET['pesquisa']) ? htmlspecialchars($_GET['pesquisa']) : ''; ?>" />
                            <button type="submit">Pesquisar</button>
                        </form>
                    </div>
                </div>
                <div class="userlist-table">
                    <table>
                        <tbody>

                            <?php if ($result->num_rows > 0): ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nome do Aluno</th>
                                            <th>Email</th>
                                            <th>Plano</th>
                                            <th>Valor</th>
                                            <th>Data de Início</th>
                                            <th>Data de Término</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $result->fetch_assoc()): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['aluno_nome']); ?></td>
                                                <td><?php echo htmlspecialchars($row['aluno_email']); ?></td>
                                                <td><?php echo htmlspecialchars($row['plano_nome']); ?></td>
                                                <td>R$ <?php echo number_format($row['plano_valor'], 2, ',', '.'); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($row['data_inicio'])); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($row['data_fim'])); ?></td>
                                                <td><?php echo htmlspecialchars($row['status']); ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p>Nenhum aluno matriculado na sua academia no momento.</p>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
  </main>
  <?php include '../partials/footer.php'; ?> <!-- Inclui o rodapé -->
</body>

</html>