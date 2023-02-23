<?php include("header.php"); ?>

<div class="accueil">

    <img src="ASSETS/logo_equides.png" alt="Logo">
    <h1>EQUIDES</h1>

        <form name="accueil_connexion" id="accueil_connexion">

            <h1>Connexion</h1>

            <input type="mail" name="mail" id="mail_connexion" placeholder="Mail" required>
            <input type="password" name="password" id="password_connexion"  placeholder="Mot de passe"required>
            <div>
                <input type="checkbox" name="remember_me" id="remember_me" required>
                <label for="remember_me">Se souvenir de moi</label>
            </div>
            <button type="submit" >Se Connecter</button>
            <a href="#">Mot de passe oublié ?</a>

        </form>

    <p>Pas de compte ? <a href="inscription.php">Créez-en un ici !</a></p> 

</div>






<?php include("footer.php"); ?>
 