<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menu Inicial Aluno</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/aluno/menu_inicial.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
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
                <a href="aluno_menu_inicial.php">Menu Inicial</a>
                <a href="aluno_minhas_academias.php">Minhas Academias</a>
                <a href="aluno_buscar_academias.php">Buscar Academias</a>
                <a href="aluno_dados_pagamento.php">Dados de Pagamento</a>
                <a href="aluno_sobre_nos.php">Sobre Nós</a>
                <a href="aluno_suporte.php">Ajuda e Suporte</a>
                <a href="php/cadastro_login/logout.php">Sair</a>
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
      <!--Aqui terá um gráfico semanal de quantas horas o aluno treinou durante todos os dias da semana- o ultimo dia e horario que o aluno foi e saiu da academia -->
   <section>
      <div class="chart-container">
        <canvas id="meuGrafico"></canvas>
    </div>
    <!-- Importando a biblioteca Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Importando a tabela no JavaScript-->
    <script src="js/aluno/tabela_horas_semanal.js"></script>
    <div class="info">
      <div class="last-train">
        <h2>Ultimo Treino Realizado</h2>
        <p>sex. 19 de set.</p>
      </div>
      <div class="time-arrive">
        <h2>Horário de Chegada</h2>
        <p>05:29</p>
      </div>
      <div class="time-left">
        <h2>Horário de Saída</h2>
        <p>07:40</p>
      </div>
    </div>
    </section>
    </main>
    <footer>
      <div id="footer_copyright">
        &#169
        2024 CROWD GYM FROM EASY SYSTEM LTDA
      </div>
    </footer>
  </body>
</html>