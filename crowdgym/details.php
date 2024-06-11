<?php
$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$records_per_page = 5;
$stmt = $pdo->prepare('SELECT * FROM contacts ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
$num_contacts = $pdo->query('SELECT COUNT(*) FROM contacts')->fetchColumn();
?>
<div class="content read">
<table>
        <thead>
        <div class="content"><h2>Detalhes dos Alunos</h2></div>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Email</td>
                <td>Telefone</td>
                <td>CPF</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?= $contact['id'] ?></td>
                    <td><?= $contact['name'] ?></td>
                    <td><?= $contact['email'] ?></td>
                    <td><?= $contact['phone'] ?></td>
                    <td><?= $contact['cpf'] ?></td>
                    <td><?php if ($contact["status"]==1){
                        echo "Ativo";
                    }else{
                        echo "Não Ativo";
                    } 
                    ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</table>
</div>