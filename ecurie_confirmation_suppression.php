<?php
$titre ="Confirmation suppression ecurie";
ob_start();
include_once("header.php");

if(isset($_SESSION['logged_user']) && isset($_SESSION['id_detenteur'])) {
    $idDetenteur = $_GET['id_detenteur'];
    $sql =
    "SELECT id_detenteur,nom_ecurie
    FROM registre_equide
    WHERE id_detenteur = $idDetenteur";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    if (mysqli_num_rows($result) > 0) {
        while($rowData=mysqli_fetch_array($result)){
            $ecurie = $rowData['nom_ecurie'];
        }
?>
    <h1>Supprimer mon écurie</h1>
    <h3>Voulez vous vraiment supprimer votre écurie ?</h3>
    <br>
    <li class="modification list-group-item" id="affichageEquides_info"><a href="PHP/equide_functions/modification/suppressionEcurie.php?id_detenteur=<?= $idDetenteur;?>">Supprimer : <?php echo $ecurie?></a></li>
<?php
    }
    else {
        header("Location: index.php");
    }
}
else {
    header("Location: index.php");
}
ob_end_flush(); ?>