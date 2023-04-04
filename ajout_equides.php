<?php
$titre ="Ajout d'équidé";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
?>
<?php include_once('PHP/equide_functions/modification/ajoutEquides_fct.php') ?>
		
<div class="ajout_equides">

		<h1>ajouter un équidé</h1>
		<div class="formulaire_1">
		<form method="post" class="formulaire_2" name="formajoutEquides" enctype="multipart/form-data">

			<a href="equides.php"><span class="material-symbols-outlined">close</span></a>

			<?php include_once('PHP/other_functions/affichageErreurs.php') ?>
			
			<label for="id_propriétaire">Propriétaire:</label>
			<select name="id_propriétaire" id="id_propriétaire" required>
                <?php 

                $sql = "SELECT * FROM `proprietaire`"; //ORDER BY `date_traitement` DESC
                $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

                if (mysqli_num_rows($result) > 0) {      
                
                    while($proprietaire = mysqli_fetch_array($result)){?>
				        <option value="<?=$proprietaire['id_proprietaire']?>"><?php echo($proprietaire['prenom'].' '.$proprietaire['nom'])?></option>
                   <?php } 
                    }else{?>
				        <option value="0">Aucune race</option>
                    <?php }
                   ?>
			</select><br>

			<label for="numSire">Numero de sire :</label>
			<input type="text" id="numSire" name="numSire" required pattern="[0-9]{9}" maxlength="9"><br>

			<label for="numUELN">Numero de UELN :</label>
			<input type="text" id="numUELN" name="numUELN" required maxlength="13"><br>

			<label for="nom_equide">Nom de l'equide :</label>
			<input type="text" id="nom_equide" name="nom_equide" required><br>

			<label for="dateNaissance_equide">Date de naissance :</label>
			<input type="date" id="dateNaissance_equide" name="dateNaissance_equide" required><br>

			<label for="lieuNaissance_equide">Lieu de naissance :</label>
			<input type="text" id="lieuNaissance_equide" name="lieuNaissance_equide" required><br>

			<label for="race_equide">Race :</label>
			<select name="race_equide" id="race_equide" required>
                <?php 

                $sql = "SELECT * FROM `race`"; //ORDER BY `date_traitement` DESC
                $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

                if (mysqli_num_rows($result) > 0) {      
                
                    while($race = mysqli_fetch_array($result)){?>
				        <option value="<?=$race['id_race']?>"><?php echo($race['nom_race'])?></option>
                   <?php } 
                    }else{?>
				        <option value="0">Aucune race</option>
                    <?php }
                   ?>
			</select><br>
			
			<label for="stud_equide">Stud :</label>
			<input type="text" id="stud_equide" name="stud_equide" required><br>

			<label for="lieuElevage_equide">Lieu d'elevage :</label>
			<input type="text" id="lieuElevage_equide" name="lieuElevage_equide" required><br>

			<label for="sexe_equide">Sexe du cheval :</label>
			<select id="sexe_equide" name="sexe_equide" required>
				<option value="Mâle">Mâle</option>
				<option value="Femelle">Femelle</option>
			</select><br>

			<label for="robe_equide">Robe :</label>
			<input type="text" id="robe_equide" name="robe_equide" required><br>

			<label for="naisseurVeterinaire_equide">Vétérinaire ayant assuré la naissance :</label>
			<input type="text" id="naisseurVeterinaire_equide" name="naisseurVeterinaire_equide" required><br>

			<label for="pere_equide">Nom du père :</label>
			<input type="text" id="pere_equide" name="pere_equide" required><br>

			<label for="mere_equide">Nom de la mère :</label>
			<input type="text" id="mere_equide" name="mere_equide" required><br>

			<label for="photo_equide">Photo de l'equide :</label>
			<input type="file" id="photo_equide" name="photo_equide" required><br>
			
			<p>Attributs physiques</p>

			<label for="tête_equide">Tête :</label>
			<textarea type="text" id="tête_equide" name="tête_equide"></textarea><br>

			<label for="antg_equide">Côté antérieur gauche :</label>
			<textarea type="text" id="antg_equide" name="antg_equide"></textarea><br>

			<label for="antd_equide">Côté antérieur droit :</label>
			<textarea type="text" id="antd_equide" name="antd_equide"></textarea><br>

			<label for="postg_equide">Côté postérieur gauche :</label>
			<textarea type="text" id="postg_equide" name="postg_equide"></textarea><br>

			<label for="postd_equide">Côté postérieur droit :</label>
			<textarea type="text" id="postd_equide" name="postd_equide"></textarea><br>

			<label for="marques_equide">Marque(s) :</label>
			<textarea type="text" id="marques_equide" name="marques_equide"></textarea><br>

			<button type="submit" name="ajouter">Ajouter </button>

		</form>
		</div>
</div>

<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>