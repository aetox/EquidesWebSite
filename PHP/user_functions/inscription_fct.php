<?php

$info = array();

//Fonction qui valide les données
function valid_donnees($donnees){
  $donnees = trim($donnees);// supprimes les espaces en debut et fin de chaines
  $donnees = stripslashes($donnees); // suprime les \ d'une chaine de caractère
  $donnees = htmlspecialchars($donnees); // convertie les caractères spéciaux en entitées HTML
  return $donnees;
}

// Function pour les images uploud :


if(isset($_POST['inscription'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
  
  $prenom = valid_donnees($_POST['surname']);
  $nom = valid_donnees($_POST['name']);
  $mail =valid_donnees($_POST['mail']);
  $password =valid_donnees($_POST['password']);
  $sire =  valid_donnees($_POST['sire']);
  $conditions = $_POST['inscription_accept_conditions'];
  $photo = $_FILES['photo_detenteur'];
  
  
  if(empty($_POST['surname'])){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
    array_push($info, "Le champ Nom est vide");
  } elseif(empty($_POST['name'])){//le champ mot de passe est vide
    array_push($info, "Le champ Prénom est vide");
  } elseif (empty($_POST['mail'])) { //le champ mot de passe est vide
    array_push($info, "Le champ Mail est vide");
  } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM detenteur WHERE mail_detenteur='".$_POST['mail']."'"))==1){//on vérifie que ce mail n'est pas déjà utilisé par un autre membre
    array_push($info, "Ce mail est déjà utilisé");
  } elseif(empty($_POST['password'])){//le champ mot de passe est vide
    array_push($info, "Le champ Mot de passe est vide");
  } elseif(empty($_POST['sire'])){
    array_push($info, "Le champ Sire est vide");
  } elseif(empty($_POST['inscription_accept_conditions'])){
    array_push($info, "Vous devez accepter les conditions d'utilisations.");
  } elseif(empty($_FILES['photo_detenteur'])){
    array_push($info,"Vous devez ajouter une photo de profil");
  }
  else {

    $img_detenteur= $_FILES['photo_detenteur']['name']; 

    $tpm_nom = $_FILES['photo_detenteur']['tmp_name'];
    $time = time();
  
    // On renome l'image avec le format : heure + nom de l'image 
    
    $new_img_name = $time.$img_detenteur;
    
    move_uploaded_file($tpm_nom,"../ASSETS/img_bdd/".$new_img_name);
  
    $numSire = $_POST['sire'];
    // Requette pour ajouter l'image dans la bdd
    $sqlImg ="INSERT INTO image VALUES (NULL,'$new_img_name','$numSire')";
    $result_img = mysqli_query($mysqli,$sqlImg) or die(mysqli_error($mysqli));
    
    if ($result_img !== false) {
      $insert_id = mysqli_insert_id($mysqli);
    } else {
      array_push($info, "Erreur img");
    }

      //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
      //Bien évidement il s'agit là d'un script simplifié au maximum, libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple
      if(!mysqli_query($mysqli,"INSERT INTO detenteur SET nom_detenteur='".$_POST['name']."', sire ='".$_POST['sire']."',prenom_detenteur ='".$_POST['surname']."',mail_detenteur ='".$_POST['mail']."', password_detenteur='".hash('sha256', $_POST['password'])."'")){//on crypte le mot de passe avec la fonction propre à PHP: md5()
        array_push($info, "Erreur").mysqli_error($mysqli);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
      
      
      } else {
        array_push($info, "Vous êtes inscrit !");
      }
  }
}



?>
    