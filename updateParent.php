<?php
$titre ="Modification";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
include_once('PHP/equide_functions/modification/updateParent_fct.php');

$info_error = array();
$info_succes = array();

$sireEquide = $_GET['sireEquide'];
$id_parent =$_GET['idParent'];

$sqlOld="SELECT ascendance.nom AS nom, ascendance.couleur AS couleur, ascendance.sire AS sire, ascendance.id_race AS id_race, ascendance.id_ascendance AS id_parent, race.nom_race AS nom_race 
FROM `ascendance`
JOIN `race`
ON ascendance.id_race = race.id_race 

WHERE ascendance.id_ascendance ='$id_parent'";

$resultOld = mysqli_query($mysqli, $sqlOld) or die(mysqli_error($mysqli));

if (mysqli_num_rows($resultOld) > 0) {      

    while($rowData = mysqli_fetch_array($resultOld)){

        $nomParent = $rowData['nom'];
        $sireParent = $rowData['sire'];
        $couleurParent = $rowData['couleur'];
        $idRaceParent =$rowData['id_race'];
        $nomRace = $rowData['nom_race'];

    }
}
?>
<div class="ajout_traitement"> <!-- vermifuge -->
    <h1>Ajouter un parent</h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

            <a href="equide_description.php?sireEquide=<?=$sireEquide?>"><span class="material-symbols-outlined">close</span></a>
            <label for="nomParent">Nom :</label>
            <input type="text" id="nomParent" name="nomParent" placeholder="Nom"  value="<?=$nomParent?>" required><br>

            <label for="sireParent">Sire :</label>
            <input type="text" id="sireParent" name="sireParent" placeholder="SIRE" maxlength="9" value="<?=$sireParent?>" required><br>

            <label for="couleurParent">Couleur :</label>
            <input type="text" id="couleurParent" name="couleurParent" placeholder="Couleur" value="<?=$couleurParent?>" required><br>

            <label for="race_equide">Race :</label>
			<select name="race_equide" id="race_equide"  value="<?=$idRaceParent?>" required>
                <option value="<?=$idRaceParent?>" selected><?=$nomRace?></option>
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

            <?php include_once('PHP/other_functions/affichageErreurs.php');?>

            <button type="submit" name="ajouter">Modifier</button>

        </form>
    </div>	
</div>

<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
