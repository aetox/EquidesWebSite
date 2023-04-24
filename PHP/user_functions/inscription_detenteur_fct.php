<?php

$info_error = array();
$info_succes = array();

$site_root = $_SERVER['DOCUMENT_ROOT'];


if(isset($_POST['inscription_detenteur'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
  
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

  $rue = $_POST['rue'];
  $rue = stripslashes($_REQUEST['rue']);
  $rue = mysqli_real_escape_string($mysqli, $rue);

  $commune = $_POST['commune'];
  $commune = stripslashes($_REQUEST['commune']);
  $commune = mysqli_real_escape_string($mysqli, $commune);

  $code_postal = $_POST['code_postal'];
  $code_postal = stripslashes($_REQUEST['code_postal']);
  $code_postal = mysqli_real_escape_string($mysqli, $code_postal);

  $sire = $_POST['sire'];
  $sire = stripslashes($_REQUEST['sire']);
  $sire = mysqli_real_escape_string($mysqli, $sire);

  $date_enregistrement = $_POST['date'];
  $date_enregistrement = stripslashes($_REQUEST['date']);
  $date_enregistrement = mysqli_real_escape_string($mysqli, $date_enregistrement);

  $signature = $_POST['signature'];
  $signature = stripslashes($_REQUEST['signature']);
  $signature = mysqli_real_escape_string($mysqli, $signature);

  
    if(empty($prenom)){
      array_push($info_error,"Le champ Nom est vide");
    } elseif(empty($nom)){//le champ mot de passe est vide
      array_push($info_error,"Le champ Prénom est vide");
    } elseif (empty($mail)) { //le champ mot de passe est vide
      array_push($info_error,"Le champ Mail est vide");
    } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM `login` WHERE email='".$mail."'"))==1){//on vérifie que ce mail n'est pas déjà utilisé par un autre membre
      array_push($info_error,"Ce mail est déjà utilisé");
    } elseif(empty($password)){//le champ mot de passe est vide
      array_push($info_error,"Le champ Mot de passe est vide");
    } elseif(empty($_POST['inscription_accept_conditions'])){
      array_push($info_error, "Vous devez accepter les conditions d'utilisations.");
    } elseif(empty($sire)){
      array_push($info_error,"Veuillez ajouter un numéro de sire");
    }elseif(empty($date_enregistrement)){
      array_push($info_error,"Veuillez ajouter une date d'enregistrement");
    }elseif(empty($signature)){
      array_push($info_error,"Veuillez ajouter vote signature");
    }else{

        if(strlen($code_postal)  == 5){
                         
                            $sqlLoginDetenteur ="INSERT INTO `login` (email, mot_de_passe) VALUES ('".$mail."', '".hash('sha256', $password)."')";
                            $resultLoginDetenteur = mysqli_query($mysqli,$sqlLoginDetenteur) or die(mysqli_error($mysqli));
  
                            $id_login = mysqli_insert_id($mysqli); // Recupere l'id généré lors de l'insertion
  
                            $sqlDetenteur = "INSERT INTO `detenteur` (`id_login`, `sire`, `nom`, `prenom`, `rue`, `commune`, `code_postal`, `signature_detenteur`, `date_enregistrement`) 
                            VALUES ('$id_login', $sire, '$nom', '$prenom', '$rue', '$commune', '$code_postal', '$signature', '$date_enregistrement')";
                            
                            $resultDetenteur = mysqli_query($mysqli,$sqlDetenteur) or die(mysqli_error($mysqli));
    
                            array_push($info_succes, "Vous êtes inscrit !");
              }else{
            $len = strlen($code_postal);
          array_push($info_error,"Veuillez entrer un code postal composé de 5 chiffres.");
        }
    }
  }

      

?>
    