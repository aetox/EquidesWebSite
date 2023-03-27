<?php

$info_error = array();
$info_succes = array();

$site_root = $_SERVER['DOCUMENT_ROOT'];


if(isset($_POST['inscription_proprietaire'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
  
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
    } elseif(empty($_FILES['photo_detenteur'])){
      array_push($info_error,"Vous devez ajouter une photo de profil");
    } else {

        if(strlen($code_postal)  == 5){
          $img_detenteur= $_FILES['photo_detenteur']['name']; 
          $imgExtensions = array('jpg','gif','png','jpeg'); //Extensions d'images autorisées
          $extension  = pathinfo($_FILES['photo_detenteur']['name'], PATHINFO_EXTENSION); // Recupère l'extention de l'image
  
          if(in_array(strtolower($extension),$imgExtensions)){ // verifie l'extension du fichier
                
  
            //******************************************************************************************* */
                              // AJout d'image
  
                $maxsize=5000000; // Poids de 5Mo maximum pour la photo
            
                if($_FILES['photo_detenteur']['size'] <= $maxsize){
                
                //   $tpm_nom = $_FILES['photo_detenteur']['tmp_name'];
                //   $time = time();
  
                //   // On renome l'image avec le format : heure + nom de l'image 
                
                //   $new_img_name = $time.$img_detenteur;
                
                //   move_uploaded_file($tpm_nom,"$site_root/ASSETS/img_bdd/".$new_img_name);
                
                //   // Requette pour ajouter l'image dans la bdd
                //   $sqlImg ="INSERT INTO image VALUES (NULL,'$new_img_name','$sire')";
                //   $result_img = mysqli_query($mysqli,$sqlImg) or die(mysqli_error($mysqli));
                
                //    if ($result_img !== false) {
                //       $insert_id = mysqli_insert_id($mysqli);
                //     } else {
                //       array_push($info_error, "Erreur img");
                //       }
          //****************************************************************************************************** */
                      //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
                      //Bien évidement il s'agit là d'un script simplifié au maximum, libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple
                      
                      
                          //La personne qui s'inscrit est un propriétaire d'équidé
  
                          $sqlLoginProprio ="INSERT INTO `login` (email, mot_de_passe) VALUES ('".$mail."', '".hash('sha256', $password)."')";
                          $resultLoginProprio = mysqli_query($mysqli,$sqlLoginProprio) or die(mysqli_error($mysqli));
                          
                          $id_login = mysqli_insert_id($mysqli); // Recupere l'id généré lors de l'insertion
  
                          // while($rows = mysqli_fetch_array($resultLoginProprio)){
                          //   $id_login = $rows['id_login'];
                          //   }
                          
                          $sqlProprio = "INSERT INTO `proprietaire` (id_login, nom, prenom, rue, commune, code_postal) 
                          VALUES ('$id_login', '$nom', '$prenom', '$rue', '$commune', '$code_postal')";
                           $resultProprio = mysqli_query($mysqli,$sqlProprio) or die(mysqli_error($mysqli));
  
                          array_push($info_succes, "Vous êtes inscrit !");
  
  
                        
              }else{
                array_push($info_error,"Veuillez choisir une image inférieur à 5Mo !");
              }
          }else{
            array_push($info_error,"Veuillez choisir une image de type  : jpg, gif, png, jpeg");
          }

        }else{
            $len = strlen($code_postal);
          array_push($info_error,"Veuillez entrer un code postal composé de 5 chiffres .'$len'..'$code_postal.");
        }

      }
  }

?>
    