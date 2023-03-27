<?php
$titre ="Mon profil";
ob_start();
include("header.php");
if(isset($_SESSION['logged_user'])) {
//require('PHP/equide_functions/affichage/affichagePhoto_fct.php');


//Affiche la photo de l'utilisateur connecté
//$lienPdp = AffichagePhoto($mysqli,$sireDetenteur);

//Appelle la fonction qui gère l'affichage du profil
include_once('PHP/user_functions/affichage/affichageProfil_fct.php');
?>


<?php include("footer.php"); ?>
<?php } else {
    header("Location: index.php");
}ob_end_flush(); ?>