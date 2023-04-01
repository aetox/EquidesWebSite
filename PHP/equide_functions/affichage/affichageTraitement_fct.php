<?php
$idSire = $_GET['sire'];


$sql = "SELECT type_acte.nom_acte AS nom_traitement, traitement.nom AS reference_traitement, acte.date AS date_acte, acte.details AS detail_acte
FROM `equide`
JOIN `en_pension`
ON equide.id_equide=en_pension.id_equide
JOIN `registre_equide`
ON en_pension.id_registre=registre_equide.id_registre
JOIN `acte`
ON registre_equide.id_registre=acte.id_registre
JOIN `type_acte`
ON acte.id_type_acte=type_acte.id_type_acte
JOIN `traitement`
ON type_acte.id_traitement=traitement.id_traitement


WHERE sire ='$idSire' "; //ORDER BY `date_traitement` DESC
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


if (mysqli_num_rows($result) > 0) {      

    while($traitement = mysqli_fetch_array($result)){ ?>
    
            <div class="equide_bootstrap card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?=$traitement['nom_traitement']?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nom du traitement : <?=$traitement['nom_traitement'] ?></li>
                    <li class="list-group-item">Référence traitement : <?=$traitement['reference_traitement'] ?></li>
                    <li class="list-group-item">Date : <?=date("d/m/y", strtotime($traitement['date_acte'])) ?></li>
                    <li class="list-group-item">Commentaire : <?=$traitement['detail_acte'] ?></li>
                    <li class="modification list-group-item"><a href="">Supprimer</a></li>
                </ul>
            </div>  

      <? } ?>
    <?php }else {?>
        <h3><?php echo("Vous n'avez pas enregistré de traitement");}?></h3>