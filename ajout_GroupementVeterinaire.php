<?php
$titre ="Ajouter un groupement de vétérinaire";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
include_once('PHP/ecurie_functions/modification/ajoutGroupement_fct.php');
?>
<div class="ajout_traitement">
    <h1>Ajouter un groupement de vétérinaire</h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

            <a href="groupementVeterinaire.php"><span class="material-symbols-outlined">close</span></a>
            
            <label for="nomGroupement">Nom du groupement :</label>
            <input type="text"  name="nomGroupement" placeholder="Nom du groupement" required><br>
            
            <label for="rue">Rue :</label>
            <input type="text" name="rue" id="rue_inscription" placeholder="Rue" required >

            <label for="moleculeTrcommuneaitement">Commune :</label>
            <input type="text" name="commune" id="commune_inscription" placeholder="Commune" required >
            
            <label for="code_postal">Code postal :</label>
            <input type="text" name="code_postal" id="codePostal_inscription" placeholder="Code Postal" required>

            <?php include_once('PHP/other_functions/affichageErreurs.php');?>
            
            <button type="submit" name="ajouter">Ajouter</button>

        </form>
    </div>	
</div>
        
<?php include_once("footer.php"); ?>

<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
