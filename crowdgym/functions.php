<?php
function pdo_connect_mysql()
{
	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'root';
	$DATABASE_PASS = '';
	$DATABASE_NAME = 'crowdgym';
	try {
		return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
	} catch (PDOException $exception) {
		exit('Failed to connect to database!');
	}
}
function template_header($title)
{
	echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
	<header>
	<nav class="navtop">
	<ul>
    	<div>
	<li class="dropdown">
					<a href=""><h1>Fluxos</h1></a>
	<div class="dropdown-menu">		
    <a class='link' href="./chartcolumnweek.php">Fluxo Semanal</a>
	<a class='link' href="./chartcolumnmonth.php">Fluxo Mensal</a>
	<a class='link' href="./chartcolumnyear.php">Fluxo Anual</a>
	<a class='link' href="./chartpizza.php">Faixa Etária</a>
    </div>
	</li>     	
	<li>
    				<a class="cadastro" href="read.php"><h1></i>Cadastro de Alunos</h1></a>
	</li>
	<li>
					<a class="principal" href="index.php"><h1>Alunos Presentes</h1></a>   
	</li>
    	</div>
		</ul>
    </nav>

	</header>
EOT;
}
function template_footer()
{
	echo <<<EOT
	<footer>
	<div class="main">
		<div class="content footer-links">
			<div class="footer-company">
				<h4>Easy Systems LTDA</h4>
				<h6>Sobre</h6>
				<h6>Contato</h6>
			</div>
			<div class="footer-social">
				<h4>Redes Sociais</h4>
				<div class="social-icons">
					<a class='link' href="https://www.instagram.com/easysystemltda/?theme=dark" target="_blank" ><img src="imagens/instagram.png" alt="instagram"></a>
				</div>
			</div>
			<div class="footer-contact">
				<h4>Nosso Contato</h4>
				<h6> +55 11 988776655</h6>
				<h6>contato@easysystems.com.br</h6>
				<h6>Barueri SP</h6>
			</div>
		</div>
	</div>
	<div class="last">CROWD GYM</div>
</footer>
    </body>
	
</html>
EOT;
}
