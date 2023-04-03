<?php 
    require("../../../PHP/other_functions/connexion_bdd.php");

    $id_transport = $_GET['idTransport'];


    $sqlDelete1="DELETE FROM fiche_transport WHERE `id_transport` = $id_transport";
    $resultDelete1 = mysqli_query($mysqli,$sqlDelete1) or die(mysqli_error($mysqli));


    header("Location: ../../../carnet_transport.php");

?>