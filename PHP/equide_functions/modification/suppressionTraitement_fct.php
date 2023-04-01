<?php 
    require("../../../PHP/other_functions/connexion_bdd.php");

    $id_traitement = $_GET['idTraitement'];
    $sire = $_GET['sire'];



    $sqlDelete1="DELETE FROM traitement WHERE `traitement`.`id_traitement` = $id_traitement";
    $resultDelete1 = mysqli_query($mysqli,$sqlDelete1) or die(mysqli_error($mysqli));


    header("Location: ../../../carnet_traitement.php?sire=$sire");

?>