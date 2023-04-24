<?php
$titre ="Accueil";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
?>

<div class="accueil">

    <div class="left">
        <img src="ASSETS\ico\horse(1).png">
    </div>

    <div class="right">
        <h1 class="accueil_titre">Bienvenue <br><?= $_SESSION['prenom'];?>,</h1>


        <h3 class="accueil_soustitre">Suivre vos chevaux n'a jamais été aussi simple.<br>
        <br>Créer ou modifier leurs fiches en un rien de temps.<br>
        <br>Visualiser et télécharger les fiches de transports en deux clics.<br>
        <br></h3>

        <div class="accueil_div_bouttons">
            <a href="equides.php" class="boutton_orange_accueil"><img src="ASSETS\ico\ico-fer-a-cheval.png">Mes équidés</a>
            <a href="ecurie_description.php" class="boutton_orange_accueil"><img src="ASSETS\ico\ico-obstacle.png">Mon écurie</a>
            <a href="carnet_transport.php" class="boutton_vert"><img src="ASSETS\ico\ico-panneau.png">Je voyage</a>         
        </div>
    </div>
    

</div>

<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>