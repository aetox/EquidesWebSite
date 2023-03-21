<?php
$idSire = $_GET['numSIRE'];


$sql = "SELECT * FROM `vaccin` WHERE numUELN ='$idSire' ORDER BY `dateInjection_vaccin` DESC";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


if (mysqli_num_rows($result) > 0) {      

    while($vaccins = mysqli_fetch_array($result)){ ?>


                            <tr>
                                <td><?=$vaccins['id_vaccin'] ?></td>
                                <td><?=$vaccins['nom_vaccin'] ?></td>
                                <td><?=$vaccins['numLot_vaccin'] ?></td>
                                <td><?=$vaccins['maladieConcernees_vaccin'] ?></td>
                                <td><?=$vaccins['dateInjection_vaccin'] ?></td>
                                <td><?=$vaccins['lieu_vaccin'] ?></td>
                                <td><?=$vaccins['veterinaire'] ?></td>
                                <td><?=$vaccins['signature_vaccin'] ?></td>
                                <td>Supprimer</td>
                            </tr>
      

        <? }?>
   <?php }else {
        echo("Vous n'avez pas enregistrer de vaccin");
    }
 ?>