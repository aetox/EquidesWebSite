<?php
$titre ="Mes équides";
include("header.php");
?>
<?php include_once('PHP/equide_functions/modification/ajoutEquides_fct.php') ?>

<h1>Mes Equidés</h1>
			
<div id="Equides">

<!-- faire un appel de la fonction affichage erreurs. -->

	<?php include_once('PHP/equide_functions/affichage/affichageEquides_fct.php') ?>
	
</div>
		
<h3 id="ajoutEquideH3"><a href="ajout_equides.php">Ajouter un Equidés</a></h3>

<?php include("footer.php"); ?>