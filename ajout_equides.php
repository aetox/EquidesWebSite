<?php
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
$titre ="Mes équides";
?>
<?php include_once('PHP/equide_functions/modification/ajoutEquides_fct.php') ?>
		
<div id="ajoutEquides">

		<h1 class="titre_1">ajout d'équidé</h1>
		<form method="post" id="formAjoutEquides" name="formajoutEquides" enctype="multipart/form-data">

			<a href="equides.php"><span class="material-symbols-outlined">close</span></a>

			<label for="numSire">Numero de sire :</label>
			<input type="number" id="numSire" name="numSire" required><br>

			<label for="numUELN">Numero de UELN :</label>
			<input type="number" id="numUELN" name="numUELN" required><br>

			<label for="nom_equide">Nom de l'equide :</label>
			<input type="text" id="nom_equide" name="nom_equide" required><br>

			<label for="dateNaissance_equide">Date de naissance :</label>
			<input type="date" id="dateNaissance_equide" name="dateNaissance_equide" required><br>

			<label for="lieuNaissance_equide">Lieu de naissance :</label>
			<input type="text" id="lieuNaissance_equide" name="lieuNaissance_equide" required><br>

			<label for="race_equide">Race :</label>
			<input type="text" id="race_equide" name="race_equide" required><br>

			<label for="stud_equide">Stud :</label>
			<input type="text" id="stud_equide" name="stud_equide" required><br>

			<label for="lieuElevage_equide">Lieu d'elevage :</label>
			<input type="text" id="lieuElevage_equide" name="lieuElevage_equide" required><br>

			<label for="sexe_equide">Sexe du cheval :</label>
			<select id="sexe_equide" name="sexe_equide" required>
				<option value="M">Mâle</option>
				<option value="F">Femelle</option>
			</select>

			<label for="robe_equide">Robe :</label>
			<input type="text" id="robe_equide" name="robe_equide" required><br>

			<label for="naisseurVeterinaire_equide">Veterinaire ayant assure la naissance :</label>
			<input type="text" id="naisseurVeterinaire_equide" name="naisseurVeterinaire_equide" required><br>

			<label for="pere_equide">Pere :</label>
			<input type="text" id="pere_equide" name="pere_equide" required><br>

			<label for="mere_equide">Mere :</label>
			<input type="text" id="mere_equide" name="mere_equide" required><br>

			<label for="photo_equides">Photo de l'equide :</label>
			<input type="file" id="photo_equide" name="photo_equide" required><br>

			<button type="submit" name="ajouter">Ajouter </button>

		</form>
</div>

<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>