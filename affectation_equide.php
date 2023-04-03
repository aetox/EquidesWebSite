<?php
$titre ="Affecter un équidé";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
$idSire = $_GET['sireEquide'];
$id_detenteur = $_SESSION['id_detenteur'];
include_once('PHP/equide_functions/modification/affectationEquide_fct.php');
?>

<div class="ajout_traitement"> <!-- vermifuge -->
    <h1>Ajouter un vermifuge pour l'équidé n°<?=$idSire?></h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

            <a href="equides_sans_pension.php"><span class="material-symbols-outlined">close</span></a>

            <label for="ecurie">Ecurie :</label>
			<select name="ecurie" id="ecurie" required>
                <?php 

                $sql = "SELECT registre_equide.nom_ecurie AS nom_ecurie, registre_equide.id_registre AS id_registre FROM `registre_equide` WHERE id_detenteur =$id_detenteur"; //ORDER BY `date_traitement` DESC
                $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

                if (mysqli_num_rows($result) > 0) {      
                
                    while($race = mysqli_fetch_array($result)){?>
				        <option value="<?=$race['id_registre']?>"><?php echo($race['nom_ecurie'])?></option>
                   <?php } 
                    }else{?>
				        <option value="0">Aucune race</option>
                    <?php }
                   ?>
			</select><br>

            <label for="dateDebut">Date de début :</label>
            <input type="date" id="dateDebut" name="dateDebut" required><br>

            <label for="dateFin">Date de fin :</label>
            <input type="date" id="dateFin" name="dateFin" required><br>

            <?php include_once('PHP/other_functions/affichageErreurs.php');?>

            <button type="submit" name="ajouter">Affecter</button>

        </form>
    </div>	
</div>


<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
