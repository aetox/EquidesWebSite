<?php 

$info = array();

// Affichage taches en cours :
$idDetenteur = $_SESSION['id_detenteur'];


$sql = "SELECT * FROM `equide` WHERE id_detenteur='$idDetenteur'";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($sql));



if (mysqli_num_rows($result) > 0) {      

    while($equides = mysqli_fetch_array($result)){?>

    
            <div class="Equide card" >

                <img src="../EquidesWebSite/ASSETS/cheval-mustang.jpg" class="card-img-top" alt="Cheval">
                    <div class="card-body">
                    
                        <h5 class="card-title"><?php echo $equides['nom_equide'] ?></h5>

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
                        </ul> 
                    </div>
                </div>
               <?php } ?>

<?php } ?>

