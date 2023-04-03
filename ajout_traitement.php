<?php
$titre ="Ajouter un traitement";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
$idSire = $_GET['sire'];
include_once('PHP/equide_functions/modification/ajoutTraitement_fct.php');
?>
<div class="ajout_traitement">
    <h1>Ajouter un traitement pour l'équidé n°<?=$idSire?></h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

            <a href="carnet_traitement.php?sire=<?=$idSire?>"><span class="material-symbols-outlined">close</span></a>
            <label for="moleculeTraitement">Nom du traitement :</label>
            <input type="text" id="moleculeTraitement" name="moleculeTraitement" placeholder="Nom du traitement" required><br>

            <label for="numSire">Référence traitement :</label>
            <input type="text" id="referenceTraitement" name="referenceTraitement" placeholder="Référence traitement" required><br>

            <label for="dateTraitement">Date :</label>
            <input type="date" id="dateTraitement" name="dateTraitement" required><br>

            <label for="commentaireTraitement">Commentaire :</label>
            <input type="text" id="commentaireTraitement" name="commentaireTraitement" placeholder="Commentaire" required><br>

            <?php include_once('PHP/other_functions/affichageErreurs.php');?>
            
            <button type="submit" name="ajouter">Ajouter</button>

        </form>
    </div>	
</div>
        
<?php include_once("footer.php"); ?>

<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
