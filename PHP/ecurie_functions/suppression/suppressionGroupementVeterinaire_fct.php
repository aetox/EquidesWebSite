<?php 
    require("../../../PHP/other_functions/connexion_bdd.php");

    $idGroupement = $_GET['idGroupement'];



    $sqlDelete1="DELETE FROM groupement_veterinaire WHERE `groupement_veterinaire`.`id_groupement_veterinaire` = $idGroupement";
    $resultDelete1 = mysqli_query($mysqli,$sqlDelete1) or die(mysqli_error($mysqli));


    header("Location: ../../../groupementVeterinaire.php");

?>