<?php include 'php/cadastro_login/check_login.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alunos Academia</title>
  <link rel="stylesheet" href="css/index.css">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
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
              <a href="func_menu_inicial.php">Menu Inicial</a>
              <a href="func_alunos.php">Alunos</a>
              <a href="func_catraca.php">Catraca</a>
              <a href="func_sobre_nos.php">Sobre Nós</a>
              <a href="func_suporte.php">Ajuda e Suporte</a>
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
              <a href="#">Editar Perfil</a>
              <a href="#">Alterar Tema</a>
              <a href="#">Sair da Conta</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <main>
    <!--Nesta tela tem que aparecer: Matricular Aluno - Alunos Matriculados - Pagamentos Pendentes dos Alunos - Informações dos Alunos Presentes-->
  </main>
  <footer>
    <div id="footer_copyright">
      &#169
      2024 CROWD GYM FROM EASY SYSTEM LTDA
    </div>
  </footer>
</body>

</html>