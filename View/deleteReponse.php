<?php
include '../Controller/ReclamationC.php';
include '../Controller/ReponseC.php';
$reponseC = new ReponseC();
$reponseC->deleteReponse($_GET["idrep"]);
header('Location:bs-basic-table.php');
