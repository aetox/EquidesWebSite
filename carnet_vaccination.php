<?php
$idSire = $_GET['numSIRE'];
$titre ="Carnet de Vaccination : $idSire";
include("header.php");
?>

<h1>Carnet de vaccination pour l'équide n°<?php echo $idSire ?>  </h1>


<!-- Ajouter un lien $GET et stiliser le button  -->

<a href="ajout_vaccin.php?numSIRE=<?=$idSire?>">Ajouter un vaccin</a>

<div class="tableau">
    <table class="affichageTable">
            <tr>
                <th>ID vaccin</th>
                <th>Nom du Vaccin</th>
                <th>Numéro de lot</th>
                <th>Maladie concernées</th>
                <th>Date</th>
                <th>Lieu de vaccination</th>
                <th>Vétérinaire</th>
                <th>Signature</th>
                <th>Supprimer</th>
            </tr>
        <hr>
<?php include_once('php/equide_functions/affichage/affichageVaccin_fct.php') ?>
    </table> 
</div> 


    <!-- Télécharge le pdf -->

    <a href="PHP/pdf_functions/vaccin_pdf.php?numSIRE=<?=$idSire;?>" target="_blank">
    <button>Télécharger le PDF</button>
    </a>



<?php include("footer.php"); ?>
