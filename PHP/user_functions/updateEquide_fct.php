<?php


if (isset($_POST["ajouter"])) {

// Récupération des données du formulaire
$idSire = $_POST['numSIRE'];
$numUELN = $_POST['numUELN'];
$nomEquide = $_POST['nom_equide'];
$dateNaissance = $_POST['dateNaissance_equide'];
$lieuNaissance = $_POST['lieuNaissance_equide'];
$raceEquide = $_POST['race_equide'];
$studEquide = $_POST['stud_equide'];
$lieuElevage = $_POST['lieuElevage_equide'];
$sexeEquide = $_POST['sexe_equide'];
$robeEquide = $_POST['robe_equide'];
$naisseurVeterinaire = $_POST['naisseurVeterinaire_equide'];
$pereEquide = $_POST['pere_equide'];
$mereEquide = $_POST['mere_equide'];

// Requête SQL pour mettre à jour les informations du cheval
$sql = "UPDATE `equide` SET `numUELN`='$numUELN', `nom_equide`='$nomEquide', `dateNaissance_equide`='$dateNaissance', `lieuNaissance_equide`='$lieuNaissance', `race_equide`='$raceEquide', `stud_equide`='$studEquide', `lieuElevage_equide`='$lieuElevage', `sexe_equide`='$sexeEquide', `robe_equide`='$robeEquide', `naisseurVeterinaire_equide`='$naisseurVeterinaire', `pere_equide`='$pereEquide', `mere_equide`='$mereEquide' WHERE `numSIRE`='$idSire'";
$result_info = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
  
if ($result_info !== false) {
  header("Location: ../EquidesWebSite/equides.php");
} else {
  array_push($info, "Erreur img");
}
}


?>