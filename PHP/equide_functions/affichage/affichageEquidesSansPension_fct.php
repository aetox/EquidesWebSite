<?php 
  //Appel la fonction affichage pour afficher la photo
  require('affichagePhoto_fct.php');

$info_error = array();

if(isset($_SESSION['id_detenteur'])){
$idDetenteur = $_SESSION['id_detenteur'];

// equide.sire AS sireEquide, equide.ueln AS uelnEquide, equide.nom AS nomEquide, equide.sexe,
// race.nom_race,
// proprietaire.nom AS nomProprietaire, proprietaire.prenom AS prenomProprietaire

$sql =
"SELECT 
equide.sire AS sireEquide, equide.ueln AS uelnEquide, equide.nom AS nomEquide, equide.sexe,
race.nom_race,
proprietaire.nom AS nomProprietaire, proprietaire.prenom AS prenomProprietaire
FROM `equide`
JOIN `en_pension`
ON en_pension.id_equide = equide.id_equide
JOIN `race`
ON equide.id_race = race.id_race
JOIN `proprietaire`
ON equide.id_proprietaire = proprietaire.id_proprietaire

WHERE en_pension.id_registre IS NULL";

$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($result) > 0) {      

    while($rowData = mysqli_fetch_array($result)){

        $sireEquide = $rowData['sireEquide'];
        $uelnEquide = $rowData['uelnEquide'];
        $nomEquide = $rowData['nomEquide'];
        $nom_race = $rowData['nom_race'];
        $nomProprietaire = $rowData['nomProprietaire'];
        $prenomProprietaire = $rowData['prenomProprietaire'];
        // $lienPdp = AffichagePhoto($mysqli,$photo);
      
    ?>
            <div class="equide_bootstrap card " >
                <img src="../ASSETS/img_bdd/" class="card-img-top" alt="Nom du cheval : <?php echo $nomEquide?>">
                <div class="card-body ">
                    <h5 class="card-title"><strong><?php echo $nomEquide ?></strong></h5>
                        <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Race : <?php echo $nom_race ?></li>
                                    <li class="list-group-item">SIRE : <?php echo $sireEquide ?></li>
                                    <li class="list-group-item">UELN : <?php echo $uelnEquide ?></li>
                                    <li class="list-group-item">Propriétaire : <?php echo $nomProprietaire;?> <?php echo $prenomProprietaire ?></li>
                        </ul> 

                        <a href="affectation_equide.php?sireEquide=<?php echo $rowData['sireEquide'];?>" class="boutton_vertV2"><img src="ASSETS/ico/plus2.png">Affecter</a>

                                    

                       
                             
                </div>
            </div>
            
<?php } ?>

<?php } ?>

<h3><?php echo("Tous les équidés sont affectés");}?></h3>


        

