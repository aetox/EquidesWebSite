<?php 
  //Appel la fonction affichage pour afficher la photo
  require('affichagePhoto_fct.php');

$info_error = array();

if(isset($_SESSION['id_detenteur'])){
$idDetenteur = $_SESSION['id_detenteur'];

$sql =
"SELECT en_pension.date_debut AS epdd, en_pension.date_fin AS epdf,
equide.sire AS sireEquide, equide.ueln AS uelnEquide, equide.nom AS nomEquide, equide.sexe,
race.nom_race,
proprietaire.nom AS nomProprietaire, proprietaire.prenom AS prenomProprietaire
FROM `registre_equide`
JOIN `en_pension`
ON registre_equide.id_registre = en_pension.id_registre
JOIN `equide`
ON equide.id_equide = en_pension.id_equide
JOIN `race`
ON equide.id_race = race.id_race
JOIN `proprietaire`
ON equide.id_proprietaire = proprietaire.id_proprietaire
WHERE id_detenteur='$idDetenteur'";

$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($result) > 0) {      

    while($rowData = mysqli_fetch_array($result)){

        $epdd = $rowData['epdd'];
        $epdd1 = date("d/m/y", strtotime($epdd));
        $epdf = $rowData['epdf'];
        $epdf1 = date("d/m/y", strtotime($epdf));
        $sireEquide = $rowData['sireEquide'];
        $uelnEquide = $rowData['uelnEquide'];
        $nomEquide = $rowData['nomEquide'];
        $nom_race = $rowData['nom_race'];
        $nomProprietaire = $rowData['nomProprietaire'];
        $prenomProprietaire = $rowData['prenomProprietaire'];
        $lienPdp = AffichagePhoto($mysqli,$sireEquide);
      
    ?>
            <div class="equide_bootstrap card " >
                <img src="../ASSETS/img_bdd/<?=$lienPdp?>" class="card-img-top img-equide-sans-pension" alt="Nom du cheval : <?php echo $nomEquide?>">
                <div class="card-body ">
                    <h5 class="card-title"><strong><?php echo $nomEquide ?></strong></h5>
                        <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Race : <?php echo $nom_race ?></li>
                                    <li class="list-group-item">SIRE : <?php echo $sireEquide ?></li>
                                    <li class="list-group-item">UELN : <?php echo $uelnEquide ?></li>
                                    <li class="list-group-item">Propriétaire : <?php echo $nomProprietaire;?> <?php echo $prenomProprietaire ?></li>
                                    <li class="list-group-item">En pension depuis le <?php echo $epdd1;?> jusqu'au <?php echo $epdf1 ?></li>
                                    <!-- <li class="modification list-group-item"><a href="#">PDF - Carnet de Santé</a></li> -->
                                    <li class="modification list-group-item" id="affichageEquides_info"><a  href="equide_description.php?sireEquide=<?php echo $rowData['sireEquide'];?>">plus d'info</a></li>
                        </ul> 
                </div>
            </div>
<?php } ?>

<?php }}else { ?>
        <h3><?php echo("Vous n'avez pas d'équidés");}?></h3>

