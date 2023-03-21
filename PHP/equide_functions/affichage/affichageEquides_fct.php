<?php 
  //Appel la fonction affichage pour afficher la photo
  require('affichagePhoto_fct.php');

$info_error = array();

// Affichage taches en cours :
$idDetenteur = $_SESSION['id_detenteur'];

$sql = "SELECT * FROM `equide` WHERE id_detenteur='$idDetenteur'";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($result) > 0) {      

    while($equides = mysqli_fetch_array($result)){

        //Change le numSIRE pour l'équidé affiché et appelle la fonction Affichage photo avec les bons paramètres
        $numSIRE = $equides['numSIRE'];
        $lienPdp = AffichagePhoto($mysqli,$numSIRE);
      
    ?>
            <div class="equide_bootstrap card " >
                <img src="../ASSETS/img_bdd/<?php echo $lienPdp?>" class="card-img-top" alt="Equidé n°<?php echo $numSIRE?>">
                <div class="card-body ">
                    <h5 class="card-title"><strong><?php echo $equides['nom_equide'] ?></strong></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Sire : <?php echo $equides['numSIRE'] ?></li>
                            <li class="list-group-item">UELN : <?php echo $equides['numUELN'] ?></li>
                            <li class="modification list-group-item"><a href="#">PDF - Carnet de Santé</a></li>
                            <li class="modification list-group-item" id="affichageEquides_info"><a  href="equide_description.php?numSIRE=<?php echo $equides['numSIRE'];?>">plus d'info</a></li>
                        </ul> 
                </div>
            </div>
<?php } ?>

<?php }else { ?>
        <h3><?php echo("Vous n'avez pas d'équidés");}?></h3>

