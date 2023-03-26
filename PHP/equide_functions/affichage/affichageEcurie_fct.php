<?php 

$info_error = array();
$idLogin = $_SESSION['id_login'];
$typeProfil = $_SESSION['type_profil'];

if(isset($_SESSION['id_detenteur'])){

    $idDetenteur = $_SESSION['id_detenteur'];
    $ecuriesql =
    "SELECT detenteur.nom AS detenteurNom, detenteur.prenom AS detenteurPrenom, detenteur.nombre_equides,
    registre_equide.nom_ecurie, registre_equide.rue, registre_equide.commune, registre_equide.departement, registre_equide.code_postal, registre_equide.siret,
    affectation_marechal.date_debut AS amdb, affectation_marechal.date_fin AS amdf,
    marechal.nom AS marechalNom, marechal.prenom AS marechalPrenom, marechal.rue AS marechalRue, marechal.commune AS marechalCommune, marechal.code_postal AS marechalCodePostal
    affectation_veterinaire.type_veterinaire, affectation_veterinaire.date_debut AS avdb, affectation_veterinaire.date_fin AS avdf,
    groupement_veterinaire.nom_groupement, groupement_veterinaire.rue
    veterinaire.nom AS veterinaireNom, 
    FROM `registre_equide`
    JOIN `detenteur`
    ON registre_equide.id_detenteur = detenteur.id_detenteur
    JOIN `affectation_marechal`
    ON registre_equide.id_registre = affectation_marechal.id_registre
    JOIN `marechal`
    ON affectation_marechal.id_marechal = marechal.id_marechal
    JOIN `affectation_veterinaire`
    ON registre_equide.id_registre = affectation_veterinaire.id_registre
    JOIN `groupement_veterinaire`
    ON affectation_veterinaire.id_groupement_veterinaire = groupement_veterinaire.id_groupement_veterinaire
    JOIN `veterinaire`
    ON groupement_veterinaire.id_groupement_veterinaire = veterinaire.id_groupement_veterinaire
    WHERE registre_equide.id_detenteur='$idDetenteur'";
    $results = mysqli_query($mysqli,$ecuriesql) or die(mysqli_error($mysqli));
    
    if (mysqli_num_rows($results) > 0) {

        while($rowData = mysqli_fetch_array($results)){
    
            $nomEcurie = $rowData['nom_ecurie'];
            $detenteurNom = $rowData['detenteurNom'];
            $detenteurPrenom = $rowData['detenteurPrenom'];
            $nombreEquides = $rowData['nombre_equides'];
            $departement = $rowData['id_registre'];
            $codePostal = $rowData['id_registre'];
            $siret = $rowData['id_registre'];
            $marechalAffecte = $rowData['id_registre'];
            $veterinaireAffecte = $rowData['id_registre']; ?>
             
            <ul class="list-group list-group-flush">
            <li class="list-group-item"><u>Nom de l'écurie :</u> <?php echo $nomEcurie; ?></li>
            <li class="list-group-item"><u>Détenteur :</u> <?php echo $detenteurNom;?> <?php echo $detenteurPrenom ?></li>
            <li class="list-group-item"><u>Nombres d'équides dans l'écurie :</u> <?php echo $nombreEquides; ?></li>
            <li class="list-group-item"><u>UELN :</u> <?php echo $commune; ?></li>
            <li class="list-group-item"><u>UELN :</u> <?php echo $commune; ?></li>
            <li class="list-group-item"><u>UELN :</u> <?php echo $commune; ?></li>
            <li class="list-group-item"><u>UELN :</u> <?php echo $departement; }?></li>
        
    <?php
    }else{?>
            <li class="list-group-item">Vous n'avez pas d'équidés</li>
            </ul>
    <?php }?>

    <?php
    $sql = "SELECT *
    FROM `registre_equide`
    JOIN `en_pension` ON registre_equide.id_registre = en_pension.id_registre
    JOIN `equide` ON equide.id_equide = en_pension.id_equide
    WHERE id_detenteur='$idDetenteur'";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($result) > 0) {      

        while($rowData = mysqli_fetch_array($result)){
    
            $idRegistre = $rowData['id_registre'];
            $idEquide = $rowData['id_equide'];
            // $lienPdp = AffichagePhoto($mysqli,$photo);
          
        ?>
                <div class="equide_bootstrap card " >
                    <img src="../ASSETS/img_bdd/" class="card-img-top" alt="Ecurie n°<?php echo $idRegistre?>">
                    <div class="card-body ">
                        <h5 class="card-title"><strong><?php echo $idEquide ?></strong></h5>
                            <ul class="list-group list-group-flush">
                                <?php
                                    $sql2 = "SELECT * FROM `registre_equide` JOIN `en_pension` ON registre_equide.id_registre = en_pension.id_registre JOIN `equide` ON equide.id_equide = en_pension.id_equide WHERE id_detenteur='$idDetenteur'";
                                    $result2 = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
                                    if (mysqli_num_rows($result2) > 0) { ?>
                                        <li class="list-group-item">Sire : <?php echo $rue ?></li>
                                        <li class="list-group-item">UELN : <?php echo $rue ?></li>
                                        <li class="modification list-group-item"><a href="#">PDF - Carnet de Santé</a></li>
                                        <li class="modification list-group-item"><a href="#">PDF - Fiche de Transport</a></li>
                                        <li class="modification list-group-item" id="affichageEquides_info"><a  href="equide_description.php?SIRE=<?php echo $rue;?>">plus d'info</a></li>
                                <?php
                                    }else{?>
                                        <li class="list-group-item">Vous n'avez pas d'équidés</li>
                                    <?php }?>
                                </ul> 
                    </div>
                </div>
    <?php }}

elseif(isset($_SESSION['id_proprietaire'])) {

    $idProprietaire = $_SESSION['id_proprietaire'];
    $sql = "SELECT * FROM `registre_equide` WHERE proprietaire='$id_login'";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    
    if (mysqli_num_rows($result) > 0) {      

        while($equides = mysqli_fetch_array($result)){
    
            $numSIRE = $equides['numSIRE'];
            $lienPdp = AffichagePhoto($mysqli,$numSIRE);
          
            ?>
            <div class="equide_bootstrap card " >
                <img src="../ASSETS/img_bdd/" class="card-img-top" alt="Ecurie n°<?php echo $idRegistre?>">
                <div class="card-body ">
                    <h5 class="card-title"><strong><?php echo $idEquide ?></strong></h5>
                        <ul class="list-group list-group-flush">
                            <?php
                                $sql2 = "SELECT * FROM `registre_equide` JOIN `en_pension` ON registre_equide.id_registre = en_pension.id_registre JOIN `equide` ON equide.id_equide = en_pension.id_equide WHERE id_detenteur='$idDetenteur'";
                                $result2 = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
                                if (mysqli_num_rows($result2) > 0) {
                        
                                }else{?>
                                    <li class="list-group-item">Vous n'avez pas d'équidés</li>
                                <?php }?>
                            <li class="list-group-item">Sire : <?php echo $rowData['SIRE'] ?></li>
                            <li class="list-group-item">UELN : <?php echo $rowData['UELN'] ?></li>
                            <li class="modification list-group-item"><a href="#">PDF - Carnet de Santé</a></li>
                            <li class="modification list-group-item" id="affichageEquides_info"><a  href="equide_description.php?SIRE=<?php echo $rowData['SIRE'];?>">plus d'info</a></li>
                        </ul> 
                </div>
            </div>
<?php }

}}else {?>
        <h3><?=("Vous n'avez pas d'écurie");}}?></h3>