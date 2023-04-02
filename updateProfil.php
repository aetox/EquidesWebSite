<?php
$titre ="Modification Profil";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user']) || isset($_COOKIE['user_id_login'])){ 
include_once('PHP/user_functions/modification/updateProfil_fct.php');

$info_error = array();
$info_succes = array();

if(isset($_SESSION['id_detenteur'])){ 

    $id_detenteur = $_SESSION['id_detenteur'];
    $queryDetenteur = "SELECT * FROM `detenteur` JOIN `login` ON detenteur.id_login=login.id_login WHERE id_detenteur=$id_detenteur"; 
    $resultDetenteur = mysqli_query($mysqli,$queryDetenteur) or die(mysqli_error($mysqli));
    
    if(mysqli_num_rows($resultDetenteur) > 0){
        
        while($rowData = mysqli_fetch_array($resultDetenteur)){

            $nom = $rowData['nom'];
            $prenom = $rowData['prenom'];
            $sire = $rowData['sire'];
            $email = $rowData['email'];
            $rue = $rowData['rue'];
            $commune = $rowData['commune'];
            $code_postal = $rowData['code_postal'];
            $signature_detenteur = $rowData['signature_detenteur'];
            $date_enregistrement = $rowData['date_enregistrement'];
            $nationalite = $rowData['nationalite'];
        }
    }
?>

    <form name="form_inscription" class="form_inscription" method="post" enctype="multipart/form-data">


        <h1>Modifier mes informations</h1>

        <!--Appelle la fonction affichageErreurs et affiche l'erreur sous forme de tableau  -->
        <?php include_once('PHP/other_functions/affichageErreurs.php');?>


        <input type="text" name="prenom" id="forname_update" placeholder="prénom"  value="<?=$prenom?>"autofocus required>
        <input type="text" name="nom" id="name_update" placeholder="nom" value="<?=$nom?>" required>
        <input type="mail" name="email" id="mail_update" placeholder="Mail" value="<?=$email?>"required>
        <input type="mail" name="sire" id="sire_update" placeholder="Mail" value="<?=$sire?>"required> 

        <!-- <input type="password" name="password" id="password_inscription"  placeholder="créez un mot de passe" required>  -->

        <input type="text" name="rue" id="rue_update" placeholder="Rue" value="<?=$rue?>" required>
        <input type="text" name="commune" id="commune_update" placeholder="Commune" value="<?=$commune?>" required>
        <input type="text" name="code_postal" id="codePostal_update" placeholder="Code Postal" value="<?=$code_postal?>"required>
        <input type="text" name="signature" id="signature_update" placeholder="Signature" value="<?=$signature_detenteur?>"required>
        <input type="date" name="date_enregistrement" id="dateEnregistrement_update" placeholder="Datee d'enregistrement" value="<?=$date_enregistrement?>"required>
        <input type="text" name="nationalite" id="nationalite_update" placeholder="Nationalité" value="<?=$nationalite?>"required>

        <!-- Permet d'ajouter un pdp -->
        <!-- <label for="photo_detenteur">Photo de profil :</label>
        <input type="file" id="photo_detenteur" name="photo_detenteur" required> -->

        <button type="submit" name="update" >Mettre à jour</button> 
    </form>

<?php } elseif(isset($_SESSION['id_proprietaire'])){ 

        $id_proprietaire = $_SESSION['id_proprietaire'];
        $queryProprietaire = "SELECT * FROM `proprietaire` JOIN `login` ON proprietaire.id_login=login.id_login WHERE id_proprietaire=$id_proprietaire"  ; 
        $resultProprietaire = mysqli_query($mysqli,$queryProprietaire) or die(mysqli_error($mysqli));

        if(mysqli_num_rows($resultProprietaire) > 0){
        while($rowData = mysqli_fetch_array($resultProprietaire)){

            $nom = $rowData['nom'];
            $prenom = $rowData['prenom'];
            $email = $rowData['email'];
            $password = $rowData['mot_de_passe'];
            $rue = $rowData['rue'];
            $commune = $rowData['commune'];
            $code_postal = $rowData['code_postal'];
            }
        }    
    ?>

        <form name="form_inscription" class="form_inscription" method="post" enctype="multipart/form-data">

            <h1>Modifier mes informations</h1>

            <!--Appelle la fonction affichageErreurs et affiche l'erreur sous forme de tableau  -->
            <?php include_once('PHP/other_functions/affichageErreurs.php');?>
       


            <input type="text" name="prenom" id="surname_update" placeholder="prénom"  value="<?=$nom?>"autofocus required>
            <input type="text" name="nom" id="name_update" placeholder="nom" value="<?=$prenom?>" required>
            
            
            <!-- Pas possible de mettre à jour le mail pour l'instant -->
            <input type="mail" name="email" id="sire_update" placeholder="Mail" value="<?=$email?>"required> 

            <!-- <input type="password" name="password" id="password_inscription"  placeholder="créez un mot de passe" required>  -->

            <input type="text" name="rue" id="rue_update" placeholder="Rue" value="<?=$rue?>" required>
            <input type="text" name="commune" id="commune_update" placeholder="Commune" value="<?=$commune?>" required>
            <input type="text" name="code_postal" id="codePostal_update" placeholder="Code Postal" value="<?=$code_postal?>"required>

            <!-- Permet d'ajouter un pdp -->
            <!-- <label for="photo_detenteur">Photo de profil :</label>
            <input type="file" id="photo_detenteur" name="photo_detenteur" required> -->

            <button type="submit" name="update" >Mettre à jour</button> 
        </form>


<?php }else{

}

?>

<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
