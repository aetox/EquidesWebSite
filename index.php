<?php include("header.php"); ?>


<?php

// Validation du formulaire
if (isset($_POST['mail']) &&  isset($_POST['password'])) {
    foreach ($users as $user) {
        if (
            $user['mail'] === $_POST['mail'] &&
            $user['password'] === $_POST['password']
        ) {
            $loggedUser = [
                'mail' => $user['mail'],
            ];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $_POST['mail'],
                $_POST['password']
            );
        }
    }
}
?>

<div class="connexion">

    <img src="ASSETS/logo_equides.png" alt="Logo">
    <h1>EQUIDES</h1>

        <form name="form_connexion" id="form_connexion" action ="index.php" method="post">

            <h1>Connexion</h1>

            <input type="mail" name="mail" id="mail_connexion" placeholder="Mail" autofocus required >
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
 