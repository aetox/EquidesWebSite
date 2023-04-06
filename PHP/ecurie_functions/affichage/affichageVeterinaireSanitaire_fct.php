<?php
                $vetoSanitaire =
                "SELECT affectation_veterinaire.type_veterinaire, affectation_veterinaire.date_debut AS avdb, affectation_veterinaire.date_fin AS avdf,
                veterinaire.nom AS veterinaireNom, veterinaire.prenom AS veterinairePrenom, veterinaire.id_veterinaire AS id_veterinaire
                FROM `registre_equide`
                JOIN `affectation_veterinaire`
                ON registre_equide.id_registre = affectation_veterinaire.id_registre
                JOIN `veterinaire`
                ON affectation_veterinaire.id_veterinaire = veterinaire.id_veterinaire
                JOIN `groupement_veterinaire`
                ON veterinaire.id_groupement_veterinaire = groupement_veterinaire.id_groupement_veterinaire
                WHERE registre_equide.id_detenteur='$idDetenteur' AND type_veterinaire='Sanitaire'
                ORDER BY registre_equide.id_registre ASC";
                $resultVetoSanitaire = mysqli_query($mysqli,$vetoSanitaire) or die(mysqli_error($mysqli));
    
                if (mysqli_num_rows($resultVetoSanitaire) > 0) {
                    
                    while($rowDatass = mysqli_fetch_array($resultVetoSanitaire)){
                
                    $idVeterinaire =$rowDatass['id_veterinaire'];
                    $veterinaireNom = $rowDatass['veterinaireNom'];
                    $veterinairePrenom = $rowDatass['veterinairePrenom'];
                    $type_veterinaire = $rowDatass['type_veterinaire'];
                    $avdb = $rowDatass['avdb'];
                    $avdb1 = date("d/m/y", strtotime($avdb));
                    $avdf = $rowDatass['avdf'];
                    $avdf1 = date("d/m/y", strtotime($avdf));?>

                    <li class="list-group-item"><?php echo $veterinaireNom;?> <?php echo $veterinairePrenom; ?> du <?php echo $avdb1;?> au <?php echo $avdf1;?>
                     | <a href="PHP/ecurie_functions/suppression/suppressionVeterinaire_fct.php?idVeterinaire=<?=$idVeterinaire?>">Supprimer</a>
                     | <a href="carte_veterinaire.php?idVeterinaire=<?=$idVeterinaire?>">Plus d'info</a>
                </li>

  <?php }
  }else { ?>
        <h4> Vous n'avez pas de vétérinaires sanitaire</h4>
 <?php } ?>