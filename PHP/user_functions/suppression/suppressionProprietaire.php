<?php 
    require("../../../PHP/other_functions/connexion_bdd.php");

    $id_proprietaire = $_GET['idProprietaire'];


    $sqlDelete1="DELETE FROM proprietaire WHERE `proprietaire`.`id_proprietaire` = $id_proprietaire";
    $resultDelete1 = mysqli_query($mysqli,$sqlDelete1) or die(mysqli_error($mysqli));


    header("Location: ../../../admin.php");

?>