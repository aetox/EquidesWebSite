<?php

$info_error = array();
$info_succes = array();

$site_root = $_SERVER['DOCUMENT_ROOT'];


// Vérifie si les données ont été soumises
if (isset($_POST["ajouter"])) {

  // Récupère les données du formulaire
  $id_propriétaire = $_POST["id_propriétaire"];
  $numSire = $_POST["numSire"];
  $numUELN = $_POST["numUELN"];
  $nom_equide = $_POST["nom_equide"];
  $dateNaissance_equide = $_POST["dateNaissance_equide"];
  $lieuNaissance_equide = $_POST["lieuNaissance_equide"];
  $id_race = $_POST["race_equide"];
  $stud_equide = $_POST["stud_equide"];
  $lieuElevage_equide = $_POST["lieuElevage_equide"];
  $sexe_equide = $_POST["sexe_equide"];
  $robe_equide = $_POST["robe_equide"];
  $naisseurVeterinaire_equide = $_POST["naisseurVeterinaire_equide"];
  $img_equide = $_FILES['photo_equide']['name']; 
  $detenteur = $_SESSION["id_detenteur"];
  /*Rajout par Noé, je ne les ai pas mit en required, donc je ne les vérifie pas juste en dessous, c'est facultatif*/
  $tete = $_POST["tête_equide"];
  $antg = $_POST["antg_equide"];
  $antd = $_POST["antd_equide"];
  $postg = $_POST["postg_equide"];
  $postd = $_POST["postd_equide"];
  $marques = $_POST["marques_equide"];


  if(empty($numSire)){
    array_push($info_error, "Veuillez indiquer un numéro de SIRE !");
  }elseif (empty($numUELN)) {
    array_push($info_error, "Veuillez indiquer un numéro d'UELN !");
  }elseif (empty($nom_equide)){
    array_push($info_error, "Veuillez indiquer un nom pour l'équidé !");
  }elseif(empty($dateNaissance_equide)){
    array_push($info_error, "Veuillez indiquer une date de naissance !");
  }elseif(empty($lieuNaissance_equide)){
    array_push($info_error, "Veuillez indiquer une lieu de naissance !");
  }elseif (empty($id_race)) {
    array_push($info_error, "Veuillez indiquer la race de l'équidé !");
  }elseif (empty($stud_equide)){
    array_push($info_error, "Veuillez indiquer le stud de l'équidé !");
  }elseif (empty($lieuElevage_equide)) {
    array_push($info_error, "Veuillez indiquer le lieu d'élevage !");
  }elseif (empty($sexe_equide)){
    array_push($info_error, "Veuillez indiquer le sexe de l'équidé !");
  }elseif (empty($robe_equide)){
    array_push($info_error, "Veuillez indiquer la robe de l'équidé !");
  }elseif (empty($naisseurVeterinaire_equide)) {
    array_push($info_error, "Veuillez indiquer le vétérinaire naisseur de l'équidé !");
  }elseif(empty($img_equide)){
    array_push($info_error, "Veuillez ajouter une image pour l'équidé !");
  }

  if(strlen($numSire)  == 9){

    if(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM equide WHERE sire='".$numSire."'"))==0){ //Vérifie si le numéro de sire existe déjà

      if (strlen($numUELN) == 13) {

        $img_equide= $_FILES['photo_equide']['name']; 
        $imgExtensions = array('jpg','gif','png','jpeg'); //Extensions d'images autorisées
        $extension  = pathinfo($_FILES['photo_equide']['name'], PATHINFO_EXTENSION); // Recupère l'extention de l'image

        if(in_array(strtolower($extension),$imgExtensions)){ // verifie l'extension du fichier

          //******************************************************************************************* */
                              // AJout d'image
  
              
              $maxsize=5000000; // Poids de 5Mo maximum pour la photo
          
              if($_FILES['photo_equide']['size'] <= $maxsize){

                   //Pour l'image on définit un nom temporaire :
  
                  $tpm_nom = $_FILES['photo_equide']['tmp_name'];
                  $time = time();

                  // On renome l'image avec le format : heure + nom de l'image 
                  
                  $new_img_name = $time.$img_equide;
                  
                  move_uploaded_file($tpm_nom,"$site_root/ASSETS/img_bdd/".$new_img_name); // Supprimer Equide


                    // Prépare la requête SQL pour insérer les données dans la table "equide"
                    $sql = "INSERT INTO equide (id_proprietaire, id_race, sire, ueln, nom, date_naissance, stud, lieu_naissance, sexe, robe, tete, antg, antd, postg, postd, marques, lieu_elevage, naisseur)
                    VALUES ('$id_propriétaire', '$id_race','$numSire', '$numUELN', '$nom_equide', '$dateNaissance_equide', '$stud_equide', '$lieuNaissance_equide', '$sexe_equide', '$robe_equide', '$tete', '$antg', '$antd', '$postg', '$postd', '$marques', '$lieuElevage_equide', '$naisseurVeterinaire_equide')";

                    $result_info = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
                    
                    if ($result_info !== false) {
                      $insert_id_equide = mysqli_insert_id($mysqli);

                        // Requette pour ajouter l'image dans la bdd
                        $sqlImg = "INSERT INTO image (id_equide, image) VALUES ('$insert_id_equide', '$new_img_name')";
                        $result_img = mysqli_query($mysqli,$sqlImg) or die(mysqli_error($mysqli));
                        
                        if ($result_img !== false) {
                          $insert_id_img = mysqli_insert_id($mysqli); // Récupère l'id AUTO-INCREMENT
                        } else {
                          array_push($info_error, "Erreur img");
                        }



                      
                      $sql2 ="INSERT INTO en_pension (id_equide) VALUES($insert_id_equide)";

                        $result2 = mysqli_query($mysqli,$sql2) or die (mysqli_error($mysqli));
                      
                        if ($result2 !== false) {
                          
                          array_push($info_succes, "équidé ajouté");
                          // header("Location: ../../../equides.php");

                        }

                    } else {
                      array_push($info_error, "Erreur img");
                    }
              }
        }
      }else{
        array_push($info_error, "Veuillez indiquer un numéro d'UELN à 13 chiffres.");
      }
    
    }else{
      array_push($info_error, "Veuillez indiquer un numéro de SIRE à 9 chiffres.");    
    }

  }else{
    array_push($info_error, "Equidé déjà ajouté.");
  }





  



}

?>