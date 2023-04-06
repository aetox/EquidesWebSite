<?php
$titre ="Information vétérinaire";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) { ?>


            <h1>Info sur le vétérinaire</h1>


<?php

    $idVeterinaireGet = $_GET['idVeterinaire'];
    $idDetenteur = $_SESSION['id_detenteur'];

    $veto =
    "SELECT affectation_veterinaire.type_veterinaire, affectation_veterinaire.date_debut AS avdb, affectation_veterinaire.date_fin AS avdf,
    veterinaire.nom AS veterinaireNom, veterinaire.prenom AS veterinairePrenom, veterinaire.id_veterinaire AS id_veterinaire, groupement_veterinaire.nom_groupement AS nom_groupement
    FROM `veterinaire`
    JOIN `affectation_veterinaire`
    ON veterinaire.id_veterinaire = affectation_veterinaire.id_veterinaire
    JOIN `groupement_veterinaire`
    ON veterinaire.id_groupement_veterinaire = groupement_veterinaire.id_groupement_veterinaire
    WHERE veterinaire.id_veterinaire='$idVeterinaireGet'";

    $resultVeto = mysqli_query($mysqli,$veto) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($resultVeto) > 0) {
        
        while($rowDatas = mysqli_fetch_array($resultVeto)){
        
        $idVeterinaire =$rowDatas['id_veterinaire'];
        $veterinaireNom = $rowDatas['veterinaireNom'];
        $veterinairePrenom = $rowDatas['veterinairePrenom'];
        $type_veterinaire = $rowDatas['type_veterinaire'];
        $groupement = $rowDatas['nom_groupement'];
        $avdb = $rowDatas['avdb'];
        $avdb1 = date("d/m/y", strtotime($avdb));
        $avdf = $rowDatas['avdf'];
        $avdf1 = date("d/m/y", strtotime($avdf)); ?>

    
            <div class="equide_bootstrap card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?=$rowDatas['veterinaireNom']?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nom  : <?=$rowDatas['veterinaireNom'] ?></li>
                    <li class="list-group-item">Prénom  : <?=$rowDatas['veterinairePrenom'] ?></li>
                    <li class="list-group-item">Type de vétérinaire : <?=$rowDatas['type_veterinaire'] ?></li>
                    <li class="list-group-item">Date de debut d'affectation: <?=$avdb1 ?></li>
                    <li class="list-group-item">Date de fin d'affectation: <?=$avdf1 ?></li>
                    <li class="list-group-item">Groupement de vétérinaire: <strong><?=$groupement ?></strong></li>

                    <li class="modification list-group-item"><a href="#?idTraitement=<?=$rowDatas['id_veterinaire']?>">Modifier</a></li>
                    <li class="modification list-group-item"><a href="#?idTraitement=<?=$rowDatas['id_veterinaire']?>">Supprimer</a></li>
                </ul>
            </div> 
        <?php }}?>


<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>