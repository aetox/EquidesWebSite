<?php

$idSire = $_GET['numSIRE'];
$titre ="Carnet de Vaccination : $idSire";
include("header.php");

?>

<h1>Carnet de vaccination pour l'équide n°<?php echo $idSire ?>  </h1>

<?php include_once('php/user_functions/affichageVaccin_fct.php') ?>


<?php include("footer.php"); ?>
