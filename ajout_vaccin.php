<?php

$idSire = $_GET['numSIRE'];
$titre ="Ajouter un vaccin";
include_once("header.php");
include_once('PHP/equide_functions/modification/AjoutVaccin_fct.php');
?>


<h1>Ajouter un vaccin pour l'équidé n°<?=$idSire?></h1>
<div id="ajoutTraitement">

    <form method="post" id="formAjoutTraitement" name="formajoutTraitement" enctype="multipart/form-data">

        <label for="idVaccin">ID Vaccin:</label>
        <input type="text" id="idVaccin" name="idVaccin" placeholder="XXXXXXX" required><br>

        <label for="nomVaccin">Nom du vaccin :</label>
        <input type="text" id="nomVaccin" name="nomVaccin" placeholder="Nom du Vaccin" required><br>

        <label for="numLot">Numéro de lot:</label>
        <input type="text" id="numLot" name="numLot" placeholder="XXXXXX" required><br>

        <label for="maladieConcernee">Maladie concernées:</label>
        <input type="text" id="maladieConcernee" name="maladieConcernee" placeholder="Maladie concernées" required><br>

        <label for="dateVaccin">Date de vaccination:</label>
        <input type="date" id="dateVaccin" name="dateVaccin" required><br>

        <label for="lieuVaccin">Lieu de vaccination:</label>
        <input type="text" id="lieuVaccin" name="lieuVaccin" placeholder="Lieu" required><br>

        <label for="veterinaireVaccin">Vétérinaire :</label>
        <input type="text" id="veterinaireVaccin" name="veterinaireVaccin" placeholder="Nom du vétérinaire" required><br>

        <label for="signatureVaccin">Signature :</label>
        <input type="text" id="signatureVaccin" name="signatureVaccin" placeholder="Signature" required><br>

			<button type="submit" name="ajouter">Ajouter le vaccin</button>
    		</form>
	</div>