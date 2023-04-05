<?php

$info_error = array();
$info_succes = array();

$id_detenteur = $_SESSION['id_detenteur'];

// Vérifie si les données ont été soumises
if (isset($_POST["ajouter"])) {
 
    $nom = $_POST['nomGroupement'];
    $rue = $_POST['rue'];
    $commune = $_POST['commune'];
    $codePostal = $_POST['code_postal'];
 
    if(empty($nom)){
        array_push($info_error,'Veuillez ajouter le nom du vétérinaire');
    }elseif(empty($rue)){
        array_push($info_error,'Veuillez ajouter la rue');
    }elseif(empty($commune)){
        array_push($info_error,'Veuillez ajouter la commune');
    }elseif(empty($codePostal)){
        array_push($info_error,'Veuillez ajouter le code postal');
    }else{


        $sqlRegistre ="SELECT `id_registre` FROM `registre_equide` WHERE `id_detenteur` ='$id_detenteur'";
        $resultRegistre = mysqli_query($mysqli, $sqlRegistre);

            if (mysqli_num_rows($resultRegistre) > 0) {      

                while($rowData = mysqli_fetch_array($resultRegistre)){
                    $id_registre = $rowData['id_registre'];
                }
            
            $sql1 = "INSERT INTO `groupement_veterinaire` (nom_groupement,id_registre,rue,commune,code_postal) VALUES ('$nom','$id_registre','$rue','$commune','$codePostal')";

                if (mysqli_query($mysqli, $sql1)) {
                    $id_marechal = mysqli_insert_id($mysqli);

                    array_push($info_succes, "Groupement ajouté");

                    }else {
                        array_push($info_error, "Erreur ajout groupement");
                    }
    
            } else {
                array_push($info_error, mysqli_error($mysqli));
            }
        
    }


}

