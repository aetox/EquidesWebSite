<?php

$idSire = $_GET['numSIRE'];
$titre ="Carnet de Traitement : $idSire";
include("header.php");

?>

<h1>Carnet de traitement pour l'équide n°<?php echo $idSire ?>  </h1>

<?php include_once('php/user_functions/affichageTraitement_fct.php') ?>


<?php include("footer.php"); ?>
