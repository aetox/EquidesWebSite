<?php 
    require("../../../PHP/other_functions/connexion_bdd.php");

    $id_detenteur = $_GET['idDetenteur'];


    $sqlDelete1="DELETE FROM detenteur WHERE `detenteur`.`id_detenteur` = $id_detenteur";
    $resultDelete1 = mysqli_query($mysqli,$sqlDelete1) or die(mysqli_error($mysqli));


    header("Location: ../../../admin.php");

?>