<?php
$titre ="Modification Vétérinaire";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {

$id_veterinaire =$_GET['idVeterinaire'];

include_once('PHP/ecurie_functions/modification/updateVeterinaire_fct.php');

$info_error = array();
$info_succes = array();


    $sql =
    "SELECT veterinaire.nom as nomVeto, veterinaire.prenom AS prenomVeto, veterinaire.rue AS rueVeto, veterinaire.commune AS communeVeto, veterinaire.code_postal AS cpVeto,
    groupement_veterinaire.nom_groupement AS nom_groupement, groupement_veterinaire.id_groupement_veterinaire AS id_groupement,
    affectation_veterinaire.type_veterinaire AS type_veterinaire, affectation_veterinaire.date_debut AS ddaf, affectation_veterinaire.date_fin AS dfaf 
    FROM `veterinaire`
    JOIN `affectation_veterinaire`
    ON veterinaire.id_veterinaire = affectation_veterinaire.id_veterinaire
    JOIN `groupement_veterinaire`
    ON veterinaire.id_groupement_veterinaire = groupement_veterinaire.id_groupement_veterinaire
    WHERE veterinaire.id_veterinaire='$id_veterinaire'";


    $resultOld = mysqli_query($mysqli,$sql);

    if(mysqli_num_rows($resultOld) > 0){
        while($rowDataOld=mysqli_fetch_array($resultOld)){

            $nomVeto = $rowDataOld['nomVeto'];
            $prenomVeto = $rowDataOld['prenomVeto'];
            $rueVeto = $rowDataOld['rueVeto'];
            $communeVeto = $rowDataOld['communeVeto'];
            $codePostal = $rowDataOld['cpVeto'];
            $typeVeterinaire = $rowDataOld['type_veterinaire'];
            $dateDebutAffectation =$rowDataOld['ddaf'];
            $dateFinAffectation =$rowDataOld['dfaf'];

        }
    }

?>
<div class="ajout_traitement"> <!-- veto -->
    <h1>Ajouter un Vétérinaire</h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

        <a href="carte_veterinaire.php?idVeterinaire=<?=$id_veterinaire?>"><span class="material-symbols-outlined">close</span></a>

        <label for="nomVeterinaire">Nom :</label>
        <input type="text" id="nomVeterinaire" name="nomVeterinaire" placeholder="Nom" value="<?=$nomVeto?>" required><br>

        <label for="prenomVeterinaire">Prénom :</label>
        <input type="text" id="prenomVeterinaire" name="prenomVeterinaire" placeholder="Prénom" value="<?=$prenomVeto?>" required><br>

        <label for="rueVeterinaire">Rue :</label>
        <input type="text" id="rueVeterinaire" name="rueVeterinaire" placeholder="Rue + numéro" value="<?=$rueVeto?>"  required><br>         

        <label for="communeVeterinaire">Commune :</label>
        <input type="text" id="communeVeterinaire" name="communeVeterinaire" placeholder="Commune" value="<?=$communeVeto?>"  required><br>

        <label for="codePostalVeterinaire">Code Postal :</label>
        <input type="text" id="codePostalVeterinaire" name="codePostalVeterinaire" placeholder="Code Postal" maxlength="5" value="<?=$codePostal?>" required><br>  

        <label for="typeVeterinaire">Type de Vétérinaire :</label>
        <select name="typeVeterinaire" id="typeVeterinaire">
            <option value="<?=$typeVeterinaire?>" default><?=$typeVeterinaire?></option>
            <option value="Sanitaire">Sanitaire</option>
            <option value="Courant">Courant</option>

        </select>

        <label for="dateDebutAffectationVeterinaire">Date de début d'affectation :</label>
        <input type="date" id="dateDebutAffectationVeterinaire" name="dateDebutAffectationVeterinaire" value="<?=$dateDebutAffectation?>" required><br>  

        <label for="dateFinAffectationVeterinaire">Date de fin d'affectation :</label>
        <input type="date" id="dateFinAffectationVeterinaire" name="dateFinAffectationVeterinaire" value="<?=$dateFinAffectation?>"  required><br>  

        <?php include('PHP/other_functions/affichageErreurs.php');?>

        <button type="submit" name="ajouter">Mettre à jour</button>

        </form>
    </div>	
</div>



?>

<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>

