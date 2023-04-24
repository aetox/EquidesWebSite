<?php 

$info_error = array();

if(isset($_SESSION['id_detenteur'])){

    $idDetenteur = $_SESSION['id_detenteur'];
    // $idEcurie = "SELECT id_registre FROM `registre_equide` WHERE id_detenteur='$idDetenteur'"
    // $resultEcurie = mysqli_query($mysqli,$idEcurie) or die(mysqli_error($mysqli));
    $ecuriesql =
    "SELECT detenteur.nom AS detenteurNom, detenteur.prenom AS detenteurPrenom,
    registre_equide.id_registre AS idRegistre, registre_equide.nom_ecurie AS nomEcurie, registre_equide.rue AS registreRue,
    registre_equide.commune AS registreCommune, registre_equide.code_postal AS registreCodePostal, registre_equide.siret
    FROM `registre_equide`
    JOIN `detenteur`
    ON registre_equide.id_detenteur = detenteur.id_detenteur
    WHERE registre_equide.id_detenteur='$idDetenteur'
    ORDER BY registre_equide.id_registre ASC";

    $results = mysqli_query($mysqli,$ecuriesql) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($results) > 0) {

        while($rowData = mysqli_fetch_array($results)){
    
            $idRegistre = $rowData['idRegistre'];
            $nomEcurie = $rowData['nomEcurie'];
            $detenteurNom = $rowData['detenteurNom'];
            $detenteurPrenom = $rowData['detenteurPrenom'];
            $registreRue = $rowData['registreRue'];
            $registreCommune = $rowData['registreCommune'];
            $registreCodePostal = $rowData['registreCodePostal'];
            $siret = $rowData['siret'];?>
            
            <ul>
                <li><u>Nom de l'écurie :</u> <?php echo $nomEcurie; ?></li>
                <li><u>Détenteur :</u> <?php echo $detenteurNom;?> <?php echo $detenteurPrenom; ?></li>
                <li><u>Adresse de l'écurie :</u> <?php echo $registreRue;?> <?php echo $registreCommune; ?> <?php echo $registreCodePostal; ?></li>
                <li><u>SIRET :</u> <?php echo $siret; ?></li>     
            </ul>
            
<?php
        }
    }
}
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
        }
    }
}
?>