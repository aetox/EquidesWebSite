<?php


$info_error = array();
$info_succes = array();


if (isset($_POST["ajouter"])) {

  // Récupération des données du formulaire
  $nomMarechal = $_POST['nomMarechal'];
  $prenomMarechal = $_POST['prenomMarechal'];
  $rueMarechal = $_POST['rueMarechal'];
  $communeMarechal = $_POST['communeMarechal'];
  $codePostal = $_POST['codePostalMarechal'];
  $dateDebutAffectation =$_POST['dateDebutAffectationMarechal'];
  $dateFinAffectation =$_POST['dateFinAffectationMarechal'];



  $sql = "UPDATE `marechal` SET
  `nom`='$nomMarechal',
  `rue`='$rueMarechal',
  `commune`='$communeMarechal',
  `code_postal`='$codePostal'

  WHERE `id_marechal`='$id_Marechal'";

  $result_info = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
  
  if ($result_info !== false) {

    $sql2 = "UPDATE `affectation_marechal` SET
    `date_debut`='$dateDebutAffectation',
    `date_fin`='$dateFinAffectation'

    WHERE `id_marechal`='$id_Marechal'";
  
    $result_info2 = mysqli_query($mysqli,$sql2) or die (mysqli_error($mysqli));
    
    if ($result_info2 !== false) {

      array_push($info_succes, "Info Marechal mis à jour");

    }else {
      array_push($info_error, "Erreur 2");

    }
  } else {
    array_push($info_error, "Erreur 1");
  }
}


?>