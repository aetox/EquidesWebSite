<?php
$titre ="Carnet de transport";
include_once("header.php");
?>


<div class="carnet_transport">

    <h1 class="titre_1">Carnet de Transport</h1>

    <a href="#" class="boutton_1">créer un voyage</a>

</div>


    <!-- Télécharge le pdf -->

    <a href="PHP/pdf_functions/carnet_transport_pdf.php" target="_blank">
    <button>Télécharger le PDF</button>
    </a>


<?php include_once("footer.php"); ?>
