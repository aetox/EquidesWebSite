<?php
$idEcurie = $_GET['idRegistre'];
$nomEcurie = $_GET['nomEcurie'];
$titre ="$nomEcurie";
ob_start();

include_once("header.php");

if(isset($_SESSION['logged_user'])) {

$info_error_error_error = array();

$sql=
"SELECT detenteur.nom AS detenteurNom, detenteur.prenom AS detenteurPrenom,
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
WHERE registre_equide.id_registre='$idEcurie'";

$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


if (mysqli_num_rows($result) > 0) {      

    while($equides = mysqli_fetch_array($result)){

        //Change le numSIRE pour l'équidé affiché et appelle la fonction Affichage photo avec les bons paramètres
        //$lienPdp = AffichagePhoto($mysqli,$idSire);

    ?>

    <div class="equide_description">

        <div class="card" style="min-width: 250px ; max-width: 400px;">                                                                                          
            <img src="../ASSETS/img_bdd/<?php echo $lienPdp?>" class="card-img-top" alt="Nom équidé : <?php echo $equides['nom']?>">
            <div class="card-body">
                <h5 class="card-title titre_1"><?php echo $equides['nom'] ?></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Sire : <?php echo $equides['sire'] ?></li>
                <li class="list-group-item">UELN : <?php echo $equides['ueln'] ?></li>
                <li class="list-group-item">Date de naissancee : <?php echo $equides['date_naissance'] ?> </li>
                <li class="list-group-item">Lieu de naissancee : <?php echo $equides['lieu_naissance'] ?> </li>
                <li class="list-group-item">Race : <?php echo $equides['nom_race'] ?> </li>
                <li class="list-group-item">Stud : <?php echo $equides['stud'] ?> </li>
                <li class="list-group-item">Lieu elevage : <?php echo $equides['lieu_elevage'] ?> </li>
                <li class="list-group-item">Sexe : <?php echo $equides['sexe'] ?> </li>
                <li class="list-group-item">Robe : <?php echo $equides['robe'] ?> </li>
                <li class="list-group-item">Vétérinaire Naissance : <?php echo $equides['naisseur'] ?> </li>
                <!-- <li class="list-group-item">Pere : <?php echo $equides['pere_equide'] ?> </li>
                <li class="list-group-item">Mere : <?php echo $equides['mere_equide'] ?> </li> -->
            </ul>
                <div class="card-body">
                    <h4 class="card-title">Attributs physique</h5>
                    <p class="card-text">Tête : </p>
                </div>
            <ul class="list-group list-group-flush">
                <li class="modification list-group-item"><a href="carnet_traitement.php?sire=<?php echo $equides['sire'];?>"> Carnet de traitement</a></li>
                <li class="modification list-group-item"><a href="carnet_vaccination.php?sire=<?php echo $equides['sire'];?>"> Carnet de vaccination</a></li>
                <li class="modification list-group-item"><a href="updateEquide.php?sire=<?php echo $equides['sire'];?>"> Modification</a></li>
                <li class="modification list-group-item"><a href="PHP/equide_functions/modification/suppressionEquide.php?sire=<?php echo $equides['sire'];?>"> Suppression</a></li>
            </ul> 
        </div>

        <a href="equides.php" class="boutton_orangeV2"><img src="ASSETS/ico/retour.png">retour</a>

    </div>

    <?php include_once("footer.php"); ?>

    <?php } ?>

<?php }else {
        echo("Vous n'avez pas d'equidés");
} ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>