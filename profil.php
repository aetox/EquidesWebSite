<?php include("header.php"); ?>


<h1> Profil </h1>
<h2> Bienvenue <?php echo ($_SESSION['prenom_detenteur']); ?> </h2>
<h3>Mes infos :</h3>

<p> ID : <?php echo ($_SESSION['id_detenteur'] ) ?></p>
<p> Prénom :<?php echo ($_SESSION['prenom_detenteur'] ) ?></p>
<p> Nom :<?php echo ($_SESSION['nom_detenteur'] ) ?></p>
<p> Mail :<?php echo ($_SESSION['mail_detenteur'] ) ?></p>
<p> Mot de passe :<?php echo ($_SESSION['password_detenteur'] ) ?></p>
<p> Nombre d'équides : <?php echo ($_SESSION['nbEquide_detenteur'] ) ?></p>
<p> Adresse :<?php echo ($_SESSION['adresse_detenteur'] ) ?></p>
<p> Nationalité :<?php echo ($_SESSION['nationalite_detenteur'] ) ?></p>
<p> Signature : <?php echo ($_SESSION['signature_detenteur'] ) ?></p>
<p> Date d'enregistrement : <?php echo ($_SESSION['dateEnregistrement_detenteur'] ) ?></p>
<p> Cachet Organisation:<?php echo ($_SESSION['cachetOrganisation_detenteur'] ) ?></p>
<p> Signature Organisation :<?php echo ($_SESSION['signatureOrganisation_detenteur'] ) ?></p>




                
             

<?php include("footer.php"); ?>
