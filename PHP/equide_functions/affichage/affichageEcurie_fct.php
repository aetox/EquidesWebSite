<?php 

$info_error = array();

if(isset($_SESSION['id_detenteur'])){

    $idDetenteur = $_SESSION['id_detenteur'];
    // $idEcurie = "SELECT id_registre FROM `registre_equide` WHERE id_detenteur='$idDetenteur'"
    // $resultEcurie = mysqli_query($mysqli,$idEcurie) or die(mysqli_error($mysqli));
    $ecuriesql =
    "SELECT detenteur.nom AS detenteurNom, detenteur.prenom AS detenteurPrenom,
    registre_equide.id_registre AS idRegistre, registre_equide.nom_ecurie, registre_equide.rue AS registreRue,
    registre_equide.commune AS registreCommune, registre_equide.code_postal AS registreCodePostal, registre_equide.siret
    FROM `registre_equide`
    JOIN `detenteur`
    ON registre_equide.id_detenteur = detenteur.id_detenteur
    WHERE registre_equide.id_detenteur='$idDetenteur'
    ORDER BY registre_equide.id_registre ASC";

    $results = mysqli_query($mysqli,$ecuriesql) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($results) > 0) {

        while($rowData = mysqli_fetch_array($results)){
    
            $nomEcurie = $rowData['nom_ecurie'];
            $detenteurNom = $rowData['detenteurNom'];
            $detenteurPrenom = $rowData['detenteurPrenom'];
            $registreRue = $rowData['registreRue'];
            $registreCommune = $rowData['registreCommune'];
            $registreCodePostal = $rowData['registreCodePostal'];
            $siret = $rowData['siret'];?>
            
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><u>Nom de l'écurie :</u> <?php echo $nomEcurie; ?></li>
                <li class="list-group-item"><u>Détenteur :</u> <?php echo $detenteurNom;?> <?php echo $detenteurPrenom; ?></li>
                <li class="list-group-item"><u>Adresse de l'écurie :</u> <?php echo $registreRue;?> <?php echo $registreCommune; ?> <?php echo $registreCodePostal; ?></li>
                <li class="list-group-item"><u>SIRET :</u> <?php echo $siret; ?></li>
                <?php
                $vetocourant =
                "SELECT affectation_veterinaire.type_veterinaire, affectation_veterinaire.date_debut AS avdb, affectation_veterinaire.date_fin AS avdf,
                veterinaire.nom AS veterinaireNom, veterinaire.prenom AS veterinairePrenom
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
                
                    $veterinaireNom = $rowDatas['veterinaireNom'];
                    $veterinairePrenom = $rowDatas['veterinairePrenom'];
                    $type_veterinaire = $rowDatas['type_veterinaire'];
                    $avdb = $rowDatas['avdb'];
                    $avdb1 = date("d/m/y", strtotime($avdb));
                    $avdf = $rowDatas['avdf'];
                    $avdf1 = date("d/m/y", strtotime($avdf));
                ?>
                <li class="list-group-item"><u>Vétérinaire sanitaire :</u> <?php echo $veterinaireNom;?> <?php echo $veterinairePrenom; ?> du <?php echo $avdb1;?> au <?php echo $avdf1; ?></li>
                <?php }}
                $vetoSanitaire =
                "SELECT affectation_veterinaire.type_veterinaire, affectation_veterinaire.date_debut AS avdb, affectation_veterinaire.date_fin AS avdf,
                veterinaire.nom AS veterinaireNom, veterinaire.prenom AS veterinairePrenom
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
                
                    $veterinaireNom = $rowDatass['veterinaireNom'];
                    $veterinairePrenom = $rowDatass['veterinairePrenom'];
                    $type_veterinaire = $rowDatass['type_veterinaire'];
                    $avdb = $rowDatass['avdb'];
                    $avdb1 = date("d/m/y", strtotime($avdb));
                    $avdf = $rowDatass['avdf'];
                    $avdf1 = date("d/m/y", strtotime($avdf));?>

                <li class="list-group-item"><u>Vétérinaire courant :</u> <?php echo $veterinaireNom;?> <?php echo $veterinairePrenom; ?> du <?php echo $avdb1;?> au <?php echo $avdf1;}} ?></li>
                
                <?php
                $requete2 =
                "SELECT affectation_marechal.date_debut AS amdb, affectation_marechal.date_fin AS amdf,
                marechal.nom AS marechalNom, marechal.prenom AS marechalPrenom
                FROM `registre_equide`
                JOIN `affectation_marechal`
                ON registre_equide.id_registre = affectation_marechal.id_registre
                JOIN `marechal`
                ON affectation_marechal.id_marechal = marechal.id_marechal
                WHERE registre_equide.id_detenteur='$idDetenteur'
                ORDER BY registre_equide.id_registre ASC";
                $result2 = mysqli_query($mysqli,$requete2) or die(mysqli_error($mysqli));
    
                if (mysqli_num_rows($result2) > 0) {
                    
                    while($rowDatasss = mysqli_fetch_array($result2)){
                
                    $amdb = $rowDatasss['amdb'];
                    $amdb1 = date("d/m/y", strtotime($amdb));
                    $amdf = $rowDatasss['amdf'];
                    $amdf1 = date("d/m/y", strtotime($amdf));
                    $marechalNom = $rowDatasss['marechalNom'];
                    $marechalPrenom = $rowDatasss['marechalPrenom'];?>

                <li class="list-group-item"><u>Maréchal :</u> <?php echo $marechalNom;?> <?php echo $marechalPrenom;?> du <?php echo $amdb1;?> au <?php echo $amdf1; }}?></li>
                <li class="modification list-group-item" id="affichageEquides_info"><a href="ecurie_description.php?idRegistre=<?php echo $rowData['idRegistre'];?>">plus d'info</a></li>
    <?php
} ?>
            </ul>
<?php
}}elseif(isset($_SESSION['id_proprietaire'])) {

    $idProprietaire = $_SESSION['id_proprietaire'];
    $sqlproprio =
    "SELECT *
    FROM `registre_equide`
    WHERE proprietaire='$id_login'";

    $resultproprio = mysqli_query($mysqli,$sqlproprio) or die(mysqli_error($mysqli));
    
    if (mysqli_num_rows($resultproprio) > 0) {      

        while($equides = mysqli_fetch_array($resultproprio)){
    
        $numSIRE = $equides['numSIRE'];
        $lienPdp = AffichagePhoto($mysqli,$numSIRE);?>
            
        <div class="equide_bootstrap card " >
            <img src="../ASSETS/img_bdd/" class="card-img-top" alt="Ecurie n°<?php echo $idRegistre?>">
                <div class="card-body ">
                <h5 class="card-title"><strong><?php echo $idEquide ?></strong></h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Sire : <?php echo $rowData['SIRE'] ?></li>
                        <li class="list-group-item">UELN : <?php echo $rowData['UELN'] ?></li>
                        <li class="modification list-group-item"><a href="#">PDF - Carnet de Santé</a></li>
                        <li class="modification list-group-item" id="affichageEquides_info"><a  href="equide_description.php?SIRE=<?php echo $rowData['SIRE'];?>">plus d'info</a></li>
                    </ul> 
                </div>
        </div>
<?php
}}}