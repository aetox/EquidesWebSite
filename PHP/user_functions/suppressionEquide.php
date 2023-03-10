<?php 

    require("../../connexion_bdd.php");

    error_reporting(E_ALL);
    ini_set("display_errors", 1);



    $get_sire = $_GET['numSIRE'];
    
    $sql_delete = "DELETE FROM `equide` WHERE `numSIRE` = $get_sire";
    $resulat_delete = mysqli_query($mysqli,$sql_delete) or die (mysqli_error($mysqli));

    $imglink ="SELECT img FROM `image` WHERE `id_equide` = $get_sire";
    $resulat_link = mysqli_query($mysqli,$imglink) or die (mysqli_error($mysqli));
    
    $lienPdp = '';
    if(mysqli_num_rows($resulat_link) > 0) {
        while($pdp = mysqli_fetch_array($resulat_link)){
                $lienPdp = $pdp['img'];
           }
        unlink("../EquidesWebSite/ASSETS/img_bdd/.'$lienPdp'.");
    }

    $img_delete = "DELETE FROM `image` WHERE `id_equide` = $get_sire";
    $resulat_img_delete = mysqli_query($mysqli,$img_delete) or die (mysqli_error($mysqli));


    header("Location: ../../../EquidesWebSite/equides.php");

//************************************************** */
// Tout fonctionne sauf la suppreession de l'image dans le dossier bdd, acces refusé ou jco quoi bruh

?>