<?php
$titre ="Confirmation suppression ecurie";
ob_start();
include_once("header.php");

if(isset($_SESSION['logged_user']) && isset($_SESSION['id_detenteur'])) {
    $idDetenteur = $_GET['id_detenteur'];
?>
    <li class="modification list-group-item" id="affichageEquides_info"><a href="PHP/equide_functions/modification/suppressionEcurie.php?id_detenteur=<?= $idDetenteur;?>">Suppression</a></li>
<?php
}
else {
    header("Location: index.php");
}
ob_end_flush(); ?>