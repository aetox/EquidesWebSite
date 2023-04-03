<?php

$info_error = array();
$info_succes = array();

$site_root = $_SERVER['DOCUMENT_ROOT'];
$sire = $_GET['sireEquide'];


// Vérifie si les données ont été soumises
if (isset($_POST["ajouter"])) {
 
    $ecurie = $_POST['ecurie'];
    $dateDebut = $_POST['dateDebut'];
    $dateFin =$_POST['dateFin'];

    if(empty($ecurie)){
        array_push($info_error,'Veuillez selectionner une écurie');
    }elseif(empty($dateDebut)){
        array_push($info_error,'Veuillez ajouter la date de début de pension');
    }elseif(empty($dateFin)){
        array_push($info_error,'Veuillez ajouter la date de fin de pension');
    }else{

        $sql1="SELECT id_equide FROM equide WHERE sire ='$sire'";

        if($result = mysqli_query($mysqli,$sql1)){
            while($row = mysqli_fetch_array($result)){
                $id_equide = $row['id_equide'];
            }

            $sql2 = "UPDATE `en_pension`
            SET `id_registre` = '$ecurie', `date_debut` = '$dateDebut', `date_fin` = '$dateFin'
            WHERE `id_equide` = '$id_equide'";
   
                if($result2 = mysqli_query($mysqli,$sql2)){
                    array_push($info_succes,'Equide affecté');
                    }else{
                        array_push($info_error,mysqli_error($mysqli));
                    }
        }else{
            array_push($info_error,mysqli_error($mysqli));
    
        }
     
   
    }


}

