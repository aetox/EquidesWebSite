<?php
$titre ="Mes équides";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
?>
<?php include_once('PHP/equide_functions/modification/ajoutEquides_fct.php') ?>
<?php include_once('PHP/equide_functions/recherche/rechercheGet.php')?>

<div class="equides">

	<h1 class="titre_1">Mes équidés</h1>

	<!-- Ajouter la bouton recherche -->
	
	<h1>Recherche d'équidés</h1>
	<form action="PHP/equide_functions/recherche/rechercheEquideParNom.php" method="get">
		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom" autocomplete="off"><br>
		<label for="sire">Sire :</label>
		<input type="text" id="sire" name="sire"><br>
		<ul id="result"></ul>
	</form>


	<a href="ajout_equides.php" class="boutton_vertV2"><img src="ASSET/ico/plus2.png">équidé</a>

				
	<div id="Equides">
		<!-- faire un appel de la fonction affichage erreurs. -->
		<?php include_once('PHP/equide_functions/affichage/affichageEquides_fct.php') ?>
	</div>
	
	
</div>

<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>