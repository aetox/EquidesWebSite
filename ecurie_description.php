<?php
$titre ="Mon écurie";
ob_start();
include_once("header.php");

if(isset($_SESSION['logged_user']) && isset($_SESSION['id_detenteur'])){

    $idDetenteur = $_SESSION['id_detenteur'];
    $sql =
    "SELECT nom_ecurie
    FROM `registre_equide`
    WHERE id_detenteur='$idDetenteur'";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    if (mysqli_num_rows($result) > 0) {

        while($rowData = mysqli_fetch_array($result)){
            $nomEcurie = $rowData['nom_ecurie'];?>

        <div class="ecurie">
            <div class="partie-1">
                <div class="gauche-partie-1">
                    <h1 class="titre_1"><?php echo $titre ?></h1>
                    <h3>Mes infos :</h3>
                    <?php include('PHP/equide_functions/affichage/affichageEcurieDescription_fct.php') ?>
                    <a href="updateEcurie.php" class="boutton_pdf">Modifer</a>
                </div>
                <div class="droite-partie-1">
                    <img src="" alt="">
                </div>
            </div>

            <h3>Mes vétérinaires :</h3>

            <hr>
                <h4>Vétérinaire sanitaire:</h4>
                <?php include('PHP/ecurie_functions/affichage/affichageVeterinaireSanitaire_fct.php') ?>

            <hr>
                <h4>Vétérinaire courants:</h4>
                <?php include('PHP/ecurie_functions/affichage/affichageVeterinaireCourant_fct.php') ?> 
            <hr>

                <h4><a href="groupementVeterinaire.php">Mes groupements de vétériniare</a></h4>

            <hr>

            <a href="ajout_veterinaire_intermediaire.php" class="boutton_vertV2"><img src="ASSETS/ico/plus2.png">Vétérinaire</a>


            <h3>Mes maréchal ferrand :</h3>

            <hr>
                <?php include('PHP/ecurie_functions/affichage/affichageMarechalFerrand_fct.php') ?> 
            <hr>

            <a href="ajout_marechal.php" class="boutton_vertV2"><img src="ASSETS/ico/plus2.png">Maréchal Ferrand</a>
  
            <h3>Mes Equides:</h3>
            <?php include('PHP/ecurie_functions/affichage/affichageEquideEcurie_fct.php') ?> 
            <a href="ajout_equides.php" class="boutton_vertV2"><img src="ASSETS/ico/plus2.png">équidé</a>
                


            <li class="modification list-group-item" id="affichageEquides_info"><a href="ecurie_confirmation_suppression.php?id_detenteur=<?=$idDetenteur;?>">Supprimer mon écurie</a></li>

        </div>
    <?php
        }
    }
    else { ?>
        <div class="ecurie">

        <h1 class="titre_1"><?php echo $titre ?></h1>

        </div>

        <h3>Vous n'avez pas d'écurie</h3>

        <div class="ecurie">
        <a href="ajout_ecurie.php" class="boutton_vertV2"><img src="ASSETS/ico/plus2.png">écurie</a>
        </div>
<?php    }
}
elseif(isset($_SESSION['logged_user']) && isset($_SESSION['id_proprietaire'])) { ?>

        <h3>Vous n'avez pas d'équidés</h3>

<?php include_once("footer.php");
}
else {
    header("Location: index.php");
}
ob_end_flush(); ?>