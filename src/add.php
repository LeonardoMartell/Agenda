<?php 
session_start();
require '../vendor/autoload.php';
use Sarah\Agenda\Classes\Contato;
$contato = new Contato;
if(!empty($_POST['nome']) && !empty($_POST['telefone'])){
    $nome = trim(htmlspecialchars($_POST['nome']));
    $telefone = trim(htmlspecialchars($_POST['telefone']));
    try{
        $contato->criarContato($nome, $telefone);
        header('Location: ../index.php', True, 301);
        exit();
    }catch(Exception $e){
        echo '<div class="btn deletar">'.$e->getMessage().'</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Adicionar Contato</title>
</head>
<body>
    <div class="container">
        <h1>Adicionar Contato</h1>
        <form method="post" class="formulario">
            <label>Nome</label>
            <input type="text" name="nome" required>

            <label>Telefone</label>
            <input type="text" name="telefone" required>

            <button type="submit" class="btn criar">Salvar</button>
            <a href="../index.php" class="btn voltar">Voltar</a>
        </form>
    </div>
</body>
</html>