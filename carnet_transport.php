<?php
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
$titre ="Carnet de transport";
?>


<div class="carnet_transport">

    <h1 class="titre_1">Carnet de Transport</h1>

    <!-- Afficher les cartes avec les voyages créés -->

    <div></div>

    <a href="#" class="boutton_vertV2"><img src="ASSETS/ico/plus2.png">voyage</a>

    <div class="carnet_transport_pdf">
    <!-- Télécharge le pdf -->
    <!-- <a href="PHP/pdf_functions/carnet_transport_pdf.php" target="_blank">
    <button>Télécharger le PDF</button>
    </a> -->
    <a href="PHP/pdf_functions/carnet_transport_pdf.php" target="_blank" class="boutton_pdf"><img src="ASSETS/ico/telecharger2.png">PDF</a>
    </div>
</div>

<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>