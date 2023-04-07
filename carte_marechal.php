<?php
$titre ="Information vétérinaire";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) { ?>


            <h1>Info sur le marechal</h1>


<?php

    $idMarechalGet = $_GET['idMarechal'];
    $idDetenteur = $_SESSION['id_detenteur'];



    $veto =
    "SELECT affectation_marechal.date_debut AS amdb, affectation_marechal.date_fin AS amdf,
    marechal.nom AS marechalNom, marechal.prenom AS marechalPrenom, marechal.id_marechal AS id_marechal, marechal.rue AS marechalRue, marechal.commune AS marechalCommune, marechal.code_postal AS marechalCP
    FROM `marechal`
    JOIN `affectation_marechal`
    ON affectation_marechal.id_marechal = marechal.id_marechal
    WHERE marechal.id_marechal='$idMarechalGet'";

    $resultVeto = mysqli_query($mysqli,$veto) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($resultVeto) > 0) {
        
        while($rowDatas = mysqli_fetch_array($resultVeto)){
        
        $idMarechal =$rowDatas['id_marechal'];
        $marechalNom = $rowDatas['marechalNom'];
        $marechalPrenom = $rowDatas['marechalPrenom'];
        $marechalRue = $rowDatas['marechalRue'];
        $marechalCommune = $rowDatas['marechalCommune'];
        $marechalCP = $rowDatas['marechalCP'];
        $avdb = $rowDatas['amdb'];
        $avdb1 = date("d/m/y", strtotime($avdb));
        $avdf = $rowDatas['amdf'];
        $avdf1 = date("d/m/y", strtotime($avdf)); ?>

    
            <div class="equide_bootstrap card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?=$marechalNom?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nom  : <?=$marechalNom ?></li>
                    <li class="list-group-item">Prénom  : <?=$marechalPrenom ?></li>
                    <li class="list-group-item">Rue  : <?=$marechalRue ?></li>
                    <li class="list-group-item">Commune  : <?=$marechalCommune ?></li>
                    <li class="list-group-item">Code Postal  : <?=$marechalCP?></li>
                    <li class="list-group-item">Date de debut d'affectation: <?=$avdb1 ?></li>
                    <li class="list-group-item">Date de fin d'affectation: <?=$avdf1 ?></li>

                    <li class="modification list-group-item"><a href="updateMarechal.php?idMarechal=<?=$idMarechal?>">Modifier</a></li>
                    <li class="modification list-group-item"><a href="PHP/ecurie_functions/suppression/suppressionMarechal_fct.php?idMarechal=<?=$idMarechal?>">Supprimer</a></li>
                </ul>
            </div> 
        <?php }}?>


<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>