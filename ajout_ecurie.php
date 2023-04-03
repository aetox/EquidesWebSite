<?php
$titre ="Ajout d'une écurie";
ob_start();
include_once("header.php");

if(isset($_SESSION['logged_user']) && isset($_SESSION['id_detenteur'])){

include_once('PHP/equide_functions/modification/ajoutEcurie_fct.php');

$idDetenteur = $_SESSION['id_detenteur'];


//On vérifie ici l'existence d'une écurie rattachée au détenteur, si c'est le cas, il sera redirigé vers la page ecurie.php, sinon il pourra en créer une
$verif =
"SELECT registre_equide.id_detenteur AS reid
FROM `detenteur`
JOIN `registre_equide`
ON detenteur.id_detenteur = registre_equide.id_detenteur
WHERE registre_equide.id_detenteur='$idDetenteur'";

$resultat = mysqli_query($mysqli,$verif) or die(mysqli_error($mysqli));
    if (mysqli_num_rows($resultat) > 0) {
        header("Location: ecurie.php");}
	else {
		$sql =
		"SELECT nom, prenom
		FROM `detenteur`
		WHERE id_detenteur='$idDetenteur'";
		$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
			if (mysqli_num_rows($result) > 0) {
				while($rowData = mysqli_fetch_array($result)){
					$nom = $rowData['nom'];
					$prenom = $rowData['prenom'];}}
		?>

		<div class="ajout_ecurie">

				<h1>ajouter une écurie</h1>
				<div class="formulaire_1">
				<form method="post" class="formulaire_2" name="formajoutEcurie" enctype="multipart/form-data">

					<a href="ecurie.php"><span class="material-symbols-outlined">close</span></a>
					<br>
					<label for="id_propriétaire">Vous (détenteur de l'écurie) :</label><strong><?php echo $nom;?> <?php echo $prenom ?></strong>

					<label for="nom_ecurie">Nom de l'écurie :</label>
					<input type="text" id="nom_ecurie" name="nom_ecurie" required><br>

					<label for="SIRET">SIRET :</label>
					<input type="text" id="SIRET" name="SIRET" minlength="12" maxlength="14" placeholder="14 chiffres" required><br>

					<label for="rue">Adresse (numéro + rue)</label>
					<input type="text" id="rue" name="rue" required><br>

					<label for="commune">Commune :</label>
					<input type="text" id="commune" name="commune" required><br>

					<label for="code_postal">Code postal :</label>
					<input type="text" id="code_postal" name="code_postal" minlength="5" maxlength="5" placeholder="5 chiffres" required><br>

					<label for="espece">Espece :</label>
					<select id="espece" name="espece" required>
						<option value="Equides">Equides</option>
						<option value="Chevaux">Chevaux</option>
						<option value="Ânes">Ânes</option>
						<option value="Zèbres">Zèbres</option>
					</select><br>

					<button type="submit" name="ajouter">Ajouter</button>

				</form>
				</div>
		</div>

<?php include_once("footer.php"); ?>
<?php }}else {
    header("Location: index.php");
}ob_end_flush(); ?>