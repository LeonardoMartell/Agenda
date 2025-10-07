<?php
require '../../vendor/autoload.php';
session_start();
use Projeto\Agenda\Classes\Contato;
$contato = new Contato;

//Confere se os dados passados estão corretos, caso incorreto retorna uma mensagem de erro, e caso vazio redireciona para a pagina principal
if(isset($_GET['id']) && !empty($_GET['id'])){
    try{
        $contato->deletarContato($_GET['id']);
        header('Location: ../../index.php', True, 301);
        exit();
    }catch(Exception $e){
        echo '<h1 class="btn deletar">'.$e->getMessage().'</h1>';
    }
} else{
    header('Location: ../../index.php');
    exit();
}