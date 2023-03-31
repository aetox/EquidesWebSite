<?php
$idSire = $_GET['sire'];
$titre ="Carnet de Vaccination : $idSire";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
?>

<div class="carnet_traitement">
    <h1>Carnet de vaccination pour l'équide n°<?=$idSire?></h1>
    <a href="ajout_vaccin.php?sire=<?=$idSire?>" class="boutton_vertV2"><img src="ASSETS/ico/plus2.png">vaccin</a>    
    <div class="carnet_traitement_affichage">
        <?php include_once('PHP/equide_functions/affichage/affichageVaccin_fct.php') ?>
    </div>
    <a href="equide_description.php?sireEquide=<?=$idSire?>" class="boutton_orangeV2"><img src="ASSETS/ico/retour.png">retour</a>
</div>
    <div class="carnet_transport_pdf">
    <a href="PHP/pdf_functions/vaccin_pdf.php?sire=<?=$idSire;?>&amp;detenteurSIRE=<?=$_SESSION['id_detenteur'];?>" target="_blank" class="boutton_pdf">
    <img src="ASSETS/ico/telecharger2.png">PDF</a>
    </div> 


<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>