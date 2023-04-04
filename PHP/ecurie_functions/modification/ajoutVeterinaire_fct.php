<?php

$info_error = array();
$info_succes = array();

$id_detenteur = $_SESSION['id_detenteur'];

// Vérifie si les données ont été soumises
if (isset($_POST["ajouter"])) {
 
    $nom = $_POST['nomVeterinaire'];
    $prenom = $_POST['prenomVeterinaire'];
    $rue = $_POST['rueVeterinaire'];
    $commune = $_POST['communeVeterinaire'];
    $codePostal = $_POST['codePostalVeterinaire'];
    $typeVeterinaire = $_POST['typeVeterinaire'];
    $groupementVeterinaire = $_POST['groupementVeterinaire'];
    $ddaf= $_POST['dateDebutAffectationVeterinaire'];
    $dfaf= $_POST['dateFinAffectationVeterinaire'];

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
    }elseif(empty($typeVeterinaire)){
        array_push($info_error,'Veuillez sélectionner le type de vétérinaire');
    }elseif(empty($ddaf)){
        array_push($info_error,'Veuillez ajouter la date de début d\'affectation');
    }elseif(empty($dfaf)){
        array_push($info_error,'Veuillez ajouter la date de fin d\'affectation');
    }elseif(empty($groupementVeterinaire)){
        array_push($info_error,'Veuillez choisir un groupement de vétérinaire');
    }else{

        $sql1 = "INSERT INTO `veterinaire` (nom,prenom,rue,commune,code_postal,id_groupement_veterinaire) VALUES ('$nom','$prenom','$rue','$commune','$codePostal','$groupementVeterinaire')";

        if (mysqli_query($mysqli, $sql1)) {
            $id_marechal = mysqli_insert_id($mysqli);

            $sqlRegistre ="SELECT `id_registre` FROM `registre_equide` WHERE `id_detenteur` ='$id_detenteur'";
            $resultRegistre = mysqli_query($mysqli, $sqlRegistre);

                if (mysqli_num_rows($resultRegistre) > 0) {      

                    while($rowData = mysqli_fetch_array($resultRegistre)){
                        $id_registre = $rowData['id_registre'];
                    }

                        $sql2 = "INSERT INTO `affectation_veterinaire` (id_veterinaire, id_registre, type_veterinaire, date_debut, date_fin) VALUES ('$id_marechal', '$id_registre','$typeVeterinaire', '$ddaf','$dfaf')";
            
                        if (mysqli_query($mysqli, $sql2)) {
                            
                                array_push($info_succes, 'Vétérinaire ajouté');

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

