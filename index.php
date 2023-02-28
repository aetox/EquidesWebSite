<?php include("header.php"); ?>
<?php include_once('php/user_functions/connexion_fct.php') ?>



<?php
        // affiche message d'erreur   
        if(isset($info)){ ?>
            <?php 

            for($i = 0; $i < count($info); ++$i) { ?>
            <p class="request_message" style ="color: red">
            <?= print_r($info[$i],true); ?>
            </p>
            
            <?php
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
                <input type="checkbox" name="remember_me" id="remember_me" >
                <label for="remember_me">Se souvenir de moi</label>
            </div>
            <button type="submit" name="submit_connexion" >Se Connecter</button>
            <a href="#">Mot de passe oublié ?</a>

        </form>

    <p>Pas de compte ? <a href="inscription.php">Créez-en un ici !</a></p> 

</div>



<?php include("footer.php"); ?>
 