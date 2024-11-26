<?php
require_once '../php/cadastro_login/check_login_aluno.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajuda e Suporte</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/aluno/suporte.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <!-- Quando clicar aparecerá a tela para enviar uma mensagem ou tickets para o suporte técnico -->
    <?php include '../partials/header_aluno.php'; ?> <!-- Inclui o cabeçalho -->

    <main>
        <section class="support-section">
            <h2>Ajuda e Suporte</h2>
            <p>Preencha o formulário abaixo para abrir um ticket de suporte. Nossa equipe entrará em contato em breve.</p>

            <form action="enviar_ticket.php" method="POST" class="support-form">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required placeholder="Digite seu nome">

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required placeholder="Digite seu e-mail">

                <label for="mensagem">Descrição do Problema:</label>
                <textarea id="mensagem" name="mensagem" rows="5" required placeholder="Descreva o problema"></textarea>

                <button type="submit" class="submit-btn">Enviar Ticket</button>
            </form>
        </section>
    </main>

    <?php include '../partials/footer.php'; ?> <!-- Inclui o rodapé -->
</body>

</html>