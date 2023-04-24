<?php
$titre ="Page ADMIN";
ob_start();
include("header.php");
if(isset($_SESSION['logged_user'])) { 
    if($_SESSION['type_profil']=="administrateur"){ ?>
        
      

        <div class="carnet_traitement">
        <h1>DETENTEURS</h1>
        <div class="carnet_traitement_affichage">
        <?php
        $sql ="SELECT * FROM `detenteur`";
        $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
        
        if(mysqli_num_rows($result) > 0){
            while($rowData = mysqli_fetch_array($result)){?>

                <div class="equide_bootstrap card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $rowData['prenom'] .' '. $rowData['nom']?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Prenom : <?=$rowData['prenom'] ?></li>
                        <li class="list-group-item">Nom : <?=$rowData['nom'] ?></li>
                        <li class="list-group-item">SIRE : <?=$rowData['sire'] ?></li>
                        <li class="list-group-item">Rue : <?=$rowData['rue'] ?></li>
                        <li class="list-group-item">Commune : <?=$rowData['commune'] ?></li>
                        <li class="list-group-item">Code Postal : <?=$rowData['code_postal'] ?></li>
                        <li class="list-group-item">Signature : <?=$rowData['signature_detenteur'] ?></li>
                        <li class="list-group-item">Date d'enregistrement : <?=date("d/m/y", strtotime($rowData['date_enregistrement'])) ?></li>
                        <li class="list-group-item">Nationalité : <?=$rowData['nationalite'] ?></li>


                        <li class="modification list-group-item"><a href="PHP/user_functions/suppression/suppressionDetenteur.php?idDetenteur=<?=$rowData['id_detenteur']?>">Supprimer</a></li>
                    </ul>
                </div>  

<?php 
            }
        } ?>
        </div>
        </div>
      
        <div class="carnet_traitement">
        <h1>Proprietaire</h1>   
        <div class="carnet_traitement_affichage">
     <?php 
          
             $sql1 ="SELECT * FROM `proprietaire`";
             $result1 = mysqli_query($mysqli,$sql1) or die(mysqli_error($mysqli));
             
             if(mysqli_num_rows($result1) > 0){
                 while($rowData = mysqli_fetch_array($result1)){?>
     
                     <div class="equide_bootstrap card" style="width: 18rem;">
                         <div class="card-body">
                             <h5 class="card-title"><?= $rowData['prenom'] .' '. $rowData['nom']?></h5>
                         </div>
                         <ul class="list-group list-group-flush">
                             <li class="list-group-item">Prenom : <?=$rowData['prenom'] ?></li>
                             <li class="list-group-item">Nom : <?=$rowData['nom'] ?></li>
                             <li class="list-group-item">Rue : <?=$rowData['rue'] ?></li>
                             <li class="list-group-item">Commune : <?=$rowData['commune'] ?></li>
                             <li class="list-group-item">Code Postal : <?=$rowData['code_postal'] ?></li>
     
                             <li class="modification list-group-item"><a href="PHP/user_functions/suppression/suppressionProprietaire.php?idProprietaire=<?=$rowData['id_proprietaire']?>">Supprimer</a></li>
                         </ul>
                     </div>
     

    <?php
                }
            } ?>
    
        </div>
        </div>

<?php }else{
        header("Location: accueil.php");
}?>
<?php include("footer.php"); ?>
<?php } else {
    header("Location: index.php");
}ob_end_flush(); ?>