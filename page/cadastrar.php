<?php
require "./vendor/autoload.php";

define('TITLE', 'Cadastrar nova conta');


use \App\Entity\Conta;
$obConta = new Conta();

//VALIDAÇÃO
if(isset($_POST["nome"], $_POST["saldo"], $_POST["cartao"])){
    
    $obConta->nome   = $_POST["nome"];
    $obConta->saldo  = $_POST["saldo"];
    $obConta->cartao = $_POST["cartao"];
    $obConta->cadastrar();

    header('location: ./?page=contas&status=success');
    exit;
}

include "includes/formulario.php";
?>