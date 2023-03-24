<?php
$titre ="Inscription";
ob_start();
include_once("header.php");
if(!isset($_SESSION['logged_user'])) {
?>
<?php include_once('PHP/user_functions/inscription_fct.php') ?>

<div class="inscription">

    <img src="ASSETS/ico/logotest.png" alt="Logo">


        <form name="form_inscription" id="form_inscription" method="post" enctype="multipart/form-data">

            <!-- Inclure l'affichage d'erreur -->

            <h1>Inscription</h1>

            <!--Appelle la fonction affichageErreurs et affiche l'erreur sous forme de tableau  -->
            <?php include_once('PHP/other_functions/affichageErreurs.php');?>
       
            <label for="radio_type_profil"><strong>Vous êtes ?</strong></label>
                <div id="radio_type_profil">
                    <div class="radio_type_profil_proprietaire">
                        <input type="radio" id="type_profil1" name="type_profil" value="proprietaire">
                        <label for="type_profil1">Propriétaire d'équidés</label>
                    </div>
                    <div class="radio_type_profil_proprietaire">
                        <input type="radio" id="type_profil2" name="type_profil" value="detenteur">
                        <label for="type_profil2">Détenteur d'écurie</label>
                    </div>
                </div>
    <div id="id_inscription_detenteur" class="inscription_detenteur "> <!-- Styliser proprement -->
            <input type="text" name="surname" id="surname_inscription" placeholder="prénom" autofocus required>
            <input type="text" name="name" id="name_inscription" placeholder="nom"  required>
            <input type="mail" name="mail" id="mail_inscription" placeholder="Mail" required> 
            <!-- Les id doivent être les mêmes pour les input connexion ou inscription ? Pour l'instant je l'ai ai changé avec "_inscription" -->
            <input type="password" name="password" id="password_inscription"  placeholder="créez un mot de passe" required> 
            
            <input type="text" name="rue" id="rue_inscription" placeholder="Rue"  required>
            <input type="text" name="commune" id="commune_inscription" placeholder="Commune"  required>
            <input type="text" name="code_postal" id="codePostal_inscription" placeholder="Code Postal" required>

            <!-- Voir quels conditions mettre pour le mot de passe, max lenght etc -->

            <!-- J'enlève le champ sire, le detenteur l'ajoutera après  -->
            <input type="text" name="sire" id="sire_inscription" placeholder="n°sire" required maxlength="9">
            
            <!-- Permet d'ajouter un pdp -->
            <label for="photo_detenteur">Photo de profil :</label>
			<input type="file" id="photo_detenteur" name="photo_detenteur" required>

            <!-- Vérifier en php que ce qui est saisit est bien un numéro sire -->
            <div>
                <input type="checkbox" name="inscription_accept_conditions" id="inscription_accept_conditions" required>
                <label for="inscription_accept_conditions">J'accepte les conditions d'utilisation</label>
            </div>
            <button type="submit" name="inscription" >S'inscrire</button> 
            </div>
    <div id="id_inscription_propietaire" class="inscription_proprietaire "> <!-- Styliser proprement -->
            <input type="text" name="surname" id="surname_inscription" placeholder="prénom" autofocus required>
            <input type="text" name="name" id="name_inscription" placeholder="nom"  required>
            <input type="mail" name="mail" id="mail_inscription" placeholder="Mail" required> 
            <!-- Les id doivent être les mêmes pour les input connexion ou inscription ? Pour l'instant je l'ai ai changé avec "_inscription" -->
            <input type="password" name="password" id="password_inscription"  placeholder="créez un mot de passe" required> 
            
            <input type="text" name="rue" id="rue_inscription" placeholder="Rue"  required>
            <input type="text" name="commune" id="commune_inscription" placeholder="Commune"  required>
            <input type="text" name="code_postal" id="codePostal_inscription" placeholder="Code Postal" required>

            <!-- Voir quels conditions mettre pour le mot de passe, max lenght etc -->

            <!-- J'enlève le champ sire, le detenteur l'ajoutera après  -->
            <!-- <input type="text" name="sire" id="sire_inscription" placeholder="n°sire" required maxlength="9"> -->
            
            <!-- Permet d'ajouter un pdp -->
            <label for="photo_detenteur">Photo de profil :</label>
            <input type="file" id="photo_detenteur" name="photo_detenteur" required>

            <!-- Vérifier en php que ce qui est saisit est bien un numéro sire -->
            <div>
                <input type="checkbox" name="inscription_accept_conditions" id="inscription_accept_conditions" required>
                <label for="inscription_accept_conditions">J'accepte les conditions d'utilisation</label>
            </div>
            <button type="submit" name="inscription" >S'inscrire</button> 
            </div>
        </form>
        <p>Déjà un compte ? <a href="index.php"> Cliquez-ici !</a></p> 
        </div>
    </div>

</div>
<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>