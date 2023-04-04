<?php
$titre ="Modifier votre écurie";
ob_start();
include_once("header.php");

if(isset($_SESSION['logged_user']) && isset($_SESSION['id_detenteur'])){

include_once('PHP/ecurie_functions/modification/updateEcurie_fct.php');

$idDetenteur = $_SESSION['id_detenteur'];

//On vérifie ici l'existence d'une écurie rattachée au détenteur, si c'est le cas, il sera redirigé vers la page ecurie.php, sinon il pourra en créer une
$ecuriesql =
"SELECT detenteur.nom AS detenteurNom, detenteur.prenom AS detenteurPrenom,
registre_equide.id_registre AS idRegistre, registre_equide.nom_ecurie AS nomEcurie, registre_equide.rue AS registreRue,
registre_equide.commune AS registreCommune, registre_equide.code_postal AS registreCodePostal, registre_equide.siret, registre_equide.espece AS registreEspece
FROM `registre_equide`
JOIN `detenteur`
ON registre_equide.id_detenteur = detenteur.id_detenteur
WHERE registre_equide.id_detenteur='$idDetenteur'
ORDER BY registre_equide.id_registre ASC";

$results = mysqli_query($mysqli,$ecuriesql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($results) > 0) {

    while($rowData = mysqli_fetch_array($results)){

        $idRegistre = $rowData['idRegistre'];
        $nomEcurie = $rowData['nomEcurie'];
        $detenteurNom = $rowData['detenteurNom'];
        $detenteurPrenom = $rowData['detenteurPrenom'];
        $registreRue = $rowData['registreRue'];
        $registreCommune = $rowData['registreCommune'];
        $registreCodePostal = $rowData['registreCodePostal'];
        $siret = $rowData['siret'];
        $registreEspece =$rowData['registreEspece'];}}?>
		<div class="ajout_ecurie">

				<h1>ajouter une écurie</h1>
				<div class="formulaire_1">
				<form method="post" class="formulaire_2" name="formajoutEcurie" enctype="multipart/form-data">

					<a href="ecurie_description.php"><span class="material-symbols-outlined">close</span></a>
					<br>
					<label for="id_propriétaire">Vous (détenteur de l'écurie) :</label><strong><?php echo $detenteurNom;?> <?php echo $detenteurPrenom ?></strong>

					<label for="nom_ecurie">Nom de l'écurie :</label>
					<input type="text" id="nom_ecurie" name="nom_ecurie" value="<?=$nomEcurie?>" required><br>

					<label for="SIRET">SIRET :</label>
					<input type="text" id="SIRET" name="SIRET" minlength="12" maxlength="14" placeholder="14 chiffres" value="<?=$siret?>"  required><br>

					<label for="rue">Adresse (numéro + rue)</label>
					<input type="text" id="rue" name="rue" value="<?=$registreRue?>" required><br>

					<label for="commune">Commune :</label>
					<input type="text" id="commune" name="commune" value="<?=$registreCommune?>" required><br>

					<label for="code_postal">Code postal :</label>
					<input type="text" id="code_postal" name="code_postal" minlength="5" maxlength="5" placeholder="5 chiffres" value="<?=$registreCodePostal?>" required><br>

					<label for="espece">Espece :</label>
					<select id="espece" name="espece"  value="<?=$registreEspece?>"required>
						<option value="Equides">Equides</option>
						<option value="Chevaux">Chevaux</option>
						<option value="Ânes">Ânes</option>
						<option value="Zèbres">Zèbres</option>
					</select><br>
                    
                    <?php include_once('PHP/other_functions/affichageErreurs.php');?>

					<button type="submit" name="ajouter">Modifier</button>

				</form>
				</div>
		</div>

<?php include_once("footer.php");
	
}
else {
    header("Location: index.php");
}
ob_end_flush(); ?>