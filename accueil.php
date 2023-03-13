<?php
$titre ="Accueil";
include("header.php"); 
?>

<h1>Bienvenue M.<?= $_SESSION['nom_detenteur'];?></h1>


<h3>Créez des formulaires détaillés pour chacun de vos chevaux en un rien de temps !  </h3>

<h4><img src="#" alt="Logo equidé"><a href="equides.php">Mes équides</a></h4>
<h4><img src="#" alt="Logo écurie"><a href="ecurie.php">Mon écurie</a></h4>
<h4><img src="#" alt="Logo voyage"><a href="carnet_transport.php">Je voyage</a></h4>


<?php include("footer.php"); ?>