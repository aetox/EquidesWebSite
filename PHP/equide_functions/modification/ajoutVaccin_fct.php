<?php

$info_error = array();
$info_succes = array();

$site_root = $_SERVER['DOCUMENT_ROOT'];
$sire = $_GET['sire'];


// Vérifie si les données ont été soumises
if (isset($_POST["ajouter"])) {
 
    $nom = $_POST['nomVaccin'];
    $reference = $_POST['numLot'];
    $maladie = $_POST['maladieConcernee'];
    $date =$_POST['dateVaccin'];
    $lieu = $_POST['lieuVaccin'];
    $commentaire = $_POST['commentaireVaccin'];

    if(empty($nom)){
        array_push($info_error,'Veuillez ajouter le nom du vaccin');
    }elseif(empty($reference)){
        array_push($info_error,'Veuillez ajouter la référence du vaccin');
    }elseif(empty($maladie)){
        array_push($info_error,'Veuillez ajouter la maladie du vaccin');
    }elseif(empty($date)){
        array_push($info_error,'Veuillez ajouter la date du vaccin ');
    }elseif(empty($lieu)){
        array_push($info_error,'Veuillez ajouter le lieu de vaccination');
    }elseif(empty($commentaire)){
        array_push($info_error,'Veuillez ajouter un commentaire');
    }else{

        $sql1 = "INSERT INTO `vaccin` (lieu,nom,maladie) VALUES ('$lieu','$reference','$maladie')";

        if (mysqli_query($mysqli, $sql1)) {
            $id_vaccin = mysqli_insert_id($mysqli);
        
            $sql2 = "INSERT INTO `type_acte` (nom_acte, acte, id_vaccin) VALUES ('$nom', 'Veterinaire', $id_vaccin)";
        
            if (mysqli_query($mysqli, $sql2)) {
                $id_type_acte = mysqli_insert_id($mysqli);

                $sqlregistre ="SELECT registre_equide.id_registre AS identifiant_registre
                FROM `equide`
                JOIN `en_pension`
                ON equide.id_equide = en_pension.id_equide
                JOIN `registre_equide`
                ON registre_equide.id_registre = en_pension.id_registre
                
                WHERE sire='$sire'";

                $result = mysqli_query($mysqli,$sqlregistre) or die(mysqli_error($mysqli));

                if (mysqli_num_rows($result) > 0) {      

                    while($rowData = mysqli_fetch_array($result)){
                        $id_registre = $rowData['identifiant_registre'];
                    }
                }
            
                $sql3 = "INSERT INTO `acte` (id_type_acte, id_registre, date, details) VALUES ($id_type_acte, $id_registre, '$date', '$commentaire')";
        
                if (mysqli_query($mysqli, $sql3)) {
                    array_push($info_succes, 'vaccin ajouté');
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

