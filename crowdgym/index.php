<?php
include 'functions.php';
?>

<?=template_header('CrowdGym')?>

<?php
        include './contador.php';
        $c = new Contador(0);
        $c->contarEntrada();
        $c->contarEntrada();
        $c->contarSaida();
        $c->contarEntrada();
        $c->contarEntrada();
        $c->contarSaida();
        $c->quantidadeAluno();     
?>

<?php
        include './details.php';
?>

<?=template_footer()?>