<?php
$titre ="Mon profil";
include("header.php");
?>


<?php

    $sireDetenteur = $_SESSION['sire_detenteur'];

    $sqlImg = "SELECT * FROM `image` WHERE id_equide='$sireDetenteur'";
    $resulat_img = mysqli_query($mysqli,$sqlImg) or die (mysqli_error($mysqli));
     
    $lienPdp = '';
    if(mysqli_num_rows($resulat_img) > 0) {
        while($pdp = mysqli_fetch_array($resulat_img)){
                $lienPdp = $pdp['img'];
        }
    }
?>

<!-- Styliser le profil -->

<h1>Mon Profil</h1>



 <div id="profil">

 <div class="card border-dark mb-3 " style="max-width: 90vw;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../EquidesWebSite/ASSETS/img_bdd/<?php echo $lienPdp?>" class="img-fluid rounded-start" alt="Sire n°<?php echo $sireDetenteur?>">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo ($_SESSION['prenom_detenteur']); ?> <?php echo ($_SESSION['nom_detenteur']); ?></h5>
            <ul class="list-group list-group-flush">

                <li class="list-group-item"><strong>ID : </strong><?php echo ($_SESSION['id_detenteur'] ) ?></li>
                <li class="list-group-item"><strong>Prénom : </strong><?php echo ($_SESSION['prenom_detenteur'] ) ?></li>
                <li class="list-group-item"><strong>Nom : </strong><?php echo ($_SESSION['nom_detenteur'] ) ?></li>
                <li class="list-group-item"><strong>Sire : </strong><?php echo ($_SESSION['sire_detenteur'] ) ?></li>
                <li class="list-group-item"><strong>Mail : </strong><?php echo ($_SESSION['mail_detenteur'] ) ?></li>
                <li class="list-group-item"><strong>Mot de passe : </strong><?php echo ($_SESSION['password_detenteur'] ) ?></li>
                <li class="list-group-item"><strong>Nombre d'équides : </strong><?php echo ($_SESSION['nbEquide_detenteur'] ) ?></li>
                <li class="list-group-item"><strong>Ecurie : </strong><?php echo ($_SESSION['adresse_detenteur'] ) ?></li>
                <li class="list-group-item"><strong>Nationalité : </strong><?php echo ($_SESSION['nationalite_detenteur'] ) ?></li>
                <li class="list-group-item"><strong>Signature : </strong><?php echo ($_SESSION['signature_detenteur'] ) ?></li>
                <li class="list-group-item"><strong>Date d'enregistrement : </strong><?php echo ($_SESSION['dateEnregistrement_detenteur'] ) ?></li>
                <li class="list-group-item"><strong>Cachet Organisation: </strong><?php echo ($_SESSION['cachetOrganisation_detenteur'] ) ?></li>
                <li class="list-group-item"><strong>Signature Organisation : </strong><?php echo ($_SESSION['signatureOrganisation_detenteur'] ) ?></li>

            </ul> 
      </div>
    </div>
  </div>
</div>

 </div>

                
<?php include("footer.php"); ?>
