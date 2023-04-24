<?php
$titre ="Carnet de transport";
ob_start();
include_once("header.php");
$id_detenteur = $_SESSION['id_detenteur'];
if(isset($_SESSION['logged_user'])) {
?>


<div class="carnet_transport">

    <h1 class="titre_1">Carnet de Transport</h1>

    <!-- Afficher les cartes avec les voyages créés -->

    <?php
     $ecurieDetenteur = "SELECT * 
     FROM `detenteur`
     JOIN `registre_equide`
     ON detenteur.id_detenteur = registre_equide.id_detenteur
     WHERE detenteur.id_detenteur=$id_detenteur";

     $resultecurieDetenteur = mysqli_query($mysqli,$ecurieDetenteur) or die(mysqli_error($mysqli));

     if(mysqli_num_rows($resultecurieDetenteur) > 0){
         while($rowData = mysqli_fetch_array($resultecurieDetenteur)){ ?>
    
    <a href="ajout_voyage.php" class="boutton_vertV2"><img src="ASSETS/ico/plus2.png">voyage</a>
    <br>

    <?php include_once('PHP/equide_functions/affichage/affichageTransport_fct.php');?>


    <div class="carnet_transport_pdf">
    <a href="PHP/pdf_functions/carnet_transport_pdf.php?detenteur=<?=$id_detenteur?>" target="_blank" class="boutton_pdf"><img src="ASSETS/ico/telecharger2.png">PDF</a>
    </div>         
<?php }?>
     <?php }else {?>
        <h3>Veuillez engistrer une écurie</h3>
        <a href="ajout_ecurie.php" class="boutton_vertV2"><img src="ASSETS/ico/plus2.png">ecurie</a>

     <?php }
    ?>


</div>

<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>