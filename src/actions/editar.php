<?php
require '../../vendor/autoload.php';
session_start();
use Sarah\Agenda\Classes\Contato;
$contato = new Contato;

//Redireciona para a página principal caso o usuário tente acesar a página diretamente
if(empty($_GET['id']) || empty($_GET['nome']) || empty($_GET['telefone'])){
    header('Location: ../../index.php');
    exit();
} else{
    (int) $id = trim(htmlspecialchars($_GET['id']));
    (string) $nome = trim(htmlspecialchars($_GET['nome']));
    (string) $telefone = trim(htmlspecialchars($_GET['telefone']));
}

//Confere se os dados foram enviádos
if(isset($_POST['nome']) && isset($_POST['telefone'])){
    //Caso os dados estejam preenchidos chama método de editar contato
    //Caso os dados estejam inválidos ou vazios retorna uma mensagem de erro
    if(!empty($_POST['nome']) && !empty($_POST['telefone'])){
        try{
            $contato->editarContato($id, $_POST['nome'], $_POST['telefone']);
            header('Location: ../../index.php', True, 301);
            exit();
        } catch(Exception $e){
            echo '<div class="btn deletar">'.$e->getMessage().'</div>';
        }
    } else{
        echo '<div class="btn deletar">Ambos os valores devem estar preenchidos</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Editar Contato</title>
</head>
<body>
    <div class="container">
        <h1>Editar Contato</h1>
        <form method="post" class="formulario">
            <label>Nome</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($nome) ?>" required>

            <label>Telefone</label>
            <input type="text" name="telefone" value="<?= htmlspecialchars($telefone) ?>" required>

            <button type="submit" class="btn editar">Salvar</button>
            <a href="../../index.php" class="btn voltar">Voltar</a>
        </form>
    </div>
</body>
</html>