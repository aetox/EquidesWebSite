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
    <?php include_once('php/user_functions/affichageTraitement_fct.php') ?>
    </table> 
</div>




<?php include("footer.php"); ?>
