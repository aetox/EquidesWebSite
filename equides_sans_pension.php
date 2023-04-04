<?php
$titre ="équides sans pension";
ob_start();
include_once("header.php");
	
if(isset($_SESSION['logged_user'])) {
	if(isset($_SESSION['id_detenteur'])){
?>
	<?php include_once('PHP/equide_functions/modification/ajoutEquides_fct.php') ?>

	<div class="equides">

		<h1 class="titre_1">Equidés sans pension</h1>
					
		<div id="Equides">
			<!-- faire un appel de la fonction affichage erreurs. -->
			<?php include_once('PHP/equide_functions/affichage/affichageEquidesSansPension_fct.php') ?>
		</div>
		
	</div>

<?php }elseif(isset($_SESSION['id_proprietaire'])){
?>
	<div class="equides">

	<h1 class="titre_1">Mes équidés</h1>

	<div id="Equides">
			<!-- faire un appel de la fonction affichage erreurs. -->
			<?php include_once('PHP/equide_functions/affichage/affichageEquides_fct.php') ?>
	</div>

<?php };
	
include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>