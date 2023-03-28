<?php


if (isset($_POST["update"])) {

// Récupération des données du formulaire
if(isset($_SESSION['id_detenteur'])){ 

    $id_detenteur =$_SESSION['id_detenteur'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sire = $_POST['sire'];
    $email = $_POST['email'];
    $rue = $_POST['rue'];
    $commune = $_POST['commune'];
    $code_postal = $_POST['code_postal'];
    $signature_detenteur = $_POST['signature'];
    $date_enregistrement = $_POST['date_enregistrement'];
    $nationalite = $_POST['nationalite'];


    $sql = "UPDATE `detenteur` SET
    `sire`='$sire',
    `nom`='$nom',
    `prenom`='$prenom',
    `rue`='$rue',
    `commune`='$commune',
    `code_postal`='$code_postal',
    `signature_detenteur`='$signature_detenteur',
    `date_enregistrement`='$date_enregistrement',
    `nationalite`='$nationalite'
     
    WHERE `id_detenteur`='$id_detenteur'";

    $result_info = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
  
    if ($result_info !== false) {

        $sqlLogin="UPDATE `login`
        JOIN `detenteur` ON `login`.`id_login` = `detenteur`.`id_login`
        SET `login`.`email` = '$email'
        WHERE `detenteur`.`id_detenteur` = '$id_detenteur'";

        $result_login = mysqli_query($mysqli,$sqlLogin) or die (mysqli_error($mysqli));

        if($result_login !== false) {
            header("Location: ../profil.php");
        }else{
            array_push($info_error, "Erreur mise à jour du mail");
        } 
    } else {
    array_push($info_error, "Erreur mise à jour du profil");
    }
}elseif(isset($_SESSION['id_proprietaire'])){ 

    $id_proprietaire =$_SESSION['id_proprietaire'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $rue = $_POST['rue'];
    $commune = $_POST['commune'];
    $code_postal = $_POST['code_postal'];



    // Requête SQL pour mettre à jour les informations 
    $sql = "UPDATE `proprietaire` SET
    `nom`='$nom',
    `prenom`='$prenom',
    `rue`='$rue',
    `commune`='$commune',
    `code_postal`='$code_postal'
    
    WHERE `id_proprietaire`='$id_proprietaire'";

    $result_info = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
  
    if ($result_info !== false) {

        $sqlLogin="UPDATE `login`
        JOIN `proprietaire` ON `login`.`id_login` = `proprietaire`.`id_login`
        SET `login`.`email` = '$email'
        WHERE `proprietaire`.`id_proprietaire` = '$id_proprietaire'";

        $result_login = mysqli_query($mysqli,$sqlLogin) or die (mysqli_error($mysqli));

        if($result_login !== false) {
            header("Location: ../profil.php");
        }else{
            array_push($info_error, "Erreur mise à jour du mail");
        } 
    } else {
    array_push($info_error, "Erreur mise à jour du profil");
    }
}

}



?>