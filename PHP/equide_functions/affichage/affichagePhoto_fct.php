<?php
function AffichagePhoto($mysqli,$sire){

    $sql1 = "SELECT id_equide FROM `equide` WHERE sire='$sire'";
    $resulat_img = mysqli_query($mysqli,$sql1) or die (mysqli_error($mysqli));
     
    if(mysqli_num_rows($resulat_img) > 0) {
        while($row = mysqli_fetch_array($resulat_img)){
                $id_equide = $row['id_equide'];
        }

        $sqlImg = "SELECT * FROM `image` WHERE id_equide='$id_equide'";
        $resulat_img1 = mysqli_query($mysqli,$sqlImg) or die (mysqli_error($mysqli));
         
        $lienPdp = '';
        if(mysqli_num_rows($resulat_img) > 0) {
            while($pdp = mysqli_fetch_array($resulat_img1)){
                    $lienPdp = $pdp['image'];
            }
        }
    }

return $lienPdp;
}
?>