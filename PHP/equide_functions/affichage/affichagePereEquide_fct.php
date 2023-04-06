<?php 


$info_error = array();
$info_succes = array();


$sql =
"SELECT ascendance.nom AS nom, ascendance.couleur AS couleur, ascendance.sire AS sire, ascendance.id_race AS id_race, ascendance.id_ascendance AS id_parent,
equide.sire AS sireEnfant
FROM `equide`
JOIN `ascendance`
ON ascendance.id_equide = equide.id_equide 

WHERE equide.id_equide ='$idEquide' AND ascendance.type_ascendance ='Pere'";

$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($result) > 0) {      

    while($rowData = mysqli_fetch_array($result)){

        $sireEnfant =$rowData['sireEnfant'];
        $idPere =$rowData['id_parent'];
        $nomPere = $rowData['nom'];
        $sirePere = $rowData['sire'];
        $couleurPere = $rowData['couleur'];
        $idRacePere =$rowData['id_race'];


        $sql2="SELECT nom_race FROM race WHERE id_race ='$idRacePere'";

        $result2 = mysqli_query($mysqli,$sql2) or die(mysqli_error($mysqli));

            if (mysqli_num_rows($result2) > 0) {      

                while($rowDatas = mysqli_fetch_array($result2)){

                    $nomRace = $rowDatas['nom_race'];
                }
            }else{
                echo('Pas de race pour le père');
            }

            ?>


        <li class="list-group-item">Nom : <?=$nomPere?></li>
        <li class="list-group-item">Sire : <?=$sirePere?></li>
        <li class="list-group-item">Race : <?=$nomRace?></li>
        <li class="list-group-item">Couleur : <?=$couleurPere?></li>
        <li class="list-group-item"><a href="updateParent.php?idParent=<?=$idPere?>&amp;sireEquide=<?=$sireEnfant?>">Modifier</a></li>
        <li class="list-group-item"><a href="PHP/equide_functions/suppression/suppressionParent_fct.php?IdParent=<?=$idPere?>&amp;sire=<?=$sireEnfant?>">Supprimer</a></li>


        
      
      <?  }
    }else {?>
    
        <li class="list-group-item">Pas de père enregistré</li>
        <li class="list-group-item"><a href="ajout_parent.php?sireEquide=<?=$idEquide?>">Ajouter</a></li>

   <?php } ?>