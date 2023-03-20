<?php
$idSire = $_GET['numSIRE'];
$titre ="Carnet de Traitement : $idSire";
include_once("header.php");
?>

<div class="carnet_traitement">
    <h1>Carnet de traitement pour l'équide n°<?php echo $idSire ?></h1>
    <a href="ajout_traitement.php?numSIRE=<?=$idSire?>" class="boutton_vertV2"><img src="ASSET/ico/plus2.png">traitement</a>    
    <div class="carnet_traitement_affichage">
        <?php include_once('PHP/equide_functions/affichage/affichageTraitement_fct.php') ?>
    </div>
    <a href="equide_description.php?numSIRE=<?=$idSire?>" class="boutton_orangeV2"><img src="ASSET/ico/retour.png">retour</a>
</div>


    
    <!-- Lors du clic on appelle la fonction affichage_pdf -->
    

<?php include_once("footer.php"); ?>
