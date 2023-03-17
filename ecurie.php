<?php 
$titre ="Mon écurie";
include("header.php");
?>

<div class="ecurie">

    <h1 class="titre_1">Mon écurie</h1>

    <div id="AffichageEcurie">

    <?php include_once('php/equide_functions/affichage/affichageEcurie_fct.php')?>

    </div>

    <a href="#" class="boutton_vertV2"><img src="ASSETS\ico\plus2.png">écurie</a>
    
</div>

<?php include("footer.php"); ?>
