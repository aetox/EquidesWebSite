<?php

$info_error = array();
$info_succes = array();

$site_root = $_SERVER['DOCUMENT_ROOT'];

if (isset($_POST["ajouter"])) {

  $idDetenteur = $_SESSION['id_detenteur'];
  $nom_ecurie = mysqli_real_escape_string($mysqli, $_POST["nom_ecurie"]);
  $SIRET = mysqli_real_escape_string($mysqli, $_POST["SIRET"]);
  $rue = mysqli_real_escape_string($mysqli, $_POST["rue"]);
  $commune = mysqli_real_escape_string($mysqli, $_POST["commune"]);
  $code_postal = mysqli_real_escape_string($mysqli, $_POST["code_postal"]);
  $espece = mysqli_real_escape_string($mysqli, $_POST["espece"]);

  if(empty($SIRET)){
    array_push($info_error, "Veuillez indiquer un numéro de SIRE !");
  }elseif (empty($nom_ecurie)) {
    array_push($info_error, "Veuillez indiquer un numéro d'UELN !");
  }elseif (empty($rue)){
    array_push($info_error, "Veuillez indiquer un nom pour l'équidé !");
  }elseif(empty($commune)){
    array_push($info_error, "Veuillez indiquer une date de naissance !");
  }elseif(empty($code_postal)){
    array_push($info_error, "Veuillez indiquer une lieu de naissance !");
  }elseif (empty($espece)) {
    array_push($info_error, "Veuillez indiquer la race de l'équidé !");
  }

    $ajoutEcurie =
    "INSERT INTO `registre_equide` (nom_ecurie, rue, commune, code_postal, siret, espece, id_detenteur)
    VALUES ('$nom_ecurie', '$rue', '$commune', '$code_postal', '$SIRET', '$espece', '$idDetenteur')";

    $result_info = mysqli_query($mysqli,$ajoutEcurie) or die (mysqli_error($mysqli));

    if ($result_info !== false) {
        $insert_id_equide = mysqli_insert_id($mysqli);
        array_push($info_succes, "Ecurie ajouté");
        header("Location: ../../ecurie.php");
    }
    else {
      array_push($info_error, "Une erreur est survenue");
    }
}
?>
