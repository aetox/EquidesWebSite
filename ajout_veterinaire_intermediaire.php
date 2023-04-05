<?php
$titre ="Ajouter un vétérinaire";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
?>

<div class="ajout_traitement"> <!-- vermifuge -->
    <h1>Ajouter un Vétérinaire</h1>

                <h2>Vous souhaitez ? </h2>
                <a href="ajout_veterinaire.php">
                    <p>Affecter un nouveau vétérinaire à un groupement existant</p>
                </a>
                <a href="ajout_GroupementVeterinaire.php">
                    <p>Affecter un nouveau vétérinaire à un nouveau groupement</p>
                </a>
                    
</div>


<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>
