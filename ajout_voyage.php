<?php
$titre ="Créer un voyage";
ob_start();
include_once("header.php");
$idDetenteur = $_SESSION['id_detenteur'];
include_once('PHP/equide_functions/modification/ajoutTransport_fct.php');
if(isset($_SESSION['logged_user'])) {
?>

<div class="ajout_traitement">
    <h1>Créer une fiche de transport</h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

            <a href="carnet_transport.php"><span class="material-symbols-outlined">close</span></a>
            
            <label for="equideEnVoyage">Selectionnez l'équidé en voyage :</label>
                <select name="equideEnVoyage" id="equideEnVoyage">
                    <option value="default">Sélectionner votre équide</option>
                    <?php 
                    $sql =
                    "SELECT en_pension.date_debut AS epdd, en_pension.date_fin AS epdf,
                    equide.id_equide AS id_equide, equide.ueln AS uelnEquide, equide.nom AS nomEquide, equide.sexe,
                    race.nom_race,
                    proprietaire.nom AS nomProprietaire, proprietaire.prenom AS prenomProprietaire
                    FROM `registre_equide`
                    JOIN `en_pension`
                    ON registre_equide.id_registre = en_pension.id_registre
                    JOIN `equide`
                    ON equide.id_equide = en_pension.id_equide
                    JOIN `race`
                    ON equide.id_race = race.id_race
                    JOIN `proprietaire`
                    ON equide.id_proprietaire = proprietaire.id_proprietaire
                    WHERE id_detenteur='$idDetenteur'";
                    
                    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
                    
                    if (mysqli_num_rows($result) > 0) {      
                    
                        while($rowData = mysqli_fetch_array($result)){?>
                            <option value="<?=$rowData['id_equide']?>"><?=$rowData['nomEquide']?></option>
                        <?php }
                    }else { ?>
                        <option value="0">Aucun équidé</option>
                <?php }   ?>          
                </select>

            <label for="dateDepart">Date de départ</label>
            <input type="date" id="dateDepart" name="dateDepart" required><br>

            <label for="dateArrivee">Date d'arrivée</label>
            <input type="date" id="dateArrivee" name="dateArrivee" required><br>

            <label for="motifDeplacement">Motif de déplacement</label>
            <input type="text" id="motifDeplacement" name="motifDeplacement" required><br>

            <label for="lieuDepart">Lieu de départ</label>
            <input type="text" id="lieuDepart" name="lieuDepart" required><br>

            <label for="lieuArrivee">Lieu d'arrivée</label>
            <input type="text" id="lieuArrivee" name="lieuArrivee" required><br>

            <?php include_once('PHP/other_functions/affichageErreurs.php');?>

            <button type="submit" name="ajouter">Créer</button>

        </form>
    </div>	
</div>





<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>