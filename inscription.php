<?php
$titre ="Inscription";
ob_start();
include_once("header.php");
if(!isset($_SESSION['logged_user'])) {
?>

<div class="inscription">

    <img src="ASSETS/ico/logotest.png" alt="Logo">

        <h2>Vous êtes ? </h2>
        <a href="inscription_detenteur.php">Un detenteur</a>
        <a href="inscription_proprietaire.php">Un proprietaire</a>

        <p>Déjà un compte ? <a href="index.php"> Cliquez-ici !</a></p> 
        </div>
    </div>

</div>
<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>