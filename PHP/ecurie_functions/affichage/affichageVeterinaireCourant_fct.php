<?php      
      $vetocourant =
                "SELECT affectation_veterinaire.type_veterinaire, affectation_veterinaire.date_debut AS avdb, affectation_veterinaire.date_fin AS avdf,
                veterinaire.nom AS veterinaireNom, veterinaire.prenom AS veterinairePrenom, veterinaire.id_veterinaire AS id_veterinaire
                FROM `registre_equide`
                JOIN `affectation_veterinaire`
                ON registre_equide.id_registre = affectation_veterinaire.id_registre
                JOIN `veterinaire`
                ON affectation_veterinaire.id_veterinaire = veterinaire.id_veterinaire
                JOIN `groupement_veterinaire`
                ON veterinaire.id_groupement_veterinaire = groupement_veterinaire.id_groupement_veterinaire
                WHERE registre_equide.id_detenteur='$idDetenteur' AND type_veterinaire='Courant'
                ORDER BY registre_equide.id_registre ASC";
                $resultVetoCourant = mysqli_query($mysqli,$vetocourant) or die(mysqli_error($mysqli));
    
                if (mysqli_num_rows($resultVetoCourant) > 0) {
                    
                    while($rowDatas = mysqli_fetch_array($resultVetoCourant)){
                    
                    $idVeterinaire =$rowDatas['id_veterinaire'];
                    $veterinaireNom = $rowDatas['veterinaireNom'];
                    $veterinairePrenom = $rowDatas['veterinairePrenom'];
                    $type_veterinaire = $rowDatas['type_veterinaire'];
                    $avdb = $rowDatas['avdb'];
                    $avdb1 = date("d/m/y", strtotime($avdb));
                    $avdf = $rowDatas['avdf'];
                    $avdf1 = date("d/m/y", strtotime($avdf));
                ?>
                <li class="list-group-item"><?php echo $veterinaireNom;?> <?php echo $veterinairePrenom; ?> du <?php echo $avdb1;?> au <?php echo $avdf1; ?> | <a href="PHP/ecurie_functions/suppression/suppressionVeterinaire_fct.php?idVeterinaire=<?=$idVeterinaire?>">Supprimer</a></li>
                
  <?php }
  }else { ?>
        <h4> Vous n'avez pas de vétérinaires courants</h4>
 <?php } ?>