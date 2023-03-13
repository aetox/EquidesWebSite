<?php
$idSire = $_GET['numSIRE'];


$sql = "SELECT * FROM `vaccin` WHERE numUELN ='$idSire'";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


if (mysqli_num_rows($result) > 0) {      

    while($vaccins = mysqli_fetch_array($result)){

        }
    }else {
        echo("Vous n'avez pas enregistrer de vaccin");
    }
 ?>