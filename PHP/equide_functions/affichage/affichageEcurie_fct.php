<?php 

$info_error = array();
$idLogin = $_SESSION['id_login'];
$typeProfil = $_SESSION['type_profil'];

if(isset($_SESSION['id_detenteur'])){

    $idDetenteur = $_SESSION['id_detenteur'];
    $sql = "SELECT * FROM `registre_equide` JOIN `en_pension` ON registre_equide.id_registre = en_pension.id_registre JOIN `equide` ON equide.id_equide = en_pension.id_equide WHERE id_detenteur='$idDetenteur'";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($result) > 0) {      

        while($rowData = mysqli_fetch_array($result)){
    
            $idRegistre = $rowData['id_registre'];
            $idEquide = $rowData['id_equide'];

            // $lienPdp = AffichagePhoto($mysqli,$rue);
          
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
        <h3><?=("Vous n'avez pas d'écurie");}?></h3>