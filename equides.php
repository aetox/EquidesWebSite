<?php
$titre ="Mes équides";
ob_start();
include_once("header.php");
	
if(isset($_SESSION['logged_user'])) {
	if(isset($_SESSION['id_detenteur'])){
		$id_detenteur=$_SESSION['id_detenteur'];

	 	include_once('PHP/equide_functions/modification/ajoutEquides_fct.php'); ?>

	<div class="equides">

		<h1 class="titre_1">Mes équidés</h1>

		<?php
			$ecurieDetenteur = "SELECT * 
			FROM `detenteur`
			JOIN `registre_equide`
			ON detenteur.id_detenteur = registre_equide.id_detenteur
			WHERE detenteur.id_detenteur=$id_detenteur";

     		$resultecurieDetenteur = mysqli_query($mysqli,$ecurieDetenteur) or die(mysqli_error($mysqli));

     		if(mysqli_num_rows($resultecurieDetenteur) > 0){
         	while($rowData = mysqli_fetch_array($resultecurieDetenteur)){ ?>

				<div class='web'>
					<div class = "recherche">
						<img src="ASSETS/ico/recherche.png" alt="">
						<input type="text" class="search_keyword" id="search_keyword_id" placeholder="Rechercher un équidé" />
					</div>
					<div id="result"></div>
				</div>
					
				<a href="ajout_equides.php" class="boutton_vertV2"><img src="ASSETS/ico/plus2.png">équidé</a>
				<br>
							
				<div id="Equides">
					<!-- faire un appel de la fonction affichage erreurs. -->
					<?php include_once('PHP/equide_functions/affichage/affichageEquides_fct.php') ?>
				</div>
						
				<h3><a class ="boutton_pdf" href="equides_sans_pension.php">Equides sans pension</a></h3>

			</div>

				<?php }
				}else{ ?>
					<div class="equides">
						<h3>Veuillez engistrer une écurie</h3>
						<br>
						<a href="ajout_ecurie.php" class="boutton_vertV2"><img src="ASSETS/ico/plus2.png">ecurie</a>
					</div>
					 <?php }
				
			}elseif(isset($_SESSION['id_proprietaire'])){
				?>
					<div class="equides">

					<h1 class="titre_1">Mes équidés</h1>

					<div id="Equides">
							<!-- faire un appel de la fonction affichage erreurs. -->
							<?php include_once('PHP/equide_functions/affichage/affichageEquides_fct.php') ?>
					
						</div>

				<?php } ?>
					
			</div>
<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>