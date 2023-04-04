<?php


$info_error = array();
$info_succes = array();

$idDetenteur = $_SESSION['id_detenteur'];
if (isset($_POST["ajouter"])) {

  // Récupération des données du formulaire
  $nomEcurie = $_POST['nom_ecurie'];
  $registreRue = $_POST['rue'];
  $registreCommune = $_POST['commune'];
  $registreCodePostal = $_POST['code_postal'];
  $siret = $_POST['SIRET'];
  $registreEspece =$_POST['espece'];

  // Requête SQL pour mettre à jour les informations du cheval
  //************************************** *//
  // Ajouter RACE,LIEU D'ELEVAGE,VETERINAIRE,PERE,MERE

  $sql = "UPDATE `registre_equide` SET
  `nom_ecurie`='$nomEcurie',
  `rue`='$registreRue',
  `commune`='$registreCommune',
  `code_postal`='$registreCodePostal',
  `siret`='$siret',
  `espece`='$registreEspece'

  WHERE `id_detenteur`='$idDetenteur'";

  $result_info = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
  
  if ($result_info !== false) {
    array_push($info_succes, "écurie mis à jour");
    //header("Location: ../ecurie_description.php");
  } else {
    array_push($info_error, "Erreur");
  }
}


?>