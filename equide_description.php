<?php

$idSire = $_GET['numSIRE'];
$titre ="Equidé n°$idSire";
include("header.php");

require('PHP/equide_functions/affichage/affichagePhoto_fct.php');

$info = array();

$sql = "SELECT * FROM `equide` WHERE numSIRE='$idSire'";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


if (mysqli_num_rows($result) > 0) {      

    while($equides = mysqli_fetch_array($result)){
        
        //Change le numSIRE pour l'équidé affiché et appelle la fonction Affichage photo avec les bons paramètres
       $lienPdp = AffichagePhoto($mysqli,$idSire);
      
    ?>

    <div class="equide_description">

    <div class="card " style="min-width: 300px ; max-width: 600px; ">
        <div class="card"    >
                                                                                                                         
                <img src="../EquidesWebSite/ASSETS/img_bdd/<?php echo $lienPdp?>" class="card-img-top" alt="Sire n°<?php echo $idSire?>">
            
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title titre_1"><?php echo $equides['nom_equide'] ?></h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Sire : <?php echo $equides['numSIRE'] ?></li>
                                <li class="list-group-item">UELN : <?php echo $equides['numUELN'] ?></li>
                                <li class="list-group-item">Date de naissancee : <?php echo $equides['dateNaissance_equide'] ?> </li>
                                <li class="list-group-item">Lieu de naissancee : <?php echo $equides['lieuNaissance_equide'] ?> </li>
                                <li class="list-group-item">Race : <?php echo $equides['race_equide'] ?> </li>
                                <li class="list-group-item">Stud : <?php echo $equides['stud_equide'] ?> </li>
                                <li class="list-group-item">Lieu elevage : <?php echo $equides['lieuElevage_equide'] ?> </li>
                                <li class="list-group-item">Sexe : <?php echo $equides['sexe_equide'] ?> </li>
                                <li class="list-group-item">Robe : <?php echo $equides['robe_equide'] ?> </li>
                                <li class="list-group-item">Veterinaire Naisseur : <?php echo $equides['naisseurVeterinaire_equide'] ?> </li>
                                <li class="list-group-item">Pere : <?php echo $equides['pere_equide'] ?> </li>
                                <li class="list-group-item">Mere : <?php echo $equides['mere_equide'] ?> </li>
                                <li class="modification list-group-item"><a href="carnet_traitement.php?numSIRE=<?php echo $equides['numSIRE'];?>"> Carnet de traitement</a></li>
                                <li class="modification list-group-item"><a href="carnet_vaccination.php?numSIRE=<?php echo $equides['numSIRE'];?>"> Carnet de vaccination</a></li>
                                <li class="modification list-group-item"><a href="updateEquide.php?numSIRE=<?php echo $equides['numSIRE'];?>"> Modification</a></li>
                                <li class="modification list-group-item"><a href="PHP/equide_functions/modification/suppressionEquide.php?numSIRE=<?php echo $equides['numSIRE'];?>"> Suppression</a></li>
                            </ul> 
                    </div>
                </div>
            </div>
    </div>
    
    </div>

    <?php include("footer.php"); ?>

    <?php } ?>

<?php }else {
        echo("Vous n'avez pas d'equidés");
} ?>

