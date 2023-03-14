<?php
$idSire = $_GET['numSIRE'];

$titre ="Ajouter un traitement";
include("header.php");
include_once('php/user_functions/AjoutTraitement_fct.php');
?>


<h1>Ajouter un traitement pour l'équidé n°<?=$idSire?></h1>
<div id="ajoutTraitement">

    <form method="post" id="formAjoutTraitement" name="formajoutTraitement" enctype="multipart/form-data">

        <label for="moleculeTraitement">Molécule traitement:</label>
        <input type="text" id="moleculeTraitement" name="moleculeTraitement" placeholder="Molécule traitement" required><br>

        <label for="numSire">Référence traitement :</label>
        <input type="text" id="referenceTraitement" name="referenceTraitement" placeholder="Référence traitement" required><br>

        <label for="dateTraitement">Date :</label>
        <input type="date" id="dateTraitement" name="dateTraitement" required><br>

        <label for="commentaireTraitement">Commentaire :</label>
        <input type="text" id="commentaireTraitement" name="commentaireTraitement" placeholder="Commentaire" required><br>

			<button type="submit" name="ajouter">Ajouter le traitement</button>
    		</form>
	</div>