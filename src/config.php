<?php
require 'vendor/autoload.php';
use Projeto\Agenda\Classes\Contato;

//Define o id unico de cada entrada no array. Caso não exista nenhuma entrada, o valor padrão é 1
session_start();

if(empty($_SESSION['id'])){
    $_SESSION['id'] = 1;
}

//variável padrão para o objeto
$contato = new Contato;
$lista = $contato->mostrarContatos();