<?php

if (isset($_POST['SendRecupSenha'])) {
    if (isset($_POST["email"])) {
        $email = $_POST["email"];

        $token = bin2hex(random_bytes(16));
        $token_hash = hash("sha256", $token);
        $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

        $mysqli = require __DIR__ . "/php/conexao.php";

        // Array com as tabelas de usuários
        $tables = ['administrador', 'gerente', 'funcionario', 'aluno'];
        $emailFound = false;

        foreach ($tables as $table) {
            $sql = "UPDATE $table
                    SET reset_token_hash = ?,
                        reset_token_expires_at = ?
                    WHERE email = ?";

            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("sss", $token_hash, $expiry, $email);
            $stmt->execute();

            if ($mysqli->affected_rows) {
                $emailFound = true;
                break; // Sai do loop se o e-mail for encontrado em uma das tabelas
            }
        }

        if ($emailFound) {
            $mail = require __DIR__ . "/lib/mailer.php";

            $mail->setFrom("crowdgym21@gmail.com");
            $mail->addAddress($email);
            $mail->Subject = "Password Reset";
            $mail->Body = <<<END

            Click <a href="http://localhost/Projeto_CrowdGym/redefinir_senha.php?token=$token">here</a> 
            to reset your password.

            END;

            try {
                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
            }

            echo "Message sent, please check your inbox.";
        } else {
            echo "Email not found in any user table.";
        }
    } else {
        echo "E-mail não foi fornecido.";
    }
}
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
        <form method="POST" action="" class="formLogin">
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
