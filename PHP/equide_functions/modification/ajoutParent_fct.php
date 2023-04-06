<?php

$info_error = array();
$info_succes = array();


// Vérifie si les données ont été soumises
if (isset($_POST["ajouter"])) {
 
    $nomParent = $_POST['nomParent'];
    $sireParent = $_POST['sireParent'];
    $couleurParent =$_POST['couleurParent'];
    $typeParent = $_POST['typeParent'];
    $race_equide = $_POST['race_equide'];

    if(empty($nomParent)){
        array_push($info_error,'Veuillez ajouter le nom du parent');
    }elseif(empty($sireParent)){
        array_push($info_error,'Veuillez ajouter le sire du parent');
    }elseif(empty($couleurParent)){
        array_push($info_error,'Veuillez ajouter la couleur du parent');
    }elseif(empty($race_equide)){
        array_push($info_error,'Veuillez selectionner la race du parent');
    }elseif(empty($typeParent)){
        array_push($info_error,'Veuillez selectionner le type de parent');
    }else{

        $sql ="SELECT id_equide FROM `equide` WHERE sire ='$idSire'";
       
        $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

        if (mysqli_num_rows($result) > 0) {      

            while($rowData = mysqli_fetch_array($result)){
                $idEquide = $rowData['id_equide'];
            }

            $sql1=
            "INSERT INTO `ascendance` (`id_equide`,`id_race`,`type_ascendance`,`nom`,`sire`,`couleur`)
            VALUES ('$idEquide','$race_equide','$typeParent','$nomParent','$sireParent','$couleurParent')";

            if (mysqli_query($mysqli, $sql1)) {
                array_push($info_succes, 'Parent ajouté');
            } else {
                array_push($info_error, mysqli_error($mysqli));
            }

        
        }
    }

}

