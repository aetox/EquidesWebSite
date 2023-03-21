<?php

$info_error = array();
$info_succes = array();

$site_root = $_SERVER['DOCUMENT_ROOT'];


// Vérifie si les données ont été soumises
if (isset($_POST["ajouter"])) {

  // Récupère les données du formulaire
  $numSire = $_POST["numSire"];
  $numUELN = $_POST["numUELN"];
  $nom_equide = $_POST["nom_equide"];
  $dateNaissance_equide = $_POST["dateNaissance_equide"];
  $lieuNaissance_equide = $_POST["lieuNaissance_equide"];
  $race_equide = $_POST["race_equide"];
  $stud_equide = $_POST["stud_equide"];
  $lieuElevage_equide = $_POST["lieuElevage_equide"];
  $sexe_equide = $_POST["sexe_equide"];
  $robe_equide = $_POST["robe_equide"];
  $naisseurVeterinaire_equide = $_POST["naisseurVeterinaire_equide"];
  $pere_equide = $_POST["pere_equide"];
  $mere_equide = $_POST["mere_equide"];
  $img_equide = $_FILES['photo_equide']['name']; 
  $detenteur = $_SESSION["id_detenteur"];


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
  }elseif (empty($race_equide)) {
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
  }elseif(empty($pere_equide)){
    array_push($info_error, "Veuillez indiquer le père de l'équidé !");
  }elseif(empty($mere_equide)){
    array_push($info_error, "Veuillez indiquer la mère de l'équidé !");
  }elseif(empty($img_equide)){
    array_push($info_error, "Veuillez ajouter une image pour l'équidé !");
  }

  if(strlen($numSire)  == 9){

    if(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM equides WHERE numSIRE='".$numSire."'"))==0){ //Vérifie si le numéro de sire existe déjà

      if (strlen($numUELN) == 13) {

        $img_equide= $_FILES['photo_equide']['name']; 
        $imgExtensions = array('jpg','gif','png','jpeg'); //Extensions d'images autorisées
        $extension  = pathinfo($_FILES['photo_equide']['name'], PATHINFO_EXTENSION); // Recupère l'extention de l'image

        if(in_array(strtolower($extension),$imgExtensions)){ // verifie l'extension du fichier
              
              $maxsize=5000000; // Poids de 5Mo maximum pour la photo
          
              if($_FILES['photo_equide']['size'] <= $maxsize){

                  //Pour l'image on définit un nom temporaire :
  
                  $tpm_nom = $_FILES['photo_equide']['tmp_name'];
                  $time = time();

                  // On renome l'image avec le format : heure + nom de l'image 
                  
                  $new_img_name = $time.$img_equide;
                  
                  move_uploaded_file($tpm_nom,"$site_root/ASSETS/img_bdd/".$new_img_name);

                  // Requette pour ajouter l'image dans la bdd
                  $sqlImg ="INSERT INTO image VALUES (NULL,'$new_img_name','$numSire')";
                  $result_img = mysqli_query($mysqli,$sqlImg) or die(mysqli_error($mysqli));
                  
                    if ($result_img !== false) {
                      $insert_id_img = mysqli_insert_id($mysqli); // Récupère l'id AUTO-INCREMENT
                      array_push($info_succes, "Image ajouté");
                    } else {
                      array_push($info_error, "Erreur img");
                    }

                    // Prépare la requête SQL pour insérer les données dans la table "equide"
                    $sql = "INSERT INTO equide (numSire, numUELN,id_detenteur, nom_equide, dateNaissance_equide, lieuNaissance_equide, race_equide, stud_equide, lieuElevage_equide, sexe_equide, robe_equide, naisseurVeterinaire_equide, pere_equide, mere_equide)
                    VALUES ('$numSire', '$numUELN','$detenteur', '$nom_equide', '$dateNaissance_equide', '$lieuNaissance_equide', '$race_equide', '$stud_equide', '$lieuElevage_equide', '$sexe_equide', '$robe_equide', '$naisseurVeterinaire_equide', '$pere_equide', '$mere_equide')";

                    $result_info = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
                    
                    if ($result_info !== false) {
                      $insert_id_equide = mysqli_insert_id($mysqli);
                      array_push($info_succes, "équidé ajouté");
                      // header("Location: ../../../equides.php");
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