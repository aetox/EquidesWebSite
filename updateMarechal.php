
<?php
$titre ="Modification Vétérinaire";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {

$id_Marechal =$_GET['idMarechal'];

include_once('PHP/ecurie_functions/modification/updateMarechal_fct.php');

$info_error = array();
$info_succes = array();


    $sql =
    "SELECT marechal.nom as nomMarechal, marechal.prenom AS prenomMarechal, marechal.rue AS rueMarechal, marechal.commune AS communeMarechal, marechal.code_postal AS cpMarechal,
    affectation_marechal.date_debut AS ddaf, affectation_marechal.date_fin AS dfaf 
    FROM `marechal`
    JOIN `affectation_marechal`
    ON marechal.id_marechal = affectation_marechal.id_marechal
 
    WHERE marechal.id_marechal='$id_Marechal'";


    $resultOld = mysqli_query($mysqli,$sql);

    if(mysqli_num_rows($resultOld) > 0){
        while($rowDataOld=mysqli_fetch_array($resultOld)){

            $nomMarechal = $rowDataOld['nomMarechal'];
            $prenomMarechal = $rowDataOld['prenomMarechal'];
            $rueMarechal = $rowDataOld['rueMarechal'];
            $communeMarechal = $rowDataOld['communeMarechal'];
            $codePostal = $rowDataOld['cpMarechal'];
            $dateDebutAffectation =$rowDataOld['ddaf'];
            $dateFinAffectation =$rowDataOld['dfaf'];

        }
    }

?>
<div class="ajout_traitement"> <!-- Marechal -->
    <h1>Modifier le maréchal </h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

        <a href="ecurie_description.php"><span class="material-symbols-outlined">close</span></a>

        <label for="nomMarechal">Nom :</label>
        <input type="text" id="nomMarechal" name="nomMarechal" placeholder="Nom" value="<?=$nomMarechal?>" required><br>

        <label for="prenomMarechal">Prénom :</label>
        <input type="text" id="prenomMarechal" name="prenomMarechal" placeholder="Prénom" value="<?=$prenomMarechal?>" required><br>

        <label for="rueMarechal">Rue :</label>
        <input type="text" id="rueMarechal" name="rueMarechal" placeholder="Rue + numéro" value="<?=$rueMarechal?>"  required><br>         

        <label for="communeMarechal">Commune :</label>
        <input type="text" id="communeMarechal" name="communeMarechal" placeholder="Commune" value="<?=$communeMarechal?>"  required><br>

        <label for="codePostalMarechal">Code Postal :</label>
        <input type="text" id="codePostalMarechal" name="codePostalMarechal" placeholder="Code Postal" maxlength="5" value="<?=$codePostal?>" required><br>  


        <label for="dateDebutAffectationMarechal">Date de début d'affectation :</label>
        <input type="date" id="dateDebutAffectationMarechal" name="dateDebutAffectationMarechal" value="<?=$dateDebutAffectation?>" required><br>  

        <label for="dateFinAffectationMarechal">Date de fin d'affectation :</label>
        <input type="date" id="dateFinAffectationMarechal" name="dateFinAffectationMarechal" value="<?=$dateFinAffectation?>"  required><br>  

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

