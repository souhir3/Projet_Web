<?php
include '../Controller/ReclamationC.php';
$reclamationC = new ReclamationC();
$reclamationC->deleteReclamation($_GET["idrec"]);
header('Location:package.php');
