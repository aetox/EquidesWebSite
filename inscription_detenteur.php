<?php
$titre ="Inscription";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user']) || isset($_COOKIE['user_id_login'])){ 
?>
<?php include_once('PHP/user_functions/inscription_detenteur_fct.php') ?>

<div class="inscription">

    <img src="ASSETS/ico/logotest.png" alt="Logo">


        <form name="form_inscription" class="form_inscription" method="post" enctype="multipart/form-data">

            <!-- Inclure l'affichage d'erreur -->

            <h1>Inscription <br>détenteur</h1>

            <!--Appelle la fonction affichageErreurs et affiche l'erreur sous forme de tableau  -->
            <?php include_once('PHP/other_functions/affichageErreurs.php');?>

            <input type="text" name="surname" id="surname_inscription" placeholder="prénom" autofocus >
            <input type="text" name="name" id="name_inscription" placeholder="nom"  >
            <input type="text" name="sire" id="sire_inscription" placeholder="n°sire"  maxlength="9">
            <input type="date" name="date" id="date_inscription" placeholder="Date"  >
            <input type="text" name="signature" id="signature_inscription" placeholder="Signature"  >
            <input type="mail" name="mail" id="mail_inscription" placeholder="Mail" > 
            <input type="password" name="password" id="password_inscription"  placeholder="créez un mot de passe" > 
            <input type="text" name="rue" id="rue_inscription" placeholder="Rue"  >
            <input type="text" name="commune" id="commune_inscription" placeholder="Commune"  >
            <input type="text" name="code_postal" id="codePostal_inscription" placeholder="Code Postal" >
            <label for="photo_detenteur">Photo de profil :</label>
			<input type="file" id="photo_detenteur" name="photo_detenteur" >
            <div>
                <input type="checkbox" name="inscription_accept_conditions" id="inscription_accept_conditions" >
                <label for="inscription_accept_conditions">J'accepte les conditions d'utilisation</label>
            </div>
            <button type="submit" name="inscription_detenteur" >S'inscrire</button> 
        </form>
        <p>Déjà un compte ? <a href="index.php"> Cliquez-ici !</a></p> 
        </div>
    </div>

</div>
<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>