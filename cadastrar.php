<?php

require 'vendor/autoload.php';

define('TITLE','Cadastrar vaga');

use \App\Entity\Vaga;

//Validação do Post
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){
    $obVaga = new Vaga;
    $obVaga->titulo=$_POST['titulo'];
    $obVaga->descricao=$_POST['descricao'];
    $obVaga->ativo=$_POST['ativo'];
    $obVaga->cadastrar();

    header('location: index.php?status=success');
    exit;
}

include 'includes/header.php';
include 'includes/formulario.php';
include 'includes/footer.php';

?>