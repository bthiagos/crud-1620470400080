<?php

require 'vendor/autoload.php';

use \App\Entity\Vaga;

$vagas = Vaga::getVagas();

include 'includes/header.php';
include 'includes/listagem.php';
include 'includes/footer.php';

?>