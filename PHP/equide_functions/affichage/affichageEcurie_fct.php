<?php 

$info_error = array();

// Affichage taches en cours :
$idDetenteur = $_SESSION['id_detenteur'];


$sql = "SELECT * FROM `lieudetention` WHERE detenteur='$idDetenteur'";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


if (mysqli_num_rows($result) > 0) {      

    while($ecurie = mysqli_fetch_array($result)){

        }
    }else {?>
        <h3><?=("Vous n'avez pas d'écurie");}?></h3>
