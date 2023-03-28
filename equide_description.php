<?php
$sireEquide = $_GET['sireEquide'];
$titre ="Equidé n°$sireEquide";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user'])) {
require('PHP/equide_functions/affichage/affichagePhoto_fct.php');

$info_error_error_error = array();

$sql =
"SELECT *
FROM `equide`
JOIN `race`
ON equide.id_race = race.id_race
WHERE sire ='$sireEquide'";
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
                <li class="list-group-item">Veterinaire Naisseur : <?php echo $equides['naisseur'] ?> </li>
                <!-- <li class="list-group-item">Pere : <?php echo $equides['pere_equide'] ?> </li>
                <li class="list-group-item">Mere : <?php echo $equides['mere_equide'] ?> </li> -->
                <li class="modification list-group-item"><a href="carnet_traitement.php?sire=<?php echo $equides['sire'];?>"> Carnet de traitement</a></li>
                <li class="modification list-group-item"><a href="carnet_vaccination.php?sire=<?php echo $equides['sire'];?>"> Carnet de vaccination</a></li>
                <li class="modification list-group-item"><a href="updateEquide.php?sire=<?php echo $equides['sire'];?>"> Modification</a></li>
                <li class="modification list-group-item"><a href="PHP/equide_functions/modification/suppressionEquide.php?sire=<?php echo $equides['sire'];?>"> Suppression</a></li>
            </ul> 
        </div>

        <a href="equides.php" class="boutton_orangeV2"><img src="ASSET/ico/retour.png">retour</a>

    </div>

    <?php include_once("footer.php"); ?>

    <?php } ?>

<?php }else {
        echo("Vous n'avez pas d'equidés");
} ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>