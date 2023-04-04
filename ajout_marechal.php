<?php
$titre ="Ajouter un maréchal";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
include_once('PHP/ecurie_functions/modification/ajoutMarechal_fct.php');
?>

<div class="ajout_traitement"> <!-- vermifuge -->
    <h1>Ajouter un maréchal</h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

            <a href="ecurie_description.php"><span class="material-symbols-outlined">close</span></a>

            <label for="nomMarechal">Nom :</label>
            <input type="text" id="nomMarechal" name="nomMarechal" placeholder="Nom" required><br>

            <label for="prenomMarechal">Prénom :</label>
            <input type="text" id="prenomMarechal" name="prenomMarechal" placeholder="Prénom" required><br>

            <label for="rueMarechal">Rue :</label>
            <input type="text" id="rueMarechal" name="rueMarechal" placeholder="Rue + numéro" required><br>         
            
            <label for="communeMarechal">Commune :</label>
            <input type="text" id="communeMarechal" name="communeMarechal" placeholder="Commune" required><br>

            <label for="codePostalMarechal">Code Postal :</label>
            <input type="text" id="codePostalMarechal" name="codePostalMarechal" placeholder="Code Postal" maxlength="5" required><br>  
    
            <label for="dateDebutAffectationMarechal">Date de début d'affectation :</label>
            <input type="date" id="dateDebutAffectationMarechal" name="dateDebutAffectationMarechal" required><br>  

            <label for="dateFinAffectationMarechal">Date de fin d'affectation :</label>
            <input type="date" id="dateFinAffectationMarechal" name="dateFinAffectationMarechal" required><br>  

            <?php include_once('PHP/other_functions/affichageErreurs.php');?>

            <button type="submit" name="ajouter">Ajouter</button>

        </form>
    </div>	
</div>


<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
