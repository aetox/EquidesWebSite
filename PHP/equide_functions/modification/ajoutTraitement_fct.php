<?php

$info_error = array();
$info_succes = array();

$site_root = $_SERVER['DOCUMENT_ROOT'];
$sire = $_GET['sire'];


// Vérifie si les données ont été soumises
if (isset($_POST["ajouter"])) {
 
    $nom = $_POST['moleculeTraitement'];
    $reference = $_POST['referenceTraitement'];
    $date =$_POST['dateTraitement'];
    $commentaire = $_POST['commentaireTraitement'];

    if(empty($nom)){
        array_push($info_error,'Veuillez ajouter le nom du traitement');
    }elseif(empty($reference)){
        array_push($info_error,'Veuillez ajouter la référence du traitement');
    }elseif(empty($date)){
        array_push($info_error,'Veuillez ajouter la date du traitement');
    }elseif(empty($commentaire)){
        array_push($info_error,'Veuillez ajouter un commentaire');
    }else{

        $sql1 = "INSERT INTO `traitement` (nom) VALUES ('$reference')";

        if (mysqli_query($mysqli, $sql1)) {
            $id_traitement = mysqli_insert_id($mysqli);
        
            $sql2 = "INSERT INTO `type_acte` (nom_acte, acte, id_traitement) VALUES ('$nom', 'Veterinaire', $id_traitement)";
        
            if (mysqli_query($mysqli, $sql2)) {
                $id_type_acte = mysqli_insert_id($mysqli);

                $sqlregistre ="SELECT id_equide FROM `equide` WHERE sire='$sire'";

                $result = mysqli_query($mysqli,$sqlregistre) or die(mysqli_error($mysqli));

                if (mysqli_num_rows($result) > 0) {      

                    while($rowData = mysqli_fetch_array($result)){
                        $identifiant_equide = $rowData['id_equide'];
                    }
                }
            
                $sql3 = "INSERT INTO `acte` (id_type_acte, id_equide, date, details) VALUES ($id_type_acte, $identifiant_equide, '$date', '$commentaire')";
        
                if (mysqli_query($mysqli, $sql3)) {
                    array_push($info_succes, 'Traitement ajouté');
                } else {
                    array_push($info_error, mysqli_error($mysqli));
                }
            } else {
                array_push($info_error, mysqli_error($mysqli));
            }
        } else {
            array_push($info_error, mysqli_error($mysqli));
        }
        
    }


}

