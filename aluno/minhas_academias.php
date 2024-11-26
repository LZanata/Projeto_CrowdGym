<?php
require_once '../php/cadastro_login/check_login_aluno.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Minhas Academias</title>
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/aluno/minhas_academias.css">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
  <!--Quando clicar nesta opção tem que aparecer as academias que ele está matriculado no sistema e quando clicar na academia deverá mostrar os dados de quantas pessoas estão treinando e os planos assinados nesta academia. -->
  <?php include '../partials/header_aluno.php'; ?> <!-- Inclui o cabeçalho -->
  <main>
    <?php
    require_once '../php/cadastro_login/check_login_aluno.php';
    require_once '../php/conexao.php';

    $aluno_id = $_SESSION['aluno_id']; // ID do aluno logado

    // Consulta para verificar as academias onde o aluno possui assinatura
    $query = $conexao->prepare("
    SELECT a.nome AS nome_academia, ass.status, ass.data_fim, ass.Planos_id AS plano_id
    FROM assinatura ass
    JOIN planos p ON ass.Planos_id = p.id
    JOIN academia a ON p.Academia_id = a.id
    WHERE ass.Aluno_id = ? AND ass.status = 'ativo' AND ass.data_fim >= CURDATE()
");
    $query->bind_param("i", $aluno_id);
    $query->execute();
    $result = $query->get_result();

    // Verifica se o aluno possui academias registradas
    if ($result->num_rows > 0): ?>
      <h2>Minhas Academias</h2>
      <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="academia">
            <h3><?php echo htmlspecialchars($row['nome_academia']); ?></h3>
            <p>Status: <?php echo htmlspecialchars($row['status']); ?></p>
            <p>Data de término: <?php echo htmlspecialchars($row['data_fim']); ?></p>
            <?php if ($row['status'] === 'ativo'): ?>
              <form action="../php/aluno/cancelar_assinatura.php" method="post">
                <input type="hidden" name="plano_id" value="<?php echo htmlspecialchars($row['plano_id']); ?>">
                <button type="submit" onclick="return confirm('Tem certeza que deseja cancelar esta assinatura?')">Cancelar Assinatura</button>
              </form>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
          <div class="alert alert-success">
            Assinatura cancelada com sucesso!
          </div>
        <?php elseif (isset($_GET['error'])): ?>
          <div class="alert alert-danger">
            Erro ao cancelar assinatura. Tente novamente.
          </div>
        <?php endif; ?>
      </ul>
    <?php else: ?>
      <h2>Nenhuma Academia Registrada</h2>
      <p>Você ainda não possui assinaturas de academias no momento.</p>
      <a href="buscar_academias.php">Clique aqui para buscar uma academia</a>
    <?php endif; ?>
  </main>
  <?php include '../partials/footer.php'; ?> <!-- Inclui o rodapé -->
</body>

</html>