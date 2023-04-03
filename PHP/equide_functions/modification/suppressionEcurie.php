<?php 

require("../../../PHP/other_functions/connexion_bdd.php");

$idDetenteur = $_GET['id_detenteur'];

$deleteRegistre = "DELETE FROM registre_equide WHERE `id_detenteur` = $idDetenteur";
$resultDeleteRegistre = mysqli_query($mysqli,$deleteRegistre) or die(mysqli_error($mysqli));

header("Location: ../../../ecurie.php");

?>