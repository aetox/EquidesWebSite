<?php


$info_error = array();
$info_succes = array();


if (isset($_POST["ajouter"])) {

  // Récupération des données du formulaire
  $nomVeto = $_POST['nomVeterinaire'];
  $prenomVeto = $_POST['prenomVeterinaire'];
  $rueVeto = $_POST['rueVeterinaire'];
  $communeVeto = $_POST['communeVeterinaire'];
  $codePostal = $_POST['codePostalVeterinaire'];
  $typeVeterinaire = $_POST['typeVeterinaire'];
  $dateDebutAffectation =$_POST['dateDebutAffectationVeterinaire'];
  $dateFinAffectation =$_POST['dateFinAffectationVeterinaire'];


  // Requête SQL pour mettre à jour les informations du cheval
  //************************************** *//
  // Ajouter RACE,LIEU D'ELEVAGE,VETERINAIRE,PERE,MERE

  $sql = "UPDATE `veterinaire` SET
  `nom`='$nomVeto',
  `prenom`='$prenomVeto',
  `rue`='$rueVeto',
  `commune`='$communeVeto',
  `code_postal`='$codePostal'

  WHERE `id_veterinaire`='$id_veterinaire'";

  $result_info = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
  
  if ($result_info !== false) {

    $sql2 = "UPDATE `affectation_veterinaire` SET
    `type_veterinaire`='$typeVeterinaire',
    `date_debut`='$dateDebutAffectation',
    `date_fin`='$dateFinAffectation'

    WHERE `id_veterinaire`='$id_veterinaire'";
  
    $result_info2 = mysqli_query($mysqli,$sql2) or die (mysqli_error($mysqli));
    
    if ($result_info2 !== false) {

      array_push($info_succes, "Info vétérinaire mis à jour");

    }else {
      array_push($info_error, "Erreur 2");

    }
  } else {
    array_push($info_error, "Erreur 1");
  }
}


?>