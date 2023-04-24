<?php 


$info_error = array();
$info_succes = array();


$sql =
"SELECT ascendance.nom AS nom, ascendance.couleur AS couleur, ascendance.sire AS sire, ascendance.id_race AS id_race, equide.sire AS sire, ascendance.id_ascendance AS id_parent,
equide.sire AS sireEnfant   
FROM `equide`
JOIN `ascendance`
ON ascendance.id_equide = equide.id_equide 

WHERE equide.id_equide ='$idEquide' AND ascendance.type_ascendance ='Mere'";

$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($result) > 0) {      

    while($rowData = mysqli_fetch_array($result)){

        $sireEnfant =$rowData['sireEnfant'];
        $idMere =$rowData['id_parent'];
        $nomMere = $rowData['nom'];
        $sireMere = $rowData['sire'];
        $couleurMere = $rowData['couleur'];
        $idRaceMere =$rowData['id_race'];
        $sireParent =$rowData['sire'];


        $sql2="SELECT nom_race FROM race WHERE id_race ='$idRaceMere'";

        $result2 = mysqli_query($mysqli,$sql2) or die(mysqli_error($mysqli));

            if (mysqli_num_rows($result2) > 0) {      

                while($rowDatas = mysqli_fetch_array($result2)){

                    $nomRace = $rowDatas['nom_race'];
                }
            }else{
                echo('Pas de race pour le père');
            }

            ?>


        <li class="list-group-item">Nom : <?=$nomMere?></li>
        <li class="list-group-item">Sire : <?=$sireMere?></li>
        <li class="list-group-item">Race : <?=$nomRace?></li>
        <li class="list-group-item">Couleur : <?=$couleurMere?></li>
        <li class="list-group-item"><a href="updateParent.php?idParent=<?=$idMere?>&amp;sireEquide=<?=$sireEnfant?>">Modifier</a></li>
        <li class="list-group-item"><a href="PHP/equide_functions/suppression/suppressionParent_fct.php?idParent=<?=$idMere?>&amp;sire=<?=$sireEnfant?>">Supprimer</a></li>
      
      <?  }
    }else {?>
    
        <li class="list-group-item">Pas de mère enregistré</li>
        <li class="list-group-item"><a href="ajout_parent.php?sireEquide=<?=$sireEquide?>">Ajouter</a></li>


   <?php } ?>