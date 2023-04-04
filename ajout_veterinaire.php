<?php
$titre ="Ajouter un vétérinaire";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
include_once('PHP/ecurie_functions/modification/ajoutVeterinaire_fct.php');
$id_detenteur = $_SESSION['id_detenteur'];
?>


<div class="ajout_traitement"> <!-- vermifuge -->
    <h1>Ajouter un Vétérinaire</h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

        <a href="ecurie_description.php"><span class="material-symbols-outlined">close</span></a>

        <label for="nomVeterinaire">Nom :</label>
        <input type="text" id="nomVeterinaire" name="nomVeterinaire" placeholder="Nom" required><br>

        <label for="prenomVeterinaire">Prénom :</label>
        <input type="text" id="prenomVeterinaire" name="prenomVeterinaire" placeholder="Prénom" required><br>

        <label for="rueVeterinaire">Rue :</label>
        <input type="text" id="rueVeterinaire" name="rueVeterinaire" placeholder="Rue + numéro" required><br>         

        <label for="communeVeterinaire">Commune :</label>
        <input type="text" id="communeVeterinaire" name="communeVeterinaire" placeholder="Commune" required><br>

        <label for="codePostalVeterinaire">Code Postal :</label>
        <input type="text" id="codePostalVeterinaire" name="codePostalVeterinaire" placeholder="Code Postal" maxlength="5" required><br>  

        <label for="typeVeterinaire">Type de Vétérinaire :</label>
        <select name="typeVeterinaire" id="typeVeterinaire">
            <option value="Sanitaire">Sanitaire</option>
            <option value="Courant">Courant</option>

        </select>

            <label for="groupementVeterinaire">Groupement de vétérinaire :</label>
            <select name="groupementVeterinaire" id="groupementVeterinaire">
        
        <?php 

            $sql = "SELECT groupement_veterinaire.id_groupement_veterinaire AS id_groupement, groupement_veterinaire.nom_groupement AS nom_groupement
            FROM `registre_equide`
            JOIN `affectation_veterinaire`
            ON registre_equide.id_affectation_veterinaire=affectation_veterinaire.id_affectation_veterinaire
            JOIN `veterinaire`
            ON affectation_veterinaire.id_veterinaire=veterinaire.id_veterinaire
            JOIN `groupement_veterinaire`
            ON veterinaire.id_groupement_veterinaire=groupement_veterinaire.id_groupement_veterinaire

            WHERE id_detenteur ='$id_detenteur' ";
            $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


            if (mysqli_num_rows($result) > 0) {      

                while($groupement = mysqli_fetch_array($result)){?>
                    <option value="<?=$groupement['id_groupement']?>"><?php echo($groupement['nom_groupement'])?></option>
            <?php } 
                }else{?>
                    <option value="0">Aucun groupement</option>
                <?php }
            ?>
        </select> 

        <label for="dateDebutAffectationVeterinaire">Date de début d'affectation :</label>
        <input type="date" id="dateDebutAffectationVeterinaire" name="dateDebutAffectationVeterinaire" required><br>  

        <label for="dateFinAffectationVeterinaire">Date de fin d'affectation :</label>
        <input type="date" id="dateFinAffectationVeterinaire" name="dateFinAffectationVeterinaire" required><br>  

        <?php include_once('PHP/other_functions/affichageErreurs.php');?>

        <button type="submit" name="ajouter">Ajouter</button>

        </form>
    </div>	
</div>


<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
