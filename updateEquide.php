<?php
$titre ="Modification";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
include_once('PHP/equide_functions/modification/updateEquide_fct.php');

$info_error = array();
$info_succes = array();

$sire = $_GET['sire'];
$sqlOld = "SELECT *
FROM `equide`
JOIN  `en_pension`
ON equide.id_equide=en_pension.id_equide
JOIN `registre_equide`
ON en_pension.id_registre=registre_equide.id_registre
JOIN `affectation_veterinaire`
ON registre_equide.id_affectation_veterinaire=affectation_veterinaire.id_affectation_veterinaire
JOIN `veterinaire`
ON affectation_veterinaire.id_veterinaire=veterinaire.id_veterinaire

WHERE sire='$sire'";
$resultOld = mysqli_query($mysqli, $sqlOld) or die(mysqli_error($mysqli));
if (mysqli_num_rows($resultOld) > 0) {
    $oldequides = mysqli_fetch_array($resultOld);
}
?>
<div class="updateEquide">
    <h1>Modification de l'équidé n°<?=$sire?></h1>
    <div class="formulaire_1">
    <form method="post" class="formulaire_2" name="formajoutEquides" enctype="multipart/form-data">
        <a href="equide_description.php?sireEquide=<?=$sire?>"><span class="material-symbols-outlined">close</span></a>
        <label for="numSire">Numero de sire :</label>
        <input type="number" id="numSIRE" name="numSIRE" value="<?php echo $oldequides['sire'] ?>" readonly required><br>

        <label for="numUELN">Numero de UELN :</label>
        <input type="number" id="numUELN" name="numUELN" value="<?php echo $oldequides['ueln'] ?>" required><br>

        <label for="nom_equide">Nom de l'equide :</label>
        <input type="text" id="nom_equide" name="nom_equide" value="<?php echo $oldequides['nom'] ?>" required><br>

        <label for="dateNaissance_equide">Date de naissance :</label>
        <input type="date" id="dateNaissance_equide" name="dateNaissance_equide" value="<?php echo $oldequides['date_naissance'] ?>" required><br>

        <label for="lieuNaissance_equide">Lieu de naissance :</label>
        <input type="text" id="lieuNaissance_equide" name="lieuNaissance_equide" value="<?php echo $oldequides['lieu_naissance'] ?>" required><br>

        <label for="race_equide">Race : NE PAS MODIFIER</label>
        <input type="text" id="race_equide" name="race_equide" value="<?php echo $oldequides['id_race'] ?>" required><br>

        <label for="stud_equide">Stud :</label>
        <input type="text" id="stud_equide" name="stud_equide" value="<?php echo $oldequides['stud'] ?>" required><br>

        <label for="lieuElevage_equide">Lieu d'élevage :</label>
        <input type="text" id="lieuElevage_equide" name="lieuElevage_equide" value="<?php echo $oldequides['nom_ecurie'] ?>" readonly required><br>

        <label for="sexe">Sexe du cheval :</label>
        <select id="sexe" name="sexe" required>
            <option value="Mâle" <?php if ($oldequides['sexe'] == 'Mâle') {
                echo 'selected="selected"';
            } ?>>Mâle
            </option>
            <option value="Femelle" <?php if ($oldequides['sexe'] == 'Femelle') {
                echo 'selected="selected"';
            } ?>>Femelle
            </option>
        </select>

        <label for="robe_equide">Robe :</label>
		<input type="text" id="robe_equide" name="robe_equide" value="<?php echo $oldequides['robe']?>"  required><br>

		<label for="naisseurVeterinaire_equide">Veterinaire ayant assure la naissance : NE PAS MODIFIER</label>
		<input type="text" id="naisseurVeterinaire_equide" name="naisseurVeterinaire_equide" value="<?php echo $oldequides['id_veterinaire']?>"  required><br> 
		<!-- <label for="pere_equide">Père :</label>
		<input type="text" id="pere_equide" name="pere_equide" value="<?php echo $oldequides['pere_equide']?>"  required><br>

		<label for="mere_equide">Mère :</label>
		<input type="text" id="mere_equide" name="mere_equide" value="<?php echo $oldequides['mere_equide']?>"  required><br> -->

		<button type="submit" name="ajouter">Mettre à jour </button>
    </form>
	</div>

<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
