<?php
$idSire = $_GET['numSIRE'];


$sql = "SELECT * FROM `vaccin` WHERE numUELN ='$idSire' ORDER BY `dateInjection_vaccin` DESC";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


if (mysqli_num_rows($result) > 0) {      

    while($vaccins = mysqli_fetch_array($result)){ ?>
      
            <div class="equide_bootstrap card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Nom : <?=$vaccins['nom_vaccin']?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">ID Vaccin : <?=$vaccins['id_vaccin']?></li>
                    <li class="list-group-item">Numéro de lot : <?=$vaccins['numLot_vaccin']?></li>
                    <li class="list-group-item">Maladie(s) concernée(s) : <?=$vaccins['maladieConcernees_vaccin']?></li>
                    <li class="list-group-item">Date d'injection : <?=$vaccins['dateInjection_vaccin']?></li>
                    <li class="list-group-item">Lieu : <?=$vaccins['lieu_vaccin']?></li>
                    <li class="list-group-item">Vétérinaire : <?=$vaccins['veterinaire']?></li>
                    <li class="modification list-group-item"><a href="#">Supprimer</a></li>
                </ul>
            </div>  

        <? }?>
   <?php }else {?>
        <h3><?php echo("Vous n'avez pas enregistré de vaccin");}?></h3>