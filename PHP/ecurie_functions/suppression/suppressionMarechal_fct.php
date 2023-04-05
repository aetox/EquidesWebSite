<?php 
    require("../../../PHP/other_functions/connexion_bdd.php");

    $id_marechal = $_GET['idMarechal'];



    $sqlDelete1="DELETE FROM marechal WHERE `marechal`.`id_marechal` = $id_marechal";
    $resultDelete1 = mysqli_query($mysqli,$sqlDelete1) or die(mysqli_error($mysqli));


    header("Location: ../../../ecurie_description.php");

?>