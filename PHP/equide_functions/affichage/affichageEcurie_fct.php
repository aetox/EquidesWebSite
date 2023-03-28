<?php 

$info_error = array();
$idLogin = $_SESSION['id_login'];
$typeProfil = $_SESSION['type_profil'];

if(isset($_SESSION['id_detenteur'])){

    $idDetenteur = $_SESSION['id_detenteur'];
    $ecuriesql =
    "SELECT detenteur.nom AS detenteurNom, detenteur.prenom AS detenteurPrenom, detenteur.nombre_equides,
    registre_equide.nom_ecurie, registre_equide.rue AS registreRue, registre_equide.commune AS registreCommune, registre_equide.code_postal AS registreCodePostal, registre_equide.siret,
    affectation_marechal.date_debut AS amdb, affectation_marechal.date_fin AS amdf,
    marechal.nom AS marechalNom, marechal.prenom AS marechalPrenom,
    affectation_veterinaire.type_veterinaire, affectation_veterinaire.date_debut AS avdb, affectation_veterinaire.date_fin AS avdf,
    veterinaire.nom AS veterinaireNom, veterinaire.prenom AS veterinairePrenom
    FROM `registre_equide`
    JOIN `detenteur`
    ON registre_equide.id_detenteur = detenteur.id_detenteur
    JOIN `affectation_marechal`
    ON registre_equide.id_registre = affectation_marechal.id_registre
    JOIN `marechal`
    ON affectation_marechal.id_marechal = marechal.id_marechal
    JOIN `affectation_veterinaire`
    ON registre_equide.id_registre = affectation_veterinaire.id_registre
    JOIN `veterinaire`
    ON affectation_veterinaire.id_veterinaire = veterinaire.id_veterinaire
    JOIN `groupement_veterinaire`
    ON veterinaire.id_groupement_veterinaire = groupement_veterinaire.id_groupement_veterinaire
    WHERE registre_equide.id_detenteur='$idDetenteur'";

    $results = mysqli_query($mysqli,$ecuriesql) or die(mysqli_error($mysqli));
    
    if (mysqli_num_rows($results) > 0) {

        while($rowData = mysqli_fetch_array($results)){
    
            $nomEcurie = $rowData['nom_ecurie'];
            $detenteurNom = $rowData['detenteurNom'];
            $detenteurPrenom = $rowData['detenteurPrenom'];
            $nombreEquides = $rowData['nombre_equides'];
            $registreRue = $rowData['registreRue'];
            $registreCommune = $rowData['registreCommune'];
            $registreCodePostal = $rowData['registreCodePostal'];
            $siret = $rowData['siret'];
            $amdb = $rowData['amdb'];
            $amdb1 = date("d/m/y", strtotime($amdb));
            $amdf = $rowData['amdf'];
            $amdf1 = date("d/m/y", strtotime($amdf));
            $marechalNom = $rowData['marechalNom'];
            $marechalPrenom = $rowData['marechalPrenom'];
            $veterinaireNom = $rowData['veterinaireNom'];
            $veterinairePrenom = $rowData['veterinairePrenom'];
            $type_veterinaire = $rowData['type_veterinaire'];
            $avdb = $rowData['avdb'];
            $avdb1 = date("d/m/y", strtotime($avdb));
            $avdf = $rowData['avdf'];
            $avdf1 = date("d/m/y", strtotime($avdf));?>
             
            <ul class="list-group list-group-flush">
            <li class="list-group-item"><u>Détenteur :</u> <?php echo $detenteurNom;?> <?php echo $detenteurPrenom ?></li>
            <li class="list-group-item"><u>Nombres d'équides dans l'écurie :</u> <?php echo $nombreEquides; ?></li>
            <li class="list-group-item"><u>Adresse de l'écurie :</u> <?php echo $registreRue;?> <?php echo $registreCommune ?> <?php echo $registreCodePostal ?></li>
            <li class="list-group-item"><u>SIRET :</u> <?php echo $siret; ?></li>
            <li class="list-group-item"><u>Vétérinaire sanitaire :</u> <?php echo $veterinaireNom;?> <?php echo $veterinairePrenom ?> du <?php echo $avdb1;?> au <?php echo $avdf1 ?></li>
            <li class="list-group-item"><u>Maréchal :</u> <?php echo $marechalNom;?> du <?php echo $amdb1;?> au <?php echo $amdf1 ?></li>
            </ul>
    <?php
}}  else{
        }

    $sql =
    "SELECT en_pension.date_debut AS epdd, en_pension.date_fin AS epdf,
    equide.sire AS sireEquide, equide.ueln AS uelnEquide, equide.nom AS nomEquide, equide.sexe,
    race.nom_race,
    proprietaire.nom AS nomProprietaire, proprietaire.prenom AS prenomProprietaire
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
    
            $epdd = $rowData['epdd'];
            $epdd1 = date("d/m/y", strtotime($epdd));
            $epdf = $rowData['epdf'];
            $epdf1 = date("d/m/y", strtotime($epdf));
            $sireEquide = $rowData['sireEquide'];
            $uelnEquide = $rowData['uelnEquide'];
            $nomEquide = $rowData['nomEquide'];
            $nom_race = $rowData['nom_race'];
            $nomProprietaire = $rowData['nomProprietaire'];
            $prenomProprietaire = $rowData['prenomProprietaire'];
            // $lienPdp = AffichagePhoto($mysqli,$photo);
    ?>
            <div class="equide_bootstrap card " >
                <img src="../ASSETS/img_bdd/" class="card-img-top" alt="Nom du cheval : <?php echo $nomEquide?>">
                <div class="card-body ">
                    <h5 class="card-title"><strong><?php echo $nomEquide ?></strong></h5>
                        <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><u>Race :</u> <?php echo $nom_race ?></li>
                                    <li class="list-group-item"><u>SIRE :</u> <?php echo $sireEquide ?></li>
                                    <li class="list-group-item"><u>UELN :</u> <?php echo $uelnEquide ?></li>
                                    <li class="list-group-item"><u>Propriétaire :</u> <?php echo $nomProprietaire;?> <?php echo $prenomProprietaire ?></li>
                                    <li class="list-group-item">En pension depuis le <?php echo $epdd1;?> jusqu'au <?php echo $epdf1 ?></li>

                                    <li class="modification list-group-item"><a href="#">PDF - Carnet de Santé</a></li>
                                    <li class="modification list-group-item"><a href="#">PDF - Fiche de Transport</a></li>
                                    <li class="modification list-group-item" id="affichageEquides_info"><a  href="equide_description.php?SIRE=<?php echo $rue;?>">plus d'info</a></li>
                        </ul> 
                </div>
            </div>
    <?php
    }}else{ ?>
        <h3>Vous n'avez pas d'équidés.</h3>
<?php
    }}

elseif(isset($_SESSION['id_proprietaire'])) {

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