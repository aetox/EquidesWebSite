<?php
$titre ="Ajouter un parent";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
$idSire = $_GET['sireEquide'];

include('PHP/equide_functions/modification/ajoutParent_fct.php');
?>

<div class="ajout_traitement"> <!-- vermifuge -->
    <h1>Ajouter un parent</h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

            <a href="equide_description.php?sireEquide=<?=$idSire?>"><span class="material-symbols-outlined">close</span></a>
            <label for="nomParent">Nom :</label>
            <input type="text" id="nomParent" name="nomParent" placeholder="Nom" required><br>

            <label for="sireParent">Sire :</label>
            <input type="text" id="sireParent" name="sireParent" placeholder="SIRE" maxlength="9"required><br>

            <label for="couleurParent">Couleur :</label>
            <input type="text" id="couleurParent" name="couleurParent" placeholder="Couleur" required><br>

            <fieldset>
                <legend>Selectionnez le type de parent:</legend>

                <div>
                <input type="radio" id="Pere" name="typeParent" value="Pere"
                        checked>
                <label for="Pere">Père</label>
                </div>

                <div>
                <input type="radio" id="Mere" name="typeParent" value="Mere">
                <label for="Mere">Mère</label>
                </div>
            </fieldset>



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

            <?php include_once('PHP/other_functions/affichageErreurs.php');?>

            <button type="submit" name="ajouter">Ajouter</button>

        </form>
    </div>	
</div>


<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
