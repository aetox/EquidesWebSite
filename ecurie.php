<?php
$titre = "Ecurie";
ob_start();
include_once("header.php");

if(isset($_SESSION['logged_user']) && isset($_SESSION['id_detenteur'])){

    $idDetenteur = $_SESSION['id_detenteur'];
    $sql = "SELECT nom_ecurie FROM `registre_equide` WHERE id_detenteur='$idDetenteur'";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    if (mysqli_num_rows($result) > 0) {

        while($rowData = mysqli_fetch_array($result)){
            $nomEcurie = $rowData['nom_ecurie'];}?>

    <div class="ecurie">

        <h1 class="titre_1"><?php echo $nomEcurie ?></h1>

        <div id="AffichageEcurie">

        <?php include_once('PHP/equide_functions/affichage/affichageEcurie_fct.php')?>

        </div>

        <a href="#" class="boutton_vertV2"><img src="ASSETS/ico/plus2.png">écurie</a>

    </div>
    <?php
    }else {?>
        <h3>Vous n'avez pas d'Ecurie</h3>
<?php    }}
elseif(isset($_SESSION['logged_user']) && isset($_SESSION['id_proprietaire'])){?>
        <h3>Vous n'avez pas d'ecurie</h3>

<?php include_once("footer.php");
}else {
    header("Location: index.php");
}ob_end_flush(); ?>