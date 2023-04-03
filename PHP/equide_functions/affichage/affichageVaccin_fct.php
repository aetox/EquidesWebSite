<?php
$idSire = $_GET['sire'];


$sql = "SELECT vaccin.id_vaccin AS id_vaccin, type_acte.nom_acte AS nom_vaccin, vaccin.nom AS numero_lot ,vaccin.maladie AS maladie_vaccin, vaccin.lieu AS lieu_vaccin, acte.date AS date_acte, acte.details AS detail_acte
FROM `equide`
JOIN `en_pension`
ON equide.id_equide=en_pension.id_equide
JOIN `registre_equide`
ON en_pension.id_registre=registre_equide.id_registre
JOIN `acte`
ON equide.id_equide=acte.id_equide
JOIN `type_acte`
ON acte.id_type_acte=type_acte.id_type_acte
JOIN `vaccin`
ON type_acte.id_vaccin=vaccin.id_vaccin


WHERE sire ='$idSire' "; //ORDER BY `date_traitement` DESC
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


if (mysqli_num_rows($result) > 0) {      

    while($vaccins = mysqli_fetch_array($result)){ ?>
      
            <div class="equide_bootstrap card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Nom : <?=$vaccins['nom_vaccin']?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Numéro de lot : <?=$vaccins['numero_lot']?></li>
                    <li class="list-group-item">Maladie(s) concernée(s) : <?=$vaccins['maladie_vaccin']?></li>
                    <li class="list-group-item">Date d'injection : <?=$vaccins['date_acte']?></li>
                    <li class="list-group-item">Lieu : <?=$vaccins['lieu_vaccin']?></li>
                    <li class="list-group-item">Vétérinaire : TRAITER EN PHP</li>
                    <li class="list-group-item">Commentaire : <?=$vaccins['detail_acte']?></li>
                    <li class="modification list-group-item"><a href="PHP/equide_functions/modification/suppressionVaccin_fct.php?idVaccin=<?=$vaccins['id_vaccin']?>&amp;sire=<?=$idSire;?>">Supprimer</a></li>
                </ul>
            </div>  

        <? }?>
   <?php }else {?>
        <h3><?php echo("Vous n'avez pas enregistré de vaccin");}?></h3>