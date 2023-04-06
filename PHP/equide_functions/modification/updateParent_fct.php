<?php

$info_succes = array();
$info_error = array();

$id_parent =$_GET['idParent'];

if (isset($_POST["ajouter"])) {

  // Récupération des données du formulaire
  $nomParent = $_POST['nomParent'];
  $sireParent = $_POST['sireParent'];
  $couleurParent = $_POST['couleurParent'];
  $idRaceParent =$_POST['race_equide'];

  $sql = "UPDATE `ascendance` SET
  `id_race`='$idRaceParent',
  `nom`='$nomParent',
  `sire`='$sireParent',
  `couleur`='$couleurParent'

  WHERE `id_ascendance`='$id_parent'";

  $result_info = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
  
  if ($result_info !== false) {

    header("Location: ../equides_description?sireEquide=$sireEquide.php");
  } else {
    array_push($info_error,  $result_info);
  }
}


?>