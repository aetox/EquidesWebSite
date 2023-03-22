<?php
$titre ="Modification";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
include_once('PHP/equide_functions/modification/updateEquide_fct.php');

$info_error = array();
$info_succes = array();

$idSire = $_GET['numSIRE'];
$sqlOld = "SELECT * FROM `equide` WHERE numSIRE='$idSire'";
$resultOld = mysqli_query($mysqli, $sqlOld) or die(mysqli_error($mysqli));
if (mysqli_num_rows($resultOld) > 0) {
    $oldequides = mysqli_fetch_array($resultOld);
}
?>
<div class="updateEquide">
    <h1>Modification de l'équidé n°<?=$idSire?></h1>
    <div class="formulaire_1">
    <form method="post" class="formulaire_2" name="formajoutEquides" enctype="multipart/form-data">
        <a href="equide_description.php?numSIRE=<?=$idSire?>"><span class="material-symbols-outlined">close</span></a>
        <label for="numSire">Numero de sire :</label>
        <input type="number" id="numSIRE" name="numSIRE" value="<?php echo $oldequides['numSIRE'] ?>" readonly required><br>

        <label for="numUELN">Numero de UELN :</label>
        <input type="number" id="numUELN" name="numUELN" value="<?php echo $oldequides['numUELN'] ?>" required><br>

        <label for="nom_equide">Nom de l'equide :</label>
        <input type="text" id="nom_equide" name="nom_equide" value="<?php echo $oldequides['nom_equide'] ?>" required><br>

        <label for="dateNaissance_equide">Date de naissance :</label>
        <input type="date" id="dateNaissance_equide" name="dateNaissance_equide" value="<?php echo $oldequides['dateNaissance_equide'] ?>" required><br>

        <label for="lieuNaissance_equide">Lieu de naissance :</label>
        <input type="text" id="lieuNaissance_equide" name="lieuNaissance_equide" value="<?php echo $oldequides['lieuNaissance_equide'] ?>" required><br>

        <label for="race_equide">Race :</label>
        <input type="text" id="race_equide" name="race_equide" value="<?php echo $oldequides['race_equide'] ?>" required><br>

        <label for="stud_equide">Stud :</label>
        <input type="text" id="stud_equide" name="stud_equide" value="<?php echo $oldequides['stud_equide'] ?>" required><br>

        <label for="lieuElevage_equide">Lieu d'élevage :</label>
        <input type="text" id="lieuElevage_equide" name="lieuElevage_equide" value="<?php echo $oldequides['lieuElevage_equide'] ?>" required><br>

        <label for="sexe_equide">Sexe du cheval :</label>
        <select id="sexe_equide" name="sexe_equide" required>
            <option value="M" <?php if ($oldequides['sexe_equide'] == 'M') {
                echo 'selected="selected"';
            } ?>>Mâle
            </option>
            <option value="F" <?php if ($oldequides['sexe_equide'] == 'F') {
                echo 'selected="selected"';
            } ?>>Femelle
            </option>
        </select>

        <label for="robe_equide">Robe :</label>
		<input type="text" id="robe_equide" name="robe_equide" value="<?php echo $oldequides['robe_equide']?>"  required><br>

		<label for="naisseurVeterinaire_equide">Veterinaire ayant assure la naissance :</label>
		<input type="text" id="naisseurVeterinaire_equide" name="naisseurVeterinaire_equide" value="<?php echo $oldequides['naisseurVeterinaire_equide']?>"  required><br>

		<label for="pere_equide">Père :</label>
		<input type="text" id="pere_equide" name="pere_equide" value="<?php echo $oldequides['pere_equide']?>"  required><br>

		<label for="mere_equide">Mère :</label>
		<input type="text" id="mere_equide" name="mere_equide" value="<?php echo $oldequides['mere_equide']?>"  required><br>

		<button type="submit" name="ajouter">Mettre à jour </button>
    </form>
	</div>

<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
