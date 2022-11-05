<?php
require "./vendor/autoload.php";

define('TITLE', 'Editar conta');

use \App\Entity\Conta;

//VALIDACAO ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header('location: ./?page=contas&status=error');
    exit;
}

//CONSULTA CONTA 
$obConta = Conta::getConta($_GET['id']);

//VALIDAR A CONTA
if (!$obConta instanceof Conta) {
    header('location: ./?page=contas&status=error');
    exit;
}

//VALIDAÇÃO
if(isset($_POST["excluir"])){
    
    $obConta->excluir();

    header('location: ./?page=contas&status=success');
    exit;
}

include "includes/exclusao.php";
?>