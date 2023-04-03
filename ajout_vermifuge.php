<?php
$titre ="Ajouter un vermifuge";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
$idSire = $_GET['sire'];
include_once('PHP/equide_functions/modification/ajoutVermifuge_fct.php');
?>

<div class="ajout_traitement"> <!-- vermifuge -->
    <h1>Ajouter un vermifuge pour l'équidé n°<?=$idSire?></h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

            <a href="carnet_vermifuge.php?sire=<?=$idSire?>"><span class="material-symbols-outlined">close</span></a>
            <label for="nomVermifuge">Nom :</label>
            <input type="text" id="nomVermifuge" name="nomVermifuge" placeholder="Nom vermifuge" required><br>

            <label for="referenceVermifuge">Référence vermifuge :</label>
            <input type="text" id="referenceVermifuge" name="referenceVermifuge" placeholder="Référence vermifuge" required><br>

            <label for="dateVermifuge">Date :</label>
            <input type="date" id="dateVermifuge" name="dateVermifuge" required><br>

            <label for="commentaireVermifuge">Commentaire :</label>
            <input type="text" id="commentaireVermifuge" name="commentaireVermifuge" placeholder="Commentaire" required><br>

            <?php include_once('PHP/other_functions/affichageErreurs.php');?>

            <button type="submit" name="ajouter">Ajouter</button>

        </form>
    </div>	
</div>


<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
