<?php 
  //Appel la fonction affichage pour afficher la photo
  //require('affichagePhoto_fct.php');

$info_error = array();

if(isset($_SESSION['id_detenteur'])){
$idDetenteur = $_SESSION['id_detenteur'];

// $sql =
// "SELECT equide.nom AS nomEquide, fiche_transport.date_depart AS date_depart, fiche_transport.date_arrivee AS date_arrivee, fiche_transport.lieu_depart AS lieu_depart,
// fiche_transport.lieu_arrivee AS lieu_arrivee, fiche_transport.motif_deplacement AS motif_deplacement
// FROM `registre_equide`
// JOIN `fiche_transport`
// ON registre_equide.id_registre=fiche_transport.id_registre
// JOIN `en_pension`
// ON registre_equide.id_registre=en_pension.id_registre
// JOIN `equide`
// ON en_pension.id_equide=equide.id_equide
// WHERE id_detenteur='$idDetenteur'";

        $sql1 ="SELECT `id_registre` FROM `registre_equide` WHERE id_detenteur=$idDetenteur";
        $result = mysqli_query($mysqli,$sql1) or die(mysqli_error($mysqli));
        if (mysqli_num_rows($result) > 0) {      

                while($rowData1 = mysqli_fetch_array($result)){
                        $idRegistre =$rowData1['id_registre'];
                 }
        }


$sql=
"SELECT equide.nom AS nomEquide,fiche_transport.id_transport AS id_transport, fiche_transport.date_depart AS date_depart, fiche_transport.date_arrivee AS date_arrivee, fiche_transport.lieu_depart AS lieu_depart,
fiche_transport.lieu_arrivee AS lieu_arrivee, fiche_transport.motif_deplacement AS motif_deplacement
FROM `fiche_transport`
JOIN `equide`
ON fiche_transport.id_equide=equide.id_equide
WHERE id_registre=$idRegistre ORDER BY `date_depart` DESC";

$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($result) > 0) {      

    while($rowData = mysqli_fetch_array($result)){ ?>
            <div class="equide_bootstrap card " >
                <div class="card-body ">
                    <h5 class="card-title"><strong><?php echo date("d/m/y", strtotime($rowData['date_depart'])) ?></strong></h5>
                        <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Equidé en voyage : <?php echo $rowData['nomEquide'] ?></li>
                                    <li class="list-group-item">Date depart : <?php echo date("d/m/y", strtotime($rowData['date_depart'])) ?></li>
                                    <li class="list-group-item">Date d'arrivée : <?php echo date("d/m/y", strtotime($rowData['date_arrivee'])) ?></li>
                                    <li class="list-group-item">Lieu depart : <?php echo $rowData['lieu_depart'] ?></li>                             
                                    <li class="list-group-item">Lieu arrivee : <?php echo $rowData['lieu_arrivee']?></li>
                                    <li class="list-group-item">Motif déplacement : <?php echo $rowData['motif_deplacement'] ?></li>
                                    <li class="list-group-item"><a href="PHP/equide_functions/modification/suppressionTransport_fct.php?idTransport=<?=$rowData['id_transport']?>">Supprimer</a></li>

                        </ul> 
                </div>
            </div>
<?php } ?>

<?php }else {?>
        <h3><?php echo("Vous n'avez pas de transport enregistré");}?></h3>
<?php }else {} ?>
        
