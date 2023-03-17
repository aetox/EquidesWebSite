<?php

$info = array();

//Vérifier table equides pour afffecter un equides à un detenteur


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
    $insert_id = mysqli_insert_id($mysqli);
    array_push($info, "img ajouté avec l'ID : " . $insert_id);
  } else {
    array_push($info, "Erreur img");
  }

  // Prépare la requête SQL pour insérer les données dans la table "equide"
  $sql = "INSERT INTO equide (numSire, numUELN,id_detenteur, nom_equide, dateNaissance_equide, lieuNaissance_equide, race_equide, stud_equide, lieuElevage_equide, sexe_equide, robe_equide, naisseurVeterinaire_equide, pere_equide, mere_equide)
  VALUES ('$numSire', '$numUELN','$detenteur', '$nom_equide', '$dateNaissance_equide', '$lieuNaissance_equide', '$race_equide', '$stud_equide', '$lieuElevage_equide', '$sexe_equide', '$robe_equide', '$naisseurVeterinaire_equide', '$pere_equide', '$mere_equide')";

  $result_info = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
  
  if ($result_info !== false) {
    $insert_id = mysqli_insert_id($mysqli);
    array_push($info, "img ajouté avec l'ID : " . $insert_id);
    header("Location: ../../../equides.php");
  } else {
    array_push($info, "Erreur img");
  }
}

?>