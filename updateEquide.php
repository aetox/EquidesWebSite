<?php
$titre ="Modification";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
include_once('PHP/equide_functions/modification/updateEquide_fct.php');

$info_error = array();
$info_succes = array();

$sire = $_GET['sire'];
$sqlOld = "SELECT equide.sire AS sire_equide, equide.ueln AS ueln_equide, equide.nom AS nom_equide, equide.date_naissance AS date_naissance, equide.lieu_naissance AS lieu_naissance, 
equide.id_race AS id_race, equide.stud AS equide_stud, equide.robe AS robe_equide, equide.sexe AS sexe_equide, veterinaire.prenom AS prenom_veterinaire ,veterinaire.nom AS nom_veterinaire, 
registre_equide.nom_ecurie AS nom_ecurie, race.nom_race AS nom_race, equide.tete AS tete, equide.antg AS antg, equide.antd AS antd, equide.postg AS postg, equide.postd AS postd, equide.marques AS marques
FROM `equide`
JOIN `race`
ON equide.id_race=race.id_race
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
        <input type="number" id="numSIRE" name="numSIRE" value="<?php echo $oldequides['sire_equide'] ?>" readonly required><br>

        <label for="numUELN">Numero de UELN :</label>
        <input type="number" id="numUELN" name="numUELN" value="<?php echo $oldequides['ueln_equide'] ?>" required><br>

        <label for="nom_equide">Nom de l'equide :</label>
        <input type="text" id="nom_equide" name="nom_equide" value="<?php echo $oldequides['nom_equide'] ?>" required><br>

        <label for="dateNaissance_equide">Date de naissance :</label>
        <input type="date" id="dateNaissance_equide" name="dateNaissance_equide" value="<?php echo $oldequides['date_naissance'] ?>" required><br>

        <label for="lieuNaissance_equide">Lieu de naissance :</label>
        <input type="text" id="lieuNaissance_equide" name="lieuNaissance_equide" value="<?php echo $oldequides['lieu_naissance'] ?>" required><br>

        <label for="race_equide">Race : NE PAS MODIFIER</label>
        <input type="text" id="race_equide" name="race_equide" value="<?php echo $oldequides['nom_race'] ?>" required readonly><br>

        <label for="stud_equide">Stud :</label>
        <input type="text" id="stud_equide" name="stud_equide" value="<?php echo $oldequides['equide_stud'] ?>" required><br>

        <label for="lieuElevage_equide">Lieu d'élevage : NE PAS MODIFIER</label>
        <input type="text" id="lieuElevage_equide" name="lieuElevage_equide" value="<?php echo $oldequides['nom_ecurie'] ?>" readonly required><br>

        <label for="sexe">Sexe du cheval :</label>
        <select id="sexe" name="sexe" required>
            <option value="Mâle" <?php if ($oldequides['sexe_equide'] == 'Mâle') {
                echo 'selected="selected"';
            } ?>>Mâle
            </option>
            <option value="Femelle" <?php if ($oldequides['sexe_equide'] == 'Femelle') {
                echo 'selected="selected"';
            } ?>>Femelle
            </option>
        </select>

        <label for="robe_equide">Robe :</label>
		<input type="text" id="robe_equide" name="robe_equide" value="<?php echo $oldequides['robe_equide']?>"  required><br>

		<label for="naisseurVeterinaire_equide">Veterinaire ayant assure la naissance : NE PAS MODIFIER</label>
		<input type="text" id="naisseurVeterinaire_equide" name="naisseurVeterinaire_equide" value="<?=$oldequides['prenom_veterinaire'].' '.$oldequides['nom_veterinaire']?>" readonly required><br> 
		<!-- <label for="pere_equide">Père :</label>
		<input type="text" id="pere_equide" name="pere_equide" value="<?php echo $oldequides['pere_equide']?>"  required><br>

		<label for="mere_equide">Mère :</label>
		<input type="text" id="mere_equide" name="mere_equide" value="<?php echo $oldequides['mere_equide']?>"  required><br> -->


        <p>Attributs physiques</p>

        <label for="tête_equide">Tête :</label>
        <textarea type="text" id="tête_equide" name="tête_equide"><?php echo $oldequides['tete']?></textarea><br>

        <label for="antg_equide">Côté antérieur gauche :</label>
        <textarea type="text" id="antg_equide" name="antg_equide"><?php echo $oldequides['antg']?></textarea><br>

        <label for="antd_equide">Côté antérieur droit :</label>
        <textarea type="text" id="antd_equide" name="antd_equide"><?php echo $oldequides['antd']?></textarea><br>

        <label for="postg_equide">Côté postérieur gauche :</label>
        <textarea type="text" id="postg_equide" name="postg_equide"><?php echo $oldequides['postg']?></textarea><br>

        <label for="postd_equide">Côté postérieur droit :</label>
        <textarea type="text" id="postd_equide" name="postd_equide"><?php echo $oldequides['postd']?></textarea><br>

        <label for="marques_equide">Marque(s) :</label>
        <textarea type="text" id="marques_equide" name="marques_equide"><?php echo $oldequides['marques']?></textarea><br>

		<button type="submit" name="ajouter">Mettre à jour </button>
    </form>
	</div>

<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
