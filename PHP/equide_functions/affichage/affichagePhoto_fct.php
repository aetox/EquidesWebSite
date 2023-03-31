<?php

    // Definition de la fonction Affichage de la photo avec en parametre la variable pour la connexion à la bdd et
    // le numéro SIRE, la function return le lien pdp
    
function AffichagePhoto($mysqli,$sire){

    $sqlImg = "SELECT * FROM `image` WHERE sire='$sire'";
    $resulat_img = mysqli_query($mysqli,$sqlImg) or die (mysqli_error($mysqli));
     
    $lienPdp = '';
    if(mysqli_num_rows($resulat_img) > 0) {
        while($pdp = mysqli_fetch_array($resulat_img)){
                $lienPdp = $pdp['img'];
        }
    }

return $lienPdp;
}
?>