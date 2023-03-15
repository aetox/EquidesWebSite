<?php
$idSire = $_GET['numSIRE'];
$titre ="Carnet de Traitement : $idSire";
include("header.php");
?>

<h1>Carnet de traitement pour l'équide n°<?php echo $idSire ?>  </h1>


<!-- Ajouter un lien $GET et stiliser le button  -->

<a href="ajout_traitement.php?numSIRE=<?=$idSire?>">Ajouter un traitement</a>


<div class="tableau">
    <table class="affichageTable">
                <tr>
                    <th>ID tache</th>
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
    <button>Télécharger le PDF</button>

    <!-- Lien temporaire pour le test du pdf  -->

    <a href="PHP/pdf_functions/test.php?numSIRE=<?=$idSire;?>">PDF Test</a> <!-- J'ai mis test.php pour tester, remettre traitement_pdf.php-->

<?php include("footer.php"); ?>
