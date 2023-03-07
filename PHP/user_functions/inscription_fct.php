<?php

$info = array();

if(isset($_POST['surname'],$_POST['name'],$_POST['mail'],$_POST['password'],$_POST['sire'],$_POST['inscription_accept_conditions'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
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
  }
  else {
      //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
      //Bien évidement il s'agit là d'un script simplifié au maximum, libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple
      if(!mysqli_query($mysqli,"INSERT INTO detenteur SET nom_detenteur='".$_POST['surname']."',prenom_detenteur ='".$_POST['name']."',mail_detenteur ='".$_POST['mail']."', password_detenteur='".hash('sha256', $_POST['password'])."'")){//on crypte le mot de passe avec la fonction propre à PHP: md5()
        array_push($info, "Erreur").mysqli_error($mysqli);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
      } else {
        array_push($info, "Vous êtes inscrit !");
      }
  }
}

    

?>
    