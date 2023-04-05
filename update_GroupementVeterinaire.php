<?php
$titre ="Ajouter un groupement de vétérinaire";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {


$id_groupement = $_GET['idGroupement'];

$sql="SELECT * FROM groupement_veterinaire WHERE `id_groupement_veterinaire`='$id_groupement'";

$result = mysqli_query($mysqli,$sql) or mysqli_error($mysqli);

if(mysqli_num_rows($result)>0){

    while($info_groupement = mysqli_fetch_array($result)){ 
        $nom =$info_groupement['nom_groupement'];
        $rue =$info_groupement['rue'];
        $commune =$info_groupement['commune'];
        $code_postal =$info_groupement['code_postal'];
    }
}

?>
<div class="ajout_traitement">
    <h1>Ajouter un groupement de vétérinaire</h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

            <a href="groupementVeterinaire.php"><span class="material-symbols-outlined">close</span></a>
            
            <label for="nomGroupement">Nom du groupement :</label>
            <input type="text"  name="nomGroupement" placeholder="Nom du groupement" value="<?=$nom?>" required><br>
            
            <label for="rue">Rue :</label>
            <input type="text" name="rue" id="rue_inscription" placeholder="Rue" value="<?=$rue?>"required >

            <label for="moleculeTrcommuneaitement">Commune :</label>
            <input type="text" name="commune" id="commune_inscription" placeholder="Commune" value="<?=$commune?>"required >
            
            <label for="code_postal">Code postal :</label>
            <input type="text" name="code_postal" id="codePostal_inscription" placeholder="Code Postal" value="<?=$code_postal?>"required>

            <?php include_once('PHP/other_functions/affichageErreurs.php');?>
            
            <button type="submit" name="ajouter">MIS à jour</button>

        </form>
    </div>	
</div>
        
<?php include_once("footer.php"); ?>

<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
