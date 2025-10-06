<?php
require 'vendor/autoload.php';
use Sarah\Agenda\Classes\Contato;

//Como o objetivo é guardar os dados na memória, salvarei os dados em uma session
session_start();

//Define o id unico de cada entrada no array. Caso não exista nenhuma entrada, o valor padrão é 1
if(empty($_SESSION['id'])){
    $_SESSION['id'] = 1;
}

//Define a variável que guardará a agenda na memória. Caso não exista nenhum registro, o valor padrão é um array vazio
if(empty($_SESSION['agenda'])){
    $_SESSION['agenda'] = [];
}

//variável padrão para o objeto
$contato = new Contato;
$lista = $contato->mostrarContatos();