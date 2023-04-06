<?php 
    require("../../../PHP/other_functions/connexion_bdd.php");

    $id_parent = $_GET['idParent'];
    $sire = $_GET['sire'];



    $sqlDelete1="DELETE FROM ascendance WHERE `ascendance`.`id_ascendance` = $id_parent";
    $resultDelete1 = mysqli_query($mysqli,$sqlDelete1) or die(mysqli_error($mysqli));


    header("Location: ../../../equide_description.php?sireEquide=$sire");

?>