<?php 
    require("../../../PHP/other_functions/connexion_bdd.php");

    $id_vermifuge = $_GET['idVermifuge'];
    $sire = $_GET['sire'];



    $sqlDelete1="DELETE FROM vermifuge WHERE `vermifuge`.`id_vermifuge` = $id_vermifuge";
    $resultDelete1 = mysqli_query($mysqli,$sqlDelete1) or die(mysqli_error($mysqli));


    header("Location: ../../../carnet_vermifuge.php?sire=$sire");

?>