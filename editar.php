<?php

require 'vendor/autoload.php';

define('TITLE','Editar vaga');

use \App\Entity\Vaga;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

$obVaga=Vaga::getVaga($_GET['id']);

//Validar a vaga
if(!$obVaga instanceof Vaga){
    header('location: index.php?status=error');
    exit;
}


//Validação do Post
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){
    $obVaga->titulo=$_POST['titulo'];
    $obVaga->descricao=$_POST['descricao'];
    $obVaga->ativo=$_POST['ativo'];
    $obVaga->atualizar();

    header('location: index.php?status=success');
    exit;
}

include 'includes/header.php';
include 'includes/formulario-edit.php';
include 'includes/footer.php';

?>