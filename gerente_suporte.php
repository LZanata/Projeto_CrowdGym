<?
require 'verifica_login_gerente.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuda e Suporte</title>
</head>

<body>
    <header>
        <nav>
            <!--Menu para alterar as opções de tela-->
            <div class="list">
                <ul>
                    <li class="dropdown">
                        <a href="#"><i class="bi bi-list"></i></a>

                        <div class="dropdown-list">
                            <a href="gerente_menu_inicial.php">Menu Inicial</a>
                            <a href="gerente_planos.php">Planos e Assinaturas</a>
                            <a href="gerente_graficos.php">Gráficos</a>
                            <a href="gerente_func.php">Funcionários</a>
                            <a href="gerente_aluno.php">Alunos</a>
                            <a href="gerente_sobre_nos.php">Sobre Nós</a>
                            <a href="gerente_suporte.php">Ajuda e Suporte</a>
                            <a href="tela_inicio.html">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
            <!--Logo do Crowd Gym(quando passar o mouse por cima, o logo devera ficar laranja)-->
            <div class="logo">
                <h1>Crowd Gym</h1>
            </div>
            <!--Opção para alterar as configurações de usuário-->
            <div class="user">
                <ul>
                    <li class="user-icon">
                        <a href=""><i class="bi bi-person-circle"></i></a>

                        <div class="dropdown-icon">
                            <a href="#">Perfil</a>
                            <a href="#">Endereço</a>
                            <a href="#">Tema</a>
                            <a href="#">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <!--Quando clicar aparecerá a tela para enviar uma mensagem ou tickets para o suporte técnico-->
    </main>
</body>

</html>