<?php
$idSire = $_GET['numSIRE'];


$sql = "SELECT * FROM `traitement` WHERE sire ='$idSire' ORDER BY `date_traitement` DESC"; //
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


if (mysqli_num_rows($result) > 0) {      

    while($traitement = mysqli_fetch_array($result)){ ?>
    
            <div class="equide_bootstrap card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">ID : <?=$traitement['id_traitement']?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Molécule traitement : <?=$traitement['molecule_traitement'] ?></li>
                    <li class="list-group-item">Référence traitement : <?=$traitement['reference_traitement'] ?></li>
                    <li class="list-group-item">Date : <?=$traitement['date_traitement'] ?></li>
                    <li class="list-group-item">Commentaire : <?=$traitement['commentaire_traitement'] ?></li>
                    <li class="modification list-group-item"><a href="">Supprimer</a></li>
                </ul>
            </div>  

      <? } ?>
    <?php }else {?>
        <h3><?php echo("Vous n'avez pas enregistré de traitement");}?></h3>