<?php 

$id_login = $_SESSION['id_login'];
$type_profil = $_SESSION['type_profil'];

if($_SESSION['type_profil'] == "detenteur") {


    $sql = "SELECT * FROM `registre_equide` WHERE id_detenteur='$id_login'";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));




}elseif($_SESSION['type_profil'] == "proprietaire"){

    $sql = "SELECT * FROM `registre_equide` WHERE proprietaire='$id_login'";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

}else {?>
        
<h3><?=("Vous n'avez pas d'écurie");}?></h3>