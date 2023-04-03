<?php

$info_error = array();
$info_succes = array();

$site_root = $_SERVER['DOCUMENT_ROOT'];
$sire = $_GET['sire'];


// Vérifie si les données ont été soumises
if (isset($_POST["ajouter"])) {
 
    $nom = $_POST['nomVermifuge'];
    $reference = $_POST['referenceVermifuge'];
    $date =$_POST['dateVermifuge'];
    $commentaire = $_POST['commentaireVermifuge'];

    if(empty($nom)){
        array_push($info_error,'Veuillez ajouter le nom du vermifuge');
    }elseif(empty($reference)){
        array_push($info_error,'Veuillez ajouter la référence du vermifuge');
    }elseif(empty($date)){
        array_push($info_error,'Veuillez ajouter la date du vermifuge');
    }elseif(empty($commentaire)){
        array_push($info_error,'Veuillez ajouter un commentaire');
    }else{

        $sql1 = "INSERT INTO `vermifuge` (nom) VALUES ('$reference')";

        if (mysqli_query($mysqli, $sql1)) {
            $id_vermifuge = mysqli_insert_id($mysqli);
        
            $sql2 = "INSERT INTO `type_acte` (nom_acte, acte, id_vermifuge) VALUES ('$nom', 'Veterinaire', $id_vermifuge)";
        
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
                    array_push($info_succes, 'vermifuge ajouté');
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

