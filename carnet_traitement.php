<?php
$idSire = $_GET['numSIRE'];
$titre ="Carnet de Traitement : $idSire";
include_once("header.php");
?>

<div class="carnet_traitement">

    <h1>Carnet de traitement pour l'équide n°<?php echo $idSire ?></h1>


    <!-- Ajouter un lien $GET et stiliser le button  -->

    <a href="ajout_traitement.php?numSIRE=<?=$idSire?>" class="boutton_1">Ajouter un traitement</a>


    <div class="tableau">
        <table class="affichageTable">
                    <tr>
                        <th>ID traitement</th>
                        <th>Molécule traitement</th>
                        <th>Référence traitement</th>
                        <th>Date</th>
                        <th>Commentaire</th>
                        <th>Supprimer</th>
                    </tr>
                <hr> 
        <?php include_once('php/equide_functions/affichage/affichageTraitement_fct.php') ?>
        </table> 
    </div>


    <!-- Lors du clic on appelle la fonction affichage_pdf -->
    
    <!-- Lien temporaire pour le test du pdf  -->

    <a href="PHP/pdf_functions/traitement_pdf.php?numSIRE=<?=$idSire;?>" target="_blank" class="boutton_pdf"><img src="ASSETS\ico\telecharger2.png">PDF</a> 
    
    <!-- J'ai mis test.php pour tester, remettre traitement_pdf.php-->


</div>

    <!-- Lors du clic on appelle la fonction affichage_pdf -->
    

    <!-- Lien temporaire pour le test du pdf  -->

    <a href="PHP/pdf_functions/traitement_pdf.php?numSIRE=<?=$idSire;?>" target="_blank">
    <button>Télécharger le PDF</button>    
    </a> <!-- J'ai mis test.php pour tester, remettre traitement_pdf.php-->


<?php include_once("footer.php"); ?>
