<?php
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
$idSire = $_GET['numSIRE'];
$titre ="Carnet de Traitement : $idSire";
?>

<div class="carnet_traitement">

    <h1>Carnet de traitement pour l'équide n°<?php echo $idSire ?></h1>

    <a href="ajout_traitement.php?numSIRE=<?=$idSire?>" class="boutton_vertV2"><img src="ASSET/ico/plus2.png">traitement</a>
        
        
    <div class="carnet_traitement_affichage">
    <?php include_once('PHP/equide_functions/affichage/affichageTraitement_fct.php') ?>
    </div>

</div>

    
    <!-- Lors du clic on appelle la fonction affichage_pdf -->

    <a href="PHP/pdf_functions/traitement_pdf.php?numSIRE=<?=$idSire;?>&amp;detenteurSIRE=<?=$_SESSION['sire_detenteur'];?>" target="_blank">
    <button>Télécharger le PDF</button>    
    </a> <!-- J'ai mis test.php pour tester, remettre traitement_pdf.php-->

    

<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>