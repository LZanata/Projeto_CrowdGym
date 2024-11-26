<?php
require_once '../php/cadastro_login/check_login_aluno.php';
require_once '../php/conexao.php';

$academia_id = isset($_GET['academia_id']) ? (int) $_GET['academia_id'] : 0;

// Verifica se a academia existe
$queryAcademia = $conexao->prepare("SELECT * FROM academia WHERE id = ?");
$queryAcademia->bind_param("i", $academia_id);
$queryAcademia->execute();
$academia = $queryAcademia->get_result()->fetch_assoc();

if (!$academia) {
    echo "Academia não encontrada!";
    exit;
}

// Busca planos da academia
$queryPlanos = $conexao->prepare("SELECT * FROM planos WHERE Academia_id = ?");
$queryPlanos->bind_param("i", $academia_id);
$queryPlanos->execute();
$planos = $queryPlanos->get_result();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Planos - <?php echo htmlspecialchars($academia['nome']); ?></title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/aluno/plano_academia.css">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <!--Quando clicar nesta opção tem que aparecer as academias que ele está matriculado no sistema e quando clicar na academia deverá mostrar os dados de quantas pessoas estão treinando e os planos assinados nesta academia. -->
    <?php include '../partials/header_aluno.php'; ?> <!-- Inclui o cabeçalho -->
    <main>
        <h1>Planos de <?php echo htmlspecialchars($academia['nome']); ?></h1>
        <ul>
            <?php while ($plano = $planos->fetch_assoc()): ?>
                <li>
                    <h3><?php echo htmlspecialchars($plano['nome']); ?></h3>
                    <p><?php echo htmlspecialchars($plano['descricao']); ?></p>
                    <p>Valor: R$ <?php echo number_format($plano['valor'], 2, ',', '.'); ?> (<?php echo $plano['duracao']; ?> dias)</p>
                    <p>Tipo: <?php echo htmlspecialchars($plano['tipo']); ?></p>
                    <a href="assinar_plano.php?plano_id=<?php echo $plano['id']; ?>">Assinar Plano</a>
                </li>
            <?php endwhile; ?>
        </ul>
        <a href="buscar_academias.php">Voltar</a>
    </main>
    <?php include '../partials/footer.php'; ?> <!-- Inclui o rodapé -->
</body>

</html>