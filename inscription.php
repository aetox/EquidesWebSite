<?php
$titre ="Inscription";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user']) || isset($_COOKIE['user_id_login'])){ 
?>
<div class="connexion-contenu">
    <div class="inscription-1">

        <img src="ASSETS/ico/logotest.png" alt="Logo">

        <h2>Vous êtes ? </h2>
        <a href="inscription_detenteur.php">
            <h3>detenteur</h3>
            <p>Je possède au moins un équidé, une écurie et un numéro de SIRE.</p>
        </a>
        <a href="inscription_proprietaire.php">
            <h3>proprietaire</h3>
            <p>Je possède au moins équidé.</p>
        </a>
        <div class ="redirection-compte">Déjà un compte ?<a href="index.php">Cliquez-ici !</a></div> 
            
    </div>
</div>
<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>