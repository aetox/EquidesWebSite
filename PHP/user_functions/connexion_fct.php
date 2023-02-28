<?php

$info = array();


if(isset($_POST['mail'],$_POST['password'])){//l'utilisateur à cliqué sur "Se connecter", on demande donc si les champs sont défini avec "isset"
  // on effectue les requettes sql

  // cette requette permet de vérifier si un email existe déjà dans la bdd 
    $inputmail = $_POST['mail'];
    $inputpassword = $_POST['password'];
    
    $rqt = $conn->prepare("SELECT * FROM detenteur WHERE mail_detenteur='".$_POST['mail']."'");
    $rqt->execute([$inputmail]); 
    $user_mail = $rqt->fetch();

  


    if(empty($_POST['mail'])){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
    array_push($info, "Le champ mail est vide");
  } elseif(!$user_mail){//on vérifie que ce mail n'est pas déjà utilisé par un autre membre
    array_push($info, "Aucun compte avec cette adresse mail");
  } elseif(empty($_POST['password'])){//le champ mot de passe est vide
    array_push($info, "Le champ Mot de passe est vide");
    // elseif(){}
        
  } else {
      //toutes les vérifications sont faites, on passe à la connexion
        

        // $mail = stripslashes($_REQUEST['mail']);
        // $mail = mysqli_real_escape_string($mysqli, $mail);
        // $password = stripslashes($_REQUEST['password']);
        // $password = mysqli_real_escape_string($mysqli, $password);


            $rqt = "SELECT * FROM `detenteur` WHERE mail_detenteur='$inputmail' and password='$inputpassword'";
            $result = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
            $rows = mysqli_num_rows($result);
        if($rows == 1){


            // Requete qui recupere les info de l'utilisateur connecté et le stock dans un tableau
            
            $query_info = "SELECT * FROM `user` WHERE email='$mail' and password='".hash('sha256', $password)."'";
            $result_info = mysqli_query($mysqli,$query_info) or die(mysqli_error($mysqli));
            
             if(mysqli_num_rows($result_info) > 0){
              
              while($rowData = mysqli_fetch_array($result_info)){
            // stock dans une variable SESSION ( session qui reste active avec session_start()) les infos de l'utlisateur 
                $_SESSION['prenom'] = $rowData['prenom'];
                $_SESSION[' nom'] = $rowData['nom'];
                $_SESSION['mail'] = $rowData['mail'];
                $_SESSION['user_id'] = $rowData['user_id'];
                $_SESSION['logged_user'] = true;

              }


             } 


            $_SESSION['mail'] = $mail;
            header("Location: ../profil.php");
        }else{
          array_push($info, "L'email ou le mot de passe est incorrect");
        }
    }
}

?>