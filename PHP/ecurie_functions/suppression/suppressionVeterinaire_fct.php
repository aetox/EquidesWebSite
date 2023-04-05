<?php 
    require("../../../PHP/other_functions/connexion_bdd.php");

    $id_veterinaire = $_GET['idVeterinaire'];



    $sqlDelete1="DELETE FROM veterinaire WHERE `veterinaire`.`id_veterinaire` = $id_veterinaire";
    $resultDelete1 = mysqli_query($mysqli,$sqlDelete1) or die(mysqli_error($mysqli));


    header("Location: ../../../ecurie_description.php");

?>