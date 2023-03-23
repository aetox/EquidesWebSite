<?php 

$info_error = array();
$idLogin = $_SESSION['id_login'];
$typeProfil = $_SESSION['type_profil'];

if(isset($_SESSION['id_detenteur'])){

    $idDetenteur = $_SESSION['id_detenteur'];
    $sql = "SELECT * FROM `registre_equide` WHERE id_detenteur='$idDetenteur'";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($result) > 0) {      

        while($equides = mysqli_fetch_array($result)){
    
            $SIRE = $equides['SIRE'];
            $lienPdp = AffichagePhoto($mysqli,$SIRE);
          
        ?>
                <div class="equide_bootstrap card " >
                    <img src="../ASSETS/img_bdd/<?php echo $lienPdp?>" class="card-img-top" alt="Equidé n°<?php echo $SIRE?>">
                    <div class="card-body ">
                        <h5 class="card-title"><strong><?php echo $equides['nom_equide'] ?></strong></h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Sire : <?php echo $equides['SIRE'] ?></li>
                                <li class="list-group-item">UELN : <?php echo $equides['UELN'] ?></li>
                                <li class="modification list-group-item"><a href="#">PDF - Carnet de Santé</a></li>
                                <li class="modification list-group-item" id="affichageEquides_info"><a  href="equide_description.php?SIRE=<?php echo $equides['SIRE'];?>">plus d'info</a></li>
                            </ul> 
                    </div>
                </div>
    <?php }}

}elseif(isset($_SESSION['id_proprietaire'])) {

    $idProprietaire = $_SESSION['id_proprietaire'];
    $sql = "SELECT * FROM `registre_equide` WHERE proprietaire='$id_login'";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    
    if (mysqli_num_rows($result) > 0) {      

        while($equides = mysqli_fetch_array($result)){
    
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
    <?php }

}}else {?>
        <h3><?=("Vous n'avez pas d'écurie");}?></h3>