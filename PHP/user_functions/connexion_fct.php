<?php

$info = array();

if(isset($_POST['mail'],$_POST['password'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
  if(empty($_POST['mail'])){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
    array_push($info, "Le champ mail est vide");
  } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM detenteur WHERE mail_detenteur='".$_POST['mail']."'"))==0){//on vérifie que ce mail n'est pas déjà utilisé par un autre membre
    array_push($info, "Aucun compte avec cette adresse mail");
  } elseif(empty($_POST['password'])){//le champ mot de passe est vide
    array_push($info, "Le champ Mot de passe est vide");
    // elseif(){}
        
  } else {
      //toutes les vérifications sont faites, on passe à la connexion
        
        $mail = stripslashes($_REQUEST['mail']);
        $mail = mysqli_real_escape_string($mysqli, $mail);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($mysqli, $password);
            $query = "SELECT * FROM `detenteur` WHERE mail_detenteur='$mail' and password_detenteur='".hash('sha256', $password)."'"; //".hash('sha256', $password)." ajouter le hash
            $result = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
            $rows = mysqli_num_rows($result);
        if($rows == 1){
            // Requete qui recupere les info de l'utilisateur connecté et le stock dans un tableau
            
            $query_info = "SELECT * FROM `detenteur` WHERE mail_detenteur='$mail' and password_detenteur='".hash('sha256', $password)."'"; //".hash('sha256', $password)." ajouter le hash
            $result_info = mysqli_query($mysqli,$query_info) or die(mysqli_error($mysqli));
            
             if(mysqli_num_rows($result_info) > 0){
              
              while($rowData = mysqli_fetch_array($result_info)){
            // stock dans une variable SESSION ( session qui reste active avec session_start()) les infos de l'utlisateur 
                $_SESSION['id_detenteur'] = $rowData['id_detenteur'];
                $_SESSION['prenom_detenteur'] = $rowData['prenom_detenteur'];
                $_SESSION['sire_detenteur'] = $rowData['sire'];
                $_SESSION['nom_detenteur'] = $rowData['nom_detenteur'];
                $_SESSION['mail_detenteur'] = $rowData['mail_detenteur'];
                $_SESSION['password_detenteur'] = $rowData['password_detenteur'];
                $_SESSION['nbEquide_detenteur'] = $rowData['nbEquide_detenteur'];
                $_SESSION['adresse_detenteur'] = $rowData['adresse_detenteur'];
                $_SESSION['nationalite_detenteur'] = $rowData['nationalite_detenteur'];
                $_SESSION['signature_detenteur'] = $rowData['signature_detenteur'];
                $_SESSION['dateEnregistrement_detenteur'] = $rowData['dateEnregistrement_detenteur'];
                $_SESSION['cachetOrganisation_detenteur'] = $rowData['cachetOrganisation_detenteur'];
                $_SESSION['signatureOrganisation_detenteur'] = $rowData['signatureOrganisation_detenteur'];
                $_SESSION['logged_user'] = true;
              }
             } 
            header("Location: ../EquidesWebSite/accueil.php");
        }else{
          array_push($info, "L'email ou le mot de passe est incorrect");
        }
    }
}

?>