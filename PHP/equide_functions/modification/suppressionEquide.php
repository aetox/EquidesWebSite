<?php 
    
    require("../../other_functions/connexion_bdd.php");

    $get_sire = $_GET['sireEquide'];

    $imglink ="SELECT image.image AS lienImg
    FROM `equide`
    JOIN `image`
    ON equide.id_equide=image.id_equide
    
    WHERE `sire` = $get_sire";
    $resulat_link = mysqli_query($mysqli,$imglink) or die (mysqli_error($mysqli));
    
    $lienPdp = '';
    if(mysqli_num_rows($resulat_link) > 0) {
        while($pdp = mysqli_fetch_array($resulat_link)){
                $lienPdp = $pdp['lienImg'];
           }
        //Suppression de l'image dans le dossier image BDD
        //unlink("../ASSETS/img_bdd/.'$lienPdp'.");
    }
    
    $sql_delete = "DELETE FROM `equide` WHERE `sire` = $get_sire";
    $resulat_delete = mysqli_query($mysqli,$sql_delete) or die (mysqli_error($mysqli));

    header("Location: ../../../equides.php");

//************************************************** */
// Tout fonctionne sauf la suppreession de l'image dans le dossier bdd, acces refusé ou jco quoi bruh

?>