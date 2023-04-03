<?php

$info_error = array();
$info_succes = array();
$idDetenteur = $_SESSION['id_detenteur'];

// Vérifie si les données ont été soumises
if (isset($_POST["ajouter"])) {
 
    $id_equide = $_POST['equideEnVoyage'];
    $dateDepart = $_POST['dateDepart'];
    $dateArrivee = $_POST['dateArrivee'];
    $motifDeplacement = $_POST['motifDeplacement'];
    $lieuDepart = $_POST['lieuDepart'];
    $lieuArrivee = $_POST['lieuArrivee'];


    if(empty($id_equide)){
            array_push($info_error,'Veuillez selectionner un équide');
    }elseif(empty($dateDepart)){
            array_push($info_error,'Veuillez ajouter la date de départ');
    }elseif(empty($dateArrivee)){
            array_push($info_error,"Veuillez ajouter la date d'arrivée");
    }elseif(empty($motifDeplacement)){
            array_push($info_error,'Veuillez ajouter un motif de déplacement');
    }elseif(empty($lieuDepart)){
            array_push($info_error,'Veuillez ajouter un lieu de départ');
    }elseif(empty($lieuArrivee)){
            array_push($info_error,"Veuillez ajouter un lieu d'arrivee");
    }else{

        $sql =
        "SELECT registre_equide.id_registre 
        FROM `registre_equide`
        JOIN `en_pension`
        ON registre_equide.id_registre = en_pension.id_registre
        JOIN `equide`
        ON equide.id_equide = en_pension.id_equide
        JOIN `race`
        ON equide.id_race = race.id_race
        JOIN `proprietaire`
        ON equide.id_proprietaire = proprietaire.id_proprietaire
        WHERE id_detenteur='$idDetenteur'";

        $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

        if (mysqli_num_rows($result) > 0) {      

            while($rowData = mysqli_fetch_array($result)){
                $idRegistre = $rowData['id_registre'];
            }

            $sql2 = "INSERT INTO `fiche_transport`
            (`id_registre`, `id_equide`, `date_depart`, `date_arrivee`, `lieu_depart`, `lieu_arrivee`, `motif_deplacement`)
            VALUES ('$idRegistre', '$id_equide', '$dateDepart', '$dateArrivee', '$lieuDepart', '$lieuArrivee', '$motifDeplacement')";
   
            
            if (mysqli_query($mysqli, $sql2)) {

                array_push($info_succes, "Transport Ajouté");

            }else{
                array_push($info_error, mysqli_error($mysqli));
            }



    }else{
        array_push($info_error,"Erreur id_registre");
    }


    }
}

