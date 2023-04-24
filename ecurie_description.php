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

        <div class="ecurie-description">
            <div class="partie-1">
                <div class="gauche-partie-1">
                    <h1 class="titre_1"><?php echo $titre ?></h1>
                    <div class="gauche-partie-1-informations">
                    <?php include('PHP/equide_functions/affichage/affichageEcurieDescription_fct.php') ?>
                    </div>
                    <a href="updateEcurie.php" class="boutton_orange_accueil">Modifer</a>
                </div>
                <div class="droite-partie-1">
                    <img src="ASSETS/ico/cowshed.png" alt="">
                </div>
            </div>

            <div class="partie-2">

                <h3>Les vétérinaires</h3>
            
                <h4>sanitaires :</h4>
                
                <?php include('PHP/ecurie_functions/affichage/affichageVeterinaireSanitaire_fct.php') ?>
                
                <h4>courants :</h4>
            
                <?php include('PHP/ecurie_functions/affichage/affichageVeterinaireCourant_fct.php') ?> 
                
                <h4><a href="groupementVeterinaire.php" class="boutton_pdf">groupements vétérinaires</a> <br></h4>
                <a href="ajout_veterinaire_intermediaire.php" class="boutton_vertV2"><img src="ASSETS/ico/plus2.png">Vétérinaire</a>
            </div>

            
            <div class="partie-3">
                <div class="gauche-partie-3">
                    <img src="ASSETS/ico/tshirt.png" alt="">
                </div>
                <div class="droite-partie-3">
                    <h3>Mes maréchaux ferrands<br></h3>
                    <?php include('PHP/ecurie_functions/affichage/affichageMarechalFerrand_fct.php')?> 
                    <br>
                    <div class="droite-partie-3-boutton">
                    <a href="ajout_marechal.php" class="boutton_vertV2"><img src="ASSETS/ico/plus2.png">Maréchal Ferrand</a>
                    </div>
                </div>
                
            </div>
            
            <div class="partie-4">
                <h3>Les équides</h3>                
                <div class='web'>
					<div class = "recherche">
						<img src="ASSETS/ico/recherche.png" alt="">
						<input type="text" class="search_keyword" id="search_keyword_id" placeholder="Rechercher un équidé" />
					</div>
					<div id="result"></div>
				</div>
                <div class="carnet_traitement_affichage">
                    <?php include('PHP/ecurie_functions/affichage/affichageEquideEcurie_fct.php') ?> 
                </div>
            </div>   

            <div class="partie-5">
                <hr>
                <li class="modification list-group-item" id="affichageEquides_info"><a href="ecurie_confirmation_suppression.php?id_detenteur=<?=$idDetenteur;?>">Supprimer mon écurie</a></li>
            </div>

        </div>

        <?php include_once("footer.php");?>
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