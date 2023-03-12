<?php include("header.php");
include_once('php/user_functions/updateEquide_fct.php');

$info = array();
$idSire = $_GET['numSIRE'];
$sqlOld = "SELECT * FROM `equide` WHERE numSIRE='$idSire'";
$resultOld = mysqli_query($mysqli, $sqlOld) or die(mysqli_error($mysqli));
if (mysqli_num_rows($resultOld) > 0) {
    $oldequides = mysqli_fetch_array($resultOld);
}
?>

<div id="updateEquides">

    <form method="post" id="formAjoutEquides" name="formajoutEquides" enctype="multipart/form-data">

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

        <label for="lieuElevage_equide">Lieu d'elevage :</label>
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

			<label for="pere_equide">Pere :</label>
			<input type="text" id="pere_equide" name="pere_equide" value="<?php echo $oldequides['pere_equide']?>"  required><br>

			<label for="mere_equide">Mere :</label>
			<input type="text" id="mere_equide" name="mere_equide" value="<?php echo $oldequides['mere_equide']?>"  required><br>


			<button type="submit" name="ajouter">Ajouter </button>
    		</form>
	</div>