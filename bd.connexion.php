<?php
function dbConnect(){
    $db_user = 'root';
    $db_password = ''; //=>prochainement
    $db_name = 'equide';
    $db_host = ''; //=>prochainement
    
    //On essaie de se connecter
    try{
        $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
        //On définit le mode d'erreur de PDO sur Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo 'Connexion réussie';
    }
    
    /*On capture les exceptions si une exception est lancée et on affiche
     *les informations relatives à celle-ci*/
    catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    }
} 