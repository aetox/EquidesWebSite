<?php 
    require("../../../PHP/other_functions/connexion_bdd.php");

    $id_vaccin = $_GET['idVaccin'];
    $sire = $_GET['sire'];



    $sqlDelete1="DELETE FROM vaccin WHERE `vaccin`.`id_vaccin` = $id_vaccin";
    $resultDelete1 = mysqli_query($mysqli,$sqlDelete1) or die(mysqli_error($mysqli));


    header("Location: ../../../carnet_vaccination.php?sire=$sire");

?>