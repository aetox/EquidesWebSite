<?php
$titre ="Inscription";
include_once("header.php");
?>
<?php include_once('PHP/user_functions/inscription_fct.php') ?>


<div class="inscription">

    <img src="ASSETS/ico/logo_equides.png" alt="Logo">
    <h1>EQUIDES</h1>

        <form name="form_inscription" id="form_inscription" method="post" enctype="multipart/form-data">

            <!-- Inclure l'affichage d'erreur -->

            <h1>Inscription</h1>

            <input type="text" name="surname" id="surname_inscription" placeholder="prénom" autofocus required>
            <input type="text" name="name" id="name_inscription" placeholder="nom"  required>
            <input type="mail" name="mail" id="mail_inscription" placeholder="Mail" required> 
            <!-- Les id doivent être les mêmes pour les input connexion ou inscription ? Pour l'instant je l'ai ai changé avec "_inscription" -->
            <input type="password" name="password" id="password_inscription"  placeholder="créez un mot de passe" required>  
            <!-- Voir quels conditions mettre pour le mot de passe, max lenght etc -->
            <input type="text" name="sire" id="sire_inscription" placeholder="n°sire" required>
            <!-- Permet d'ajouter un pdp -->
            <label for="photo_detenteur">Photo de profil :</label>
			<input type="file" id="photo_detenteur" name="photo_detenteur" required>

            <!-- Vérifier en php que ce qui est saisit est bien un numéro sire -->
            <div>
                <input type="checkbox" name="inscription_accept_conditions" id="inscription_accept_conditions" required>
                <label for="inscription_accept_conditions">J'accepte les conditions d'utilisation</label>
            </div>
            <button type="submit" name="inscription" >S'inscrire</button>
        
        </form>

    <p>Déjà un compte ? <a href="index.php"> Cliquez-ici !</a></p> 

</div>

<?php include_once("footer.php"); ?>

