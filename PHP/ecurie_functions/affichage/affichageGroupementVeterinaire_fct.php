<?php 
$id_detenteur = $_SESSION['id_detenteur'];


$sqlRegistre ="SELECT `id_registre` FROM `registre_equide` WHERE `id_detenteur` ='$id_detenteur'";
$resultRegistre = mysqli_query($mysqli, $sqlRegistre);

    if (mysqli_num_rows($resultRegistre) > 0) {      

        while($rowData = mysqli_fetch_array($resultRegistre)){
            $id_registre = $rowData['id_registre'];
        }
    }


$sql = "SELECT * FROM `groupement_veterinaire` WHERE `id_registre`='$id_registre'";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


if (mysqli_num_rows($result) > 0) {      

    while($groupement = mysqli_fetch_array($result)){
        
        $id_groupement = $groupement['id_groupement_veterinaire'];
        ?>

            <div class="equide_bootstrap card">
                <div class="card-body">
                    <h5 class="card-title"><strong><?php echo $groupement['nom_groupement'] ?></strong></h5>
                        <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Nom : <?php echo $groupement['nom_groupement'] ?></li>
                                    <li class="list-group-item">Addresse : <?php echo $groupement['rue'].' '.$groupement['commune'].' '.$groupement['code_postal'] ?></li>
                                    <li class="list-group-item"><strong>Vétérinaire courant :</strong> 
                                    <?php 
                                                    $vetoCourant =
                                                    "SELECT affectation_veterinaire.type_veterinaire, affectation_veterinaire.date_debut AS avdb, affectation_veterinaire.date_fin AS avdf,
                                                    veterinaire.nom AS veterinaireNom, veterinaire.prenom AS veterinairePrenom, veterinaire.id_veterinaire AS id_veterinaire
                                                    
                                                    FROM `groupement_veterinaire`
                                                    JOIN `veterinaire`
                                                    ON groupement_veterinaire.id_groupement_veterinaire = veterinaire.id_groupement_veterinaire
                                                    JOIN `affectation_veterinaire`
                                                    ON veterinaire.id_veterinaire = affectation_veterinaire.id_veterinaire
                                            
                                                    WHERE groupement_veterinaire.id_groupement_veterinaire='$id_groupement'AND type_veterinaire='Courant'";
                                                    $resultVetoCourant = mysqli_query($mysqli,$vetoCourant) or die(mysqli_error($mysqli));
                                        
                                                    if (mysqli_num_rows($resultVetoCourant) > 0) {
                                                        
                                                        while($rowDatass = mysqli_fetch_array($resultVetoCourant)){
                                                    
                                                        $idVeterinaireC =$rowDatass['id_veterinaire'];
                                                        $veterinaireNomC = $rowDatass['veterinaireNom'];
                                                        $veterinairePrenomC = $rowDatass['veterinairePrenom'];
                                                        $type_veterinaireC = $rowDatass['type_veterinaire'];
                                                        $avdbC = $rowDatass['avdb'];
                                                        $avdb1C = date("d/m/y", strtotime($avdbC));
                                                        $avdfC = $rowDatass['avdf'];
                                                        $avdf1C = date("d/m/y", strtotime($avdfC));?>
                                            
                                                                <li class="list-group-item"> - <?php echo $veterinaireNomC;?> <?php echo $veterinairePrenomC; ?> du <?php echo $avdb1C;?> au <?php echo $avdf1C;?> | <a href="PHP/ecurie_functions/suppression/suppressionVeterinaire_fct.php?idVeterinaire=<?=$idVeterinaireC?>">Supprimer</a></li>
                                            
                                              <?php }
                                              } else { ?>
                                                <h4> Vous n'avez pas de vétérinaires sanitaire</h4>
                                       <?php } ?>

                                    </li>
                                    <li class="list-group-item"><strong>Vétérinaire Sanitaire :</strong> 
                                        <?php 
                                                    $vetoSanitaire =
                                                    "SELECT affectation_veterinaire.type_veterinaire, affectation_veterinaire.date_debut AS avdb, affectation_veterinaire.date_fin AS avdf,
                                                    veterinaire.nom AS veterinaireNom, veterinaire.prenom AS veterinairePrenom, veterinaire.id_veterinaire AS id_veterinaire
                                                    
                                                    FROM `groupement_veterinaire`
                                                    JOIN `veterinaire`
                                                    ON groupement_veterinaire.id_groupement_veterinaire = veterinaire.id_groupement_veterinaire
                                                    JOIN `affectation_veterinaire`
                                                    ON veterinaire.id_veterinaire = affectation_veterinaire.id_veterinaire
                                            
                                                    WHERE groupement_veterinaire.id_groupement_veterinaire='$id_groupement' AND type_veterinaire='Sanitaire'";
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
                                            
                                                                <li class="list-group-item"> - <?php echo $veterinaireNom;?> <?php echo $veterinairePrenom; ?> du <?php echo $avdb1;?> au <?php echo $avdf1;?> | <a href="PHP/ecurie_functions/suppression/suppressionVeterinaire_fct.php?idVeterinaire=<?=$idVeterinaire?>">Supprimer</a></li>
                                            
                                              <?php }
                                              } else { ?>
                                                <h4> Vous n'avez pas de vétérinaires sanitaire</h4>
                                       <?php } ?>

                                    </li>
                                    <li class="modification list-group-item" id="affichageEquides_info"><a  href="update_GroupementVeterinaire.php?idGroupement=<?=$id_groupement?>">Mettre à jour</a></li>
                                    <li class="modification list-group-item" id="affichageEquides_info"><a  href="PHP/ecurie_functions/suppression/suppressionGroupementVeterinaire_fct.php?idGroupement=<?=$id_groupement?>">Supprimer</a></li>
                        </ul> 
                </div>
            </div>

<?php } 
    }else{?>
        <option value="0">Aucun groupement</option>
    <?php }
?>