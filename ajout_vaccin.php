<?php
$titre ="Ajouter un vaccin";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
$idSire = $_GET['sire'];
include_once('PHP/equide_functions/modification/ajoutVaccin_fct.php');
?>

<div class="ajout_vaccin">
    <h1>Ajouter un vaccin pour l'équidé n°<?=$idSire?></h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

            <a href="carnet_vaccination.php?sire=<?=$idSire?>"><span class="material-symbols-outlined">close</span></a>
            <label for="idVaccin">ID Vaccin :</label>
            <input type="text" id="idVaccin" name="idVaccin" placeholder="XXXXXXX" required><br>

            <label for="nomVaccin">Nom du vaccin :</label>
            <input type="text" id="nomVaccin" name="nomVaccin" placeholder="Nom du Vaccin" required><br>

            <label for="numLot">Numéro de lot :</label>
            <input type="text" id="numLot" name="numLot" placeholder="XXXXXX" required><br>

            <label for="maladieConcernee">Maladie concernées :</label>
            <input type="text" id="maladieConcernee" name="maladieConcernee" placeholder="Maladie concernées" required><br>

            <label for="dateVaccin">Date de vaccination :</label>
            <input type="date" id="dateVaccin" name="dateVaccin" required><br>

            <label for="lieuVaccin">Lieu de vaccination :</label>
            <input type="text" id="lieuVaccin" name="lieuVaccin" placeholder="Lieu" required><br>

            <label for="veterinaireVaccin">Vétérinaire :</label>
            <input type="text" id="veterinaireVaccin" name="veterinaireVaccin" placeholder="Nom du vétérinaire" required><br>

            <label for="signatureVaccin">Signature :</label>
            <input type="text" id="signatureVaccin" name="signatureVaccin" placeholder="Signature" required><br>

            <button type="submit" name="ajouter">Ajouter</button>
        </form>
    </div>


<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
