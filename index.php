<?php
$titre ="Connexion";
ob_start();
include("header.php");
if(isset($_SESSION['logged_user'])) {
    header("Location: accueil.php");
 }else{
?>
<?php include_once('PHP/user_functions/connexion_fct.php') ?>

<div class="connexion-contenu">
    <div class="connexion">
        <img src="ASSETS/ico/logotest.png" alt="Logo">
        <form name="form_connexion" id="form_connexion" method="post">
            <h1>Connexion</h1>
              <!--Appelle la fonction affichageErreurs et affiche l'erreur sous forme de tableau  -->
              <?php include_once('PHP/other_functions/affichageErreurs.php');?>
            <input type="mail" name="mail" id="mail_connexion" placeholder="Mail" autofocus required >
            <input type="password" name="password" id="password_connexion" placeholder="Mot de passe"required>
            <div>
                <input type="checkbox" name="remember_me" id="remember_me" >
                <label for="remember_me">Se souvenir de moi</label>
            </div>
            <button type="submit" name="submit_connexion">Se Connecter</button>
            <a href="#">Mot de passe oublié ?</a>
        </form>
        <p>Pas de compte ? <a href="inscription.php">Créez-en un ici !</a></p> 
    </div>
</div>
 
<?php } include("footer.php"); ?>
<? ob_end_flush(); ?>