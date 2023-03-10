<?php include("header.php"); ?>
<?php include_once('php/user_functions/inscription_fct.php') ?>


<div class="inscription">

    <img src="ASSETS/logo_equides.png" alt="Logo">
    <h1>EQUIDES</h1>

        <form name="form_inscription" id="form_inscription" method="post" enctype="multipart/form-data">

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


            <h1>Inscription</h1>

            <input type="text" name="name" id="name_inscription" placeholder="nom" autofocus required>
            <input type="text" name="surname" id="surname_inscription" placeholder="prénom" required>
            <input type="mail" name="mail" id="mail_inscription" placeholder="Mail" required> 
            <!-- Les id doivent être les mêmes pour les input connexion ou inscription ? Pour l'instant je l'ai ai changé avec "_inscription" -->
            <input type="password" name="password" id="password_inscription"  placeholder="créez un mot de passe" required>  
            <!-- Voir quels conditions mettre pour le mot de passe, max lenght etc -->
            <input type="text" name="sire" id="sire_inscription" placeholder="n°sire" required>
           <!-- Permet d'ajouter un pdp -->
            <label for="photo_detenteur">Photo de l'equide :</label>
			<input type="file" id="photo_detenteur" name="photo_detenteur" required><br>

            <!-- Vérifier en php que ce qui est saisit est bien un numéro sire -->
            <div>
                <input type="checkbox" name="inscription_accept_conditions" id="inscription_accept_conditions" required>
                <label for="inscription_accept_conditions">J'accepte les conditions d'utilisation</label>
            </div>
            <button type="submit" name="inscription" >S'inscrire</button>
        
        </form>

    <p>Déjà un compte ? <a href="index.php"> Cliquez-ici !</a></p> 

</div>

<?php include("footer.php"); ?>

