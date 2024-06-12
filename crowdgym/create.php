<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $idade = isset($_POST['idade']) ? $_POST['idade'] : date('d-m-Y');
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $stmt = $pdo->prepare('INSERT INTO contacts VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $name, $email, $phone, $cpf, $idade, $status]);
    $msg = "<div class='content update'><br>Aluno Cadastrado!</div>";
}
?>
<?=template_header('CrowdGym')?>

<div class="content update">
	<h2>Cadastro do Aluno</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="name">Nome</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id">
        <input type="text" name="name" placeholder="Leo Blair" id="name">
        <label for="email">Email</label>
        <label for="phone">Telefone</label>        
        <input type="text" name="email" placeholder="leoblair@example.com" id="email">
        <input type="text" name="phone" placeholder="11925550143" id="phone">
        <label for="cpf">CPF</label>
        <label for="idade">Data de Nascimento</label>
        <input type="text" name="cpf" placeholder="00011100011" id="cpf">
        <input type="date" name="idade" value="<?=date('d-m-Y')?>" id="idade">
        <input type="submit" value="Cadastrar">
  
    </form>
    <?php if ($msg): 
    echo ($msg);
    endif; ?>
</div>

<?=template_footer()?>