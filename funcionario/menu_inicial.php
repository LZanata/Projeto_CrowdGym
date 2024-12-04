<?php
include '../php/cadastro_login/check_login_funcionario.php';
include '../php/conexao.php';

// Consulta para obter o número de alunos treinando ao vivo
$queryFluxo = $conn->prepare("SELECT COUNT(*) AS total FROM entrada_saida WHERE Academia_id = ? AND data_saida IS NULL");
$queryFluxo->bind_param("i", $_SESSION['Academia_id']);
$queryFluxo->execute();
$resultadoFluxo = $queryFluxo->get_result();
$rowFluxo = $resultadoFluxo->fetch_assoc();
$alunosTreinando = $rowFluxo['total'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Funcionário - Menu Inicial</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/funcionario/menu_inicial.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <?php include '../partials/header_funcionario.php'; ?> <!-- Inclui o cabeçalho -->

    <main>
        <div class="dashboard">
            <div class="chart-container">
                <h1>Histórico de Fluxo</h1>
                <canvas id="graficoFluxo"></canvas>
            </div>

            <div class="fluxo">
                <h1>Fluxo AO VIVO</h1>
                <p>Alunos treinando agora: <strong id="contadorFluxo"><?= htmlspecialchars($alunosTreinando) ?></strong></p>
            </div>
        </div>
    </main>

    <?php include '../partials/footer.php'; ?>
    <!-- Verifique se o campo oculto com ID academiaId está dentro da tag body e antes de qualquer chamada de script -->
    <input type="hidden" id="academiaId" value="<?= htmlspecialchars($_SESSION['Academia_id']) ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/graficos/historico_fluxo.js"></script>
    <script src="../js/fluxo/atualizar_fluxo.js?v=1.0"></script>
</body>

</html>