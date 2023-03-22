<?php
$idSire = $_GET['numSIRE'];
$titre ="Carnet de Traitement : $idSire";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
?>

<div class="carnet_traitement">
    <h1>Carnet de traitement pour l'équide n°<?php echo $idSire ?></h1>
    <a href="ajout_traitement.php?numSIRE=<?=$idSire?>" class="boutton_vertV2"><img src="ASSET/ico/plus2.png">traitement</a>    
    <div class="carnet_traitement_affichage">
        <?php include_once('PHP/equide_functions/affichage/affichageTraitement_fct.php') ?>
    </div>
    <a href="equide_description.php?numSIRE=<?=$idSire?>" class="boutton_orangeV2"><img src="ASSET/ico/retour.png">retour</a>
</div>

    <!-- Lors du clic on appelle la fonction affichage_pdf
    <div class="carnet_transport_pdf">
    <a href="PHP/pdf_functions/traitement_pdf.php?numSIRE=<?=$idSire;?>&amp;detenteurSIRE=<?=$_SESSION['sire_detenteur'];?>" target="_blank" class="boutton_pdf">
    <img src="ASSETS/ico/telecharger2.png">PDF</a>
    </div> -->

</div>
<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>