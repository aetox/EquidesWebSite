<?php
$titre ="Mes équides";
include_once("header.php");
?>
<?php include_once('PHP/equide_functions/modification/ajoutEquides_fct.php') ?>

<div class="equides">

	<h1 class="titre_1">Mes équidés</h1>
				
	<div id="Equides">
		<!-- faire un appel de la fonction affichage erreurs. -->
		<?php include_once('PHP/equide_functions/affichage/affichageEquides_fct.php') ?>
	</div>
	
	<a href="ajout_equides.php" class="boutton_vertV2"><img src="ASSET/ico/plus.png">équidé</a>
	
</div>

<?php include_once("footer.php"); ?>