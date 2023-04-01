<?php
$titre ="Ajouter un vaccin";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
$idSire = $_GET['sire'];
include_once('PHP/equide_functions/modification/ajoutVaccin_fct.php');
?>

<div class="ajout_vaccin">
    <h1>Ajouter un vaccin pour l'équidé n°<?=$idSire?></h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

            <a href="carnet_vaccination.php?sire=<?=$idSire?>"><span class="material-symbols-outlined">close</span></a>
            <label for="nomVaccin">Nom du vaccin :</label>
            <input type="text" id="nomVaccin" name="nomVaccin" placeholder="Nom du Vaccin" required><br>

            <label for="numLot">Numéro de lot :</label>
            <input type="text" id="numLot" name="numLot" placeholder="XXXXXX" required><br>

            <label for="maladieConcernee">Maladie concernées :</label>
            <input type="text" id="maladieConcernee" name="maladieConcernee" placeholder="Maladie concernées" required><br>

            <label for="dateVaccin">Date de vaccination :</label>
            <input type="date" id="dateVaccin" name="dateVaccin" required><br>

            <label for="lieuVaccin">Lieu de vaccination :</label>
            <input type="text" id="lieuVaccin" name="lieuVaccin" placeholder="Lieu" required><br>
<!--
            <label for="veterinaireVaccin">Vétérinaire :</label>
             <select name="veterinaireVaccin" id="veterinaireVaccin">
                <?php 

                $sql = "SELECT veterinaire.id_veterinaire AS id_veterinaire, veterinaire.nom AS nom_veterinaire, veterinaire.prenom AS prenom_veterinaire
                FROM `equide`
                JOIN `en_pension`
                ON equide.id_equide=en_pension.id_equide
                JOIN `registre_equide`
                ON en_pension.id_registre=registre_equide.id_registre
                JOIN `affectation_veterinaire`
                ON registre_equide.id_affectation_veterinaire=affectation_veterinaire.id_affectation_veterinaire
                JOIN `veterinaire`
                ON affectation_veterinaire.id_veterinaire=veterinaire.id_veterinaire
                JOIN `groupement_veterinaire`
                ON veterinaire.id_groupement_veterinaire=groupement_veterinaire.id_groupement_veterinaire
   
                WHERE sire ='$idSire' "; //ORDER BY `date_traitement` DESC
                $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


                if (mysqli_num_rows($result) > 0) {      
                
                    while($vaccins = mysqli_fetch_array($result)){?>
				        <option value="<?=$vaccins['id_veterinaire']?>"><?php echo($vaccins['prenom_veterinaire'].' '.$vaccins['nom_veterinaire'])?></option>
                   <?php } 
                    }else{?>
				        <option value="0">Aucun vétérinaire</option>
                    <?php }
                   ?>
            </select> -->

            <label for="commentaireVaccin">Commentaire :</label>
            <input type="text" id="commentaireVaccin" name="commentaireVaccin" placeholder="Signature" required><br>


            <label for="signatureVaccin">Signature :</label>
            <input type="text" id="signatureVaccin" name="signatureVaccin" placeholder="Signature" required><br>

            <?php include_once('PHP/other_functions/affichageErreurs.php');?>

            <button type="submit" name="ajouter">Ajouter</button>
        </form>
    </div>


<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
