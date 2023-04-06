<?php
if (isset($_POST["ajouter"])) {

  // Récupération des données du formulaire
  $numSIRE = $_POST['numSIRE'];
  $numUELN = $_POST['numUELN'];
  $nomEquide = $_POST['nom_equide'];
  $dateNaissance = $_POST['dateNaissance_equide'];
  $lieuNaissance = $_POST['lieuNaissance_equide'];
  $raceEquide = $_POST['race_equide'];
  $studEquide = $_POST['stud_equide'];
  $lieuElevage = $_POST['lieuElevage_equide'];
  $sexeEquide = $_POST['sexe'];
  $robeEquide = $_POST['robe_equide'];
  $naisseurVeterinaire = $_POST['naisseurVeterinaire_equide'];
  $tete = $_POST['tête_equide'];
  $antg =$_POST['antg_equide'];
  $antd =$_POST['antd_equide'];
  $postg =$_POST['postg_equide'];
  $postd =$_POST['postd_equide'];
  $marques =$_POST['marques_equide'];
  // $pereEquide = $_POST['pere_equide'];
  // $mereEquide = $_POST['mere_equide'];


  // Requête SQL pour mettre à jour les informations du cheval
  //************************************** *//
  // Ajouter RACE,LIEU D'ELEVAGE,VETERINAIRE,PERE,MERE

  $sql = "UPDATE `equide` SET
  `ueln`='$numUELN',
  `nom`='$nomEquide',
  `date_naissance`='$dateNaissance',
  `lieu_naissance`='$lieuNaissance',
  `stud`='$studEquide',
  `sexe`='$sexeEquide', 
  `robe`='$robeEquide',
  `tete`='$tete',
  `antg`='$antg',
  `antd`='$antd',
  `postg`='$postg',
  `postd` ='$postd',
  `marques`='$marques'

  WHERE `sire`='$numSIRE'";

  $result_info = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
  
  if ($result_info !== false) {
    header("Location: ../equides.php");
  } else {
    array_push($info_error, "Erreur img");
  }
}


?>