<?php

$info = array();


// Function pour les images uploud :


if(isset($_POST['inscription'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
  
//Même procédure quee pour la connexion

  $prenom = $_POST['surname'];
  $prenom = stripslashes($_REQUEST['surname']);
  $prenom = mysqli_real_escape_string($mysqli, $prenom);

  $nom = $_POST['name'];
  $nom = stripslashes($_REQUEST['name']);
  $nom = mysqli_real_escape_string($mysqli, $nom);

  $mail = ($_POST['mail']);
  $mail = stripslashes($_REQUEST['mail']);
  $mail = mysqli_real_escape_string($mysqli, $mail);

  $password = ($_POST['password']); 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($mysqli, $password);

  $sire = $_POST['sire'];
  $sire = stripslashes($_REQUEST['sire']);
  $sire = mysqli_real_escape_string($mysqli, $sire);

  $conditions = $_POST['inscription_accept_conditions'];

  
    if(empty($prenom)){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
      array_push($info, "Le champ Nom est vide");
    } elseif(empty($nom)){//le champ mot de passe est vide
      array_push($info, "Le champ Prénom est vide");
    } elseif (empty($mail)) { //le champ mot de passe est vide
      array_push($info, "Le champ Mail est vide");
    } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM detenteur WHERE mail_detenteur='".$mail."'"))==1){//on vérifie que ce mail n'est pas déjà utilisé par un autre membre
      array_push($info, "Ce mail est déjà utilisé");
    } elseif(empty($password)){//le champ mot de passe est vide
      array_push($info, "Le champ Mot de passe est vide");
    } elseif(empty($sire)){
      array_push($info, "Le champ Sire est vide");
    } elseif(empty($conditions)){
      array_push($info, "Vous devez accepter les conditions d'utilisations.");
    } elseif(empty($_FILES['photo_detenteur'])){
      array_push($info,"Vous devez ajouter une photo de profil");
    } else {

        $img_detenteur= $_FILES['photo_detenteur']['name']; 
        $imgExtensions = array('jpg','gif','png','jpeg'); //Extensions d'images autorisées
        $extension  = pathinfo($_FILES['photo_detenteur']['name'], PATHINFO_EXTENSION); // Recupère l'extention de l'image

        if(in_array(strtolower($extension),$imgExtensions)){ // verifie l'extension du fichier

          $tpm_nom = $_FILES['photo_detenteur']['tmp_name'];
          $time = time();
        
          // On renome l'image avec le format : heure + nom de l'image 
          
          $new_img_name = $time.$img_detenteur;
          
          move_uploaded_file($tpm_nom,"../ASSETS/img_bdd/".$new_img_name);
          
          // Requette pour ajouter l'image dans la bdd
          $sqlImg ="INSERT INTO image VALUES (NULL,'$new_img_name','$sire')";
          $result_img = mysqli_query($mysqli,$sqlImg) or die(mysqli_error($mysqli));
          
            if ($result_img !== false) {
              $insert_id = mysqli_insert_id($mysqli);
            } else {
              array_push($info, "Erreur img");
            }
  
              //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
              //Bien évidement il s'agit là d'un script simplifié au maximum, libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple
              if(!mysqli_query($mysqli,"INSERT INTO detenteur SET nom_detenteur='".$nom."', sire ='".$sire."',prenom_detenteur ='".$prenom."',mail_detenteur ='".$mail."', password_detenteur='".hash('sha256', $password)."'")){//on crypte le mot de passe avec la fonction propre à PHP: md5()
                array_push($info, "Erreur").mysqli_error($mysqli);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
              
              
              } else {
                array_push($info, "Vous êtes inscrit !");
              }
        

        }else{
          array_push($info,"Veuillez choisir une image de type  : jpg, gif, png, jpeg");
        }

      }

}



?>
    