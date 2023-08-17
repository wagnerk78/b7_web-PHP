<?php
require 'config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM usuarios");
if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<a href="adicionar.php"> Adicionar Usuário</a> <br> <br>

<table border="3" width=100%>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($lista as $usuario) : ?>
        <tr>
            <td align="center"> <?= $usuario['id']; ?> </td>
            <td align="center"> <?= $usuario['nome']; ?> </td>
            <td align="center"> <?= $usuario['email']; ?> </td>
            <td align="center">
                <a href="editar.php?id=<?= $usuario['id']; ?> "> Editar</a>
                <a href="excluir.php?id=<?= $usuario['id']; ?>" onclick="return confirm('Tem certeza que deseja exluir?')"> Excluir </a>
            </td>
        </tr>
    <?php endforeach  ?>
</table>