<?php

require 'vendor/autoload.php';

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

#echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;

//Validação do Post
if(isset($_POST['excluir'])){
   
    $obVaga->excluir();

    header('location: index.php?status=success');
    exit;
}

include 'includes/header.php';
include 'includes/confirmar-exclusao.php';
include 'includes/footer.php';

?>