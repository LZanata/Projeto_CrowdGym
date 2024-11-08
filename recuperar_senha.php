<?php
session_start();

include 'php/conexao.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro_login/recuperar_senha.css">
    <title>Recuperar Senha</title>
</head>

<body>
    <!--Tela de Recuperação de Senha-->
    <div class="page">
        <form method="POST" action="php/cadastro_login/processar_recuperacao.php" class="formLogin">
            <div class="titulo">
                <h1>Crowd Gym</h1>
            </div>
            <h2>Redefinir Senha</h2>
            <p>Para redefinir sua senha, informe o e-mail cadastrado na sua conta e lhe enviaremos um link para realizar a alteração</p>
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Inserir e-mail" autofocus="true" required />
            <div class="botoes">
                <input type="submit" value="Enviar link para alteração" name="SendRecupSenha"></input>
            </div>
        </form>
    </div>
</body>

</html>
