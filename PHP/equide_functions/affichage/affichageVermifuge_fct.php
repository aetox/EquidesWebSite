<?php
$idSire = $_GET['sire'];


$sql = "SELECT vermifuge.id_vermifuge AS id_vermifuge, type_acte.nom_acte AS nom_vermifuge, vermifuge.nom AS reference_vermifuge, acte.date AS date_acte, acte.details AS detail_acte
FROM `equide`
JOIN `en_pension`
ON equide.id_equide=en_pension.id_equide
JOIN `registre_equide`
ON en_pension.id_registre=registre_equide.id_registre
JOIN `acte`
ON equide.id_equide=acte.id_equide
JOIN `type_acte`
ON acte.id_type_acte=type_acte.id_type_acte
JOIN `vermifuge`
ON type_acte.id_vermifuge=vermifuge.id_vermifuge


WHERE sire ='$idSire' ORDER BY `date` DESC ";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


if (mysqli_num_rows($result) > 0) {      

    while($vermifuge = mysqli_fetch_array($result)){ ?>
    
            <div class="equide_bootstrap card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?=$vermifuge['nom_vermifuge']?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nom du vermifuge : <?=$vermifuge['nom_vermifuge'] ?></li>
                    <li class="list-group-item">Référence vermifuge : <?=$vermifuge['reference_vermifuge'] ?></li>
                    <li class="list-group-item">Date : <?=date("d/m/y", strtotime($vermifuge['date_acte'])) ?></li>
                    <li class="list-group-item">Commentaire : <?=$vermifuge['detail_acte'] ?></li>
                    <li class="modification list-group-item"><a href="PHP/equide_functions/modification/suppressionVermifuge_fct.php?idVermifuge=<?=$vermifuge['id_vermifuge']?>&amp;sire=<?=$idSire;?>">Supprimer</a></li>
                </ul>
            </div>  

      <? } ?>
    <?php }else {?>
        <h3><?php echo("Vous n'avez pas enregistré de vermifuge");}?></h3>