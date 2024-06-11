<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
        $idade = isset($_POST['idade']) ? $_POST['idade'] : date('d-m-Y');
        $stmt = $pdo->prepare('UPDATE contacts SET id = ?, name = ?, email = ?, phone = ?, cpf = ?, idade = ? WHERE id = ?');
        $stmt->execute([$id, $name, $email, $phone, $cpf, $idade, $_GET['id']]);
        $msg = 'Cadastro Atualizado!';
    }
    $stmt = $pdo->prepare('SELECT * FROM contacts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>
<?= template_header('CrowdGym') ?>

<div class="content update">
    <h2>Atualizar Aluno #<?= $contact['id'] ?></h2>
    <form action="update.php?id=<?= $contact['id'] ?>" method="post">
        <label for="id">ID</label>
        <label for="name">Nome</label>
        <input type="text" name="id" placeholder="1" value="<?= $contact['id'] ?>" id="id">
        <input type="text" name="name" placeholder="Leo Blair" value="<?= $contact['name'] ?>" id="name">
        <label for="email">Email</label>
        <label for="phone">Telefone</label>
        <input type="text" name="email" placeholder="leoblair@example.com" value="<?= $contact['email'] ?>" id="email">
        <input type="text" name="phone" placeholder="11925550143" value="<?= $contact['phone'] ?>" id="phone">
        <label for="cpf">CPF</label>
        <label for="idade">Idade</label>
        <input type="text" name="cpf" placeholder="00011100011" value="<?= $contact['cpf'] ?>" id="cpf">
        <input type="date" name="idade" value="<?= date('d-m-Y', strtotime($contact['idade'])) ?>" id="idade">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
        <p><?= $msg ?></p>
    <?php endif; ?>
</div>
<?= template_footer() ?>