<?php

$info_error = array();
$info_succes = array();

$id_detenteur = $_SESSION['id_detenteur'];

// Vérifie si les données ont été soumises
if (isset($_POST["ajouter"])) {
 
    $nom = $_POST['nomMarechal'];
    $prenom = $_POST['prenomMarechal'];
    $rue = $_POST['rueMarechal'];
    $commune = $_POST['communeMarechal'];
    $codePostal = $_POST['codePostalMarechal'];
    $ddaf= $_POST['dateDebutAffectationMarechal'];
    $dfaf= $_POST['dateFinAffectationMarechal'];

    if(empty($nom)){
        array_push($info_error,'Veuillez ajouter le nom du vétérinaire');
    }elseif(empty($prenom)){
        array_push($info_error,'Veuillez ajouter le prenom du vétérinaire');
    }elseif(empty($rue)){
        array_push($info_error,'Veuillez ajouter la rue');
    }elseif(empty($commune)){
        array_push($info_error,'Veuillez ajouter la commune');
    }elseif(empty($codePostal)){
        array_push($info_error,'Veuillez ajouter le code postal');
    }elseif(empty($ddaf)){
        array_push($info_error,'Veuillez ajouter la date de début d\'affectation');
    }elseif(empty($dfaf)){
        array_push($info_error,'Veuillez ajouter la date de fin d\'affectation');
    }else{

        $sql1 = "INSERT INTO `marechal` (nom,prenom,rue,commune,code_postal) VALUES ('$nom','$prenom','$rue','$commune','$codePostal')";

        if (mysqli_query($mysqli, $sql1)) {
            $id_marechal = mysqli_insert_id($mysqli);

            $sqlRegistre ="SELECT `id_registre` FROM `registre_equide` WHERE `id_detenteur` ='$id_detenteur'";
            $resultRegistre = mysqli_query($mysqli, $sqlRegistre);

                if (mysqli_num_rows($resultRegistre) > 0) {      

                    while($rowData = mysqli_fetch_array($resultRegistre)){
                        $id_registre = $rowData['id_registre'];
                    }

                        $sql2 = "INSERT INTO `affectation_marechal` (id_marechal, id_registre, date_debut, date_fin) VALUES ('$id_marechal', '$id_registre', '$ddaf','$dfaf')";
            
                        if (mysqli_query($mysqli, $sql2)) {
                            
                                array_push($info_succes, 'Marechal ajouté');

                        } else {
                            array_push($info_error, mysqli_error($mysqli));
                        }
                }else{
                    array_push($info_error,'Vous n\'avez pas d\'ecurie');

                }

        
        } else {
            array_push($info_error, mysqli_error($mysqli));
        }
        
    }


}

