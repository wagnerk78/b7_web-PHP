<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$lista = $usuarioDao->findAll();

// $lista = [];
// $sql = $pdo->query("SELECT * FROM usuarios");
// if ($sql->rowCount() > 0) {
//     $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
// }
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
            <td align="center"> <?= $usuario->getId(); ?> </td>
            <td align="center"> <?= $usuario->getNome() ; ?> </td>
            <td align="center"> <?= $usuario->getEmail() ; ?> </td>
            <td align="center">
                <a href="editar.php?id=<?= $usuario->getId(); ?> "> Editar</a>
                <a href="excluir.php?id=<?= $usuario->getId(); ?>" onclick="return confirm('Tem certeza que deseja exluir?')"> Excluir </a>
            </td>
        </tr>
    <?php endforeach  ?>
</table>