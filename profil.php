<?php include("header.php"); ?>

<!-- Styliser le profil -->

<div class="Equide card" > 


    <!-- AJouter la meme fonction pour les pdp des cheevaux pour l'homme -->

    <img src="../EquidesWebSite/ASSETS/img_bdd/avatar.png" class="card-img-top"  alt="Equidé n°<?php echo $idEquide?>">

        <div class="card-body">
                    
                        <h5 class="card-title"><?php echo ($_SESSION['prenom_detenteur']); ?></h5>

                        <ul class="list-group list-group-flush">
                                <li class="list-group-item"> ID : <?php echo ($_SESSION['id_detenteur'] ) ?></li>
                                <li class="list-group-item">Prénom :<?php echo ($_SESSION['prenom_detenteur'] ) ?></li>
                                <li class="list-group-item">Nom :<?php echo ($_SESSION['nom_detenteur'] ) ?></li>
                                <li class="list-group-item">Mail :<?php echo ($_SESSION['mail_detenteur'] ) ?></li>
                                <li class="list-group-item">Mot de passe :<?php echo ($_SESSION['password_detenteur'] ) ?></li>
                                <li class="list-group-item">Nombre d'équides : <?php echo ($_SESSION['nbEquide_detenteur'] ) ?></li>
                                <li class="list-group-item">Adresse :<?php echo ($_SESSION['adresse_detenteur'] ) ?></li>
                                <li class="list-group-item">Nationalité :<?php echo ($_SESSION['nationalite_detenteur'] ) ?></li>
                                <li class="list-group-item">Signature : <?php echo ($_SESSION['signature_detenteur'] ) ?></li>
                                <li class="list-group-item">Date d'enregistrement : <?php echo ($_SESSION['dateEnregistrement_detenteur'] ) ?></li>
                                <li class="list-group-item">Cachet Organisation:<?php echo ($_SESSION['cachetOrganisation_detenteur'] ) ?></li>
                                <li class="list-group-item">Signature Organisation :<?php echo ($_SESSION['signatureOrganisation_detenteur'] ) ?></li>

                        </ul> 
                    </div>
</div>
                
<?php include("footer.php"); ?>
