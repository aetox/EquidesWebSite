<?php
$idSire = $_GET['numSIRE'];


$sql = "SELECT * FROM `traitement` WHERE sire ='$idSire'";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


if (mysqli_num_rows($result) > 0) {      

    while($traitement = mysqli_fetch_array($result)){ ?>

        
                            <tr>
                                <td><?=$traitement['id_traitement'] ?></td>
                                <td><?=$traitement['molecule_traitement'] ?></td>
                                <td><?=$traitement['reference_traitement'] ?></td>
                                <td><?=$traitement['date_traitement'] ?></td>
                                <td><?=$traitement['commentaire_traitement'] ?></td>
                                <td>Supprimer</td>
                            </tr>      

      <? } ?>
    <?php }else {
        echo("Vous n'avez pas enregistré de traitement");
    }
 ?>