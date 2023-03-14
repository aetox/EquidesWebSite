<?php
$titre ="Accueil";
include("header.php"); 
?>

<div class="accueil">

    <h1 class="accueil_titre">Bienvenue <?= $_SESSION['prenom_detenteur'];?>,</h1>


    <h3 class="accueil_soustitre">Tu vas voir, créer des formulaires détaillés pour chacun de tes chevaux n'a jamais été aussi facile.<br>
    <br>Tu pourras ensuite télécharger ton formulaire de voyage en un rien de temps ! </h3>

    <div class="accueil_bouttons">

        <a href="equides.php" class="accueil_bouttons_mesequides"><img src="ASSETS\ico\ico-fer-a-cheval.png">Mes équidés</a>
        <a href="ecurie.php" class="accueil_bouttons_monecurie"><img src="ASSETS\ico\ico-obstacle.png">Mon écurie</a>
        <a href="carnet_transport.php" class="accueil_bouttons_jevoyage"><img src="ASSETS\ico\ico-panneau.png">Je voyage</a>         
    </div>

</div>

<?php include("footer.php"); ?>
