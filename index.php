<?php
require 'src/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/assets/style.css">
    <title>Agenda Telefonica</title>
</head>
<body>
    <div class="container">
        <h1>Agenda Telefonica</h1>
        <a href="src/actions/add.php" class="btn criar">Adicionar Contato</a>
        <table class="agenda">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista as $item): ?>
                <?php
                    $url = 'src/actions/editar.php?id='.$item['id'].'&nome='.urlencode($item['Nome']).'&telefone='.urlencode($item['Telefone']);
                ?>
                <tr>
                    <td><?= $item['Nome']; ?></td>
                    <td><?= $item['Telefone']; ?></td>
                    <td class="acoes">
                        <a href="<?= $url ?>" class="btn editar">Editar</a>
                        <a href="src/actions/deletar.php?id=<?= $item['id'];?>" class="btn deletar">Deletar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>