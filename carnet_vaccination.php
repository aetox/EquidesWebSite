<?php
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
$idSire = $_GET['numSIRE'];
$titre ="Carnet de Vaccination : $idSire";
?>

<div class="carnet_traitement">
    <h1>Carnet de vaccination pour l'équide n°<?=$idSire?></h1>
    <a href="ajout_vaccin.php?numSIRE=<?=$idSire?>" class="boutton_vertV2"><img src="ASSET/ico/plus2.png">vaccin</a>    
    <div class="carnet_traitement_affichage">
        <?php include_once('PHP/equide_functions/affichage/affichageVaccin_fct.php') ?>
    </div>
    <a href="equide_description.php?numSIRE=<?=$idSire?>" class="boutton_orangeV2"><img src="ASSET/ico/retour.png">retour</a>
</div>
    <!-- Télécharge le pdf -->
    <div class="carnet_transport_pdf">
    <a href="PHP/pdf_functions/vaccin_pdf.php?numSIRE=<?=$idSire;?>&amp;detenteurSIRE=<?=$_SESSION['sire_detenteur'];?>" target="_blank">
    <button>Télécharger le PDF</button>
    </a>
    </div>




<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>