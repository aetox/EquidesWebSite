<?php
$titre ="Mon profil";
ob_start();
include("header.php");
if(isset($_SESSION['logged_user'])) {
require('PHP/equide_functions/affichage/affichagePhoto_fct.php');

//Permet de definir une variable qui affiche l'uilisateur connecté
$sireDetenteur = $_SESSION['sire_detenteur'];

//Affiche la photo de l'utilisateur connecté
$lienPdp = AffichagePhoto($mysqli,$sireDetenteur);
?>

<div class="profil">
  <h1 class="titre_1">Mon Profil</h1>   
  <div class="card" style="min-width: 250px ; max-width: 400px;">
        <img src="../ASSETS/img_bdd/<?php echo $lienPdp?>" class="card-img-top" alt="Sire n°<?php echo $sireDetenteur?>">
        <div class="card-body">
          <h5 class="card-title"><?php echo ($_SESSION['prenom_detenteur']); ?> <?php echo ($_SESSION['nom_detenteur']); ?></h5>
        </div>  
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>ID : </strong><?php echo ($_SESSION['id_detenteur'] ) ?></li>
          <li class="list-group-item"><strong>Prénom : </strong><?php echo ($_SESSION['prenom_detenteur'] ) ?></li>
          <li class="list-group-item"><strong>Nom : </strong><?php echo ($_SESSION['nom_detenteur'] ) ?></li>
          <li class="list-group-item"><strong>Sire : </strong><?php echo ($_SESSION['sire_detenteur'] ) ?></li>
          <li class="list-group-item"><strong>Mail : </strong><?php echo ($_SESSION['mail_detenteur'] ) ?></li>
          <li class="list-group-item"><strong>Mot de passe : </strong>********</li>
          <li class="list-group-item"><strong>Nombre d'équides : </strong><?php echo ($_SESSION['nbEquide_detenteur'] ) ?></li>
          <li class="list-group-item"><strong>Ecurie : </strong><?php echo ($_SESSION['adresse_detenteur'] ) ?></li>
          <li class="list-group-item"><strong>Nationalité : </strong><?php echo ($_SESSION['nationalite_detenteur'] ) ?></li>
          <li class="list-group-item"><strong>Signature : </strong><?php echo ($_SESSION['signature_detenteur'] ) ?></li>
          <li class="list-group-item"><strong>Date d'enregistrement : </strong><?php echo ($_SESSION['dateEnregistrement_detenteur'] ) ?></li>
          <li class="list-group-item"><strong>Cachet Organisation: </strong><?php echo ($_SESSION['cachetOrganisation_detenteur'] ) ?></li>
          <li class="list-group-item"><strong>Signature Organisation : </strong><?php echo ($_SESSION['signatureOrganisation_detenteur'] ) ?></li>
        </ul>   
  </div>
  <a href="accueil.php" class="boutton_orangeV2"><img src="ASSETS/ico/retour.png">retour</a>
</div>
                
<?php include("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>