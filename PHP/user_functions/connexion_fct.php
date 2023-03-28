<?php

$info_error = array();
$info_succes = array();


if(isset($_POST['mail'],$_POST['password'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"

  $mail = ($_POST['mail']);
  $mail = stripslashes($_REQUEST['mail']);
  $mail = mysqli_real_escape_string($mysqli, $mail);

  $password = ($_POST['password']); 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($mysqli, $password);



  if(empty($mail)){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
    array_push($info_error, "Le champ mail est vide");
  } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM `login` WHERE email='".$mail."'"))==0){//on vérifie que ce mail n'est pas déjà utilisé par un autre membre
    array_push($info_error, "Aucun compte avec cette adresse mail");
  } elseif(empty($password)){//le champ mot de passe est vide
    array_push($info_error, "Le champ Mot de passe est vide");        
  } else {
            
            //toutes les vérifications sont faites, on passe à la connexion
            $query = "SELECT * FROM `login` WHERE email='$mail' and mot_de_passe='".hash('sha256', $password)."'";
            $result = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
            
            //Récupere l'id_login de la personne connecté
            if(mysqli_num_rows($result) > 0){
                while($rows = mysqli_fetch_array($result)){
                $id_login = $rows['id_login'];
                }

                //Vérifie si la personne connecté est un détenteur 
                $queryDetenteur = "SELECT * FROM `detenteur` WHERE id_login=$id_login"; 
                $resultDetenteur = mysqli_query($mysqli,$queryDetenteur) or die(mysqli_error($mysqli));
                
                if(mysqli_num_rows($resultDetenteur) > 0){
                  
                  while($rowData = mysqli_fetch_array($resultDetenteur)){

                    // stock dans une variable SESSION ( session qui reste active avec session_start()) les infos de l'utlisateur 
                    $_SESSION['type_profil'] = "detenteur"; 
                    $_SESSION['id_login'] = $rowData['id_login'];  
                    $_SESSION['id_detenteur'] = $rowData['id_detenteur'];
                    $_SESSION['prenom'] = $rowData['prenom'];
                    $_SESSION['logged_user'] = true;
                    header('Location: ../../accueil.php');
                  }
                }else{

                  $queryProprietaire = "SELECT * FROM `proprietaire` WHERE id_login=$id_login"; 
                  $resultProprietaire = mysqli_query($mysqli,$queryProprietaire) or die(mysqli_error($mysqli));

                  if(mysqli_num_rows($resultProprietaire) > 0){
                    while($rowData = mysqli_fetch_array($resultProprietaire)){

                      // stock dans une variable SESSION ( session qui reste active avec session_start()) les infos de l'utlisateur 
                      $_SESSION['type_profil'] = "proprietaire";    
                      $_SESSION['id_login'] = $rowData['id_login'];  
                      $_SESSION['id_proprietaire'] = $rowData['id_proprietaire'];
                      $_SESSION['prenom'] = $rowData['prenom'];
                      $_SESSION['logged_user'] = true;
                      header('Location: ../../accueil.php');
                    }
                  }
                }

            }else{
              array_push($info_error, "L'email ou le mot de passe est incorrect");
      }
  }
}
?>