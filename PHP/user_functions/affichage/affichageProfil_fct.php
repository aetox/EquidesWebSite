<?php 
$id_login = $_SESSION['id_login'];
$type_profil = $_SESSION['type_profil'];

if(isset($_SESSION['id_detenteur'])){ 

    $id_detenteur = $_SESSION['id_detenteur'];
    $queryDetenteur =
    "SELECT *
    FROM `detenteur`
    JOIN `login`
    ON detenteur.id_login=login.id_login
    -- JOIN `registre_equide`
    -- ON detenteur.id_detenteur = registre_equide.id_detenteur
    WHERE detenteur.id_detenteur=$id_detenteur";  
    $resultDetenteur = mysqli_query($mysqli,$queryDetenteur) or die(mysqli_error($mysqli));
    
    if(mysqli_num_rows($resultDetenteur) > 0){

        $ecurieDetenteur = "SELECT * 
        FROM `detenteur`
        JOIN `registre_equide`
        ON detenteur.id_detenteur = registre_equide.id_detenteur
        WHERE detenteur.id_detenteur=$id_detenteur";

        $resultecurieDetenteur = mysqli_query($mysqli,$ecurieDetenteur) or die(mysqli_error($mysqli));

        if(mysqli_num_rows($resultecurieDetenteur) > 0){
            while($rowData = mysqli_fetch_array($resultecurieDetenteur)){
            $nomEcurie = $rowData['nom_ecurie'];
            }
        }else {
            $nomEcurie = "Vous n'avez pas d'écurie";
        }

        while($rowData = mysqli_fetch_array($resultDetenteur)){

            $nom = $rowData['nom'];
            $prenom = $rowData['prenom'];
            $sire = $rowData['sire'];
            $email = $rowData['email'];
            $nombre_equides = $rowData['nombre_equides'];
            $rue = $rowData['rue'];
            $commune = $rowData['commune'];
            $code_postal = $rowData['code_postal'];
            $signature_detenteur = $rowData['signature_detenteur'];
            $date_enregistrement = $rowData['date_enregistrement'];
            $nationalite = $rowData['nationalite'];
        }
    }
?>

<div class="profil">
    <h1 class="titre_1">Mon Profil</h1>   
    <div class="card" style="min-width: 250px ; max-width: 400px;">
            <div class="card-body">
            <h5 class="card-title"><?php echo $prenom." ".$nom; ?></h5>
            </div>  
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Prénom : </strong><?=$prenom?></li>
                <li class="list-group-item"><strong>Nom : </strong><?=$nom?></li>
                <li class="list-group-item"><strong>Sire : </strong><?=$sire?></li>
                <li class="list-group-item"><strong>Mail : </strong><?=$email?></li>
                <li class="list-group-item"><strong>Mot de passe : </strong>********</li>
                <li class="list-group-item"><strong>Adresse : </strong><?=$rue?></li>
                <li class="list-group-item"><strong>Commune : </strong><?=$commune?></li>
                <li class="list-group-item"><strong>Code Postal : </strong><?=$code_postal?></li>
                <li class="list-group-item"><strong>Nombre d'équides : </strong><?=$nombre_equides?></li>
                <li class="list-group-item"><strong>Ecurie : </strong><a href="ecurie.php"><?=$nomEcurie?></a></li>
                <li class="list-group-item"><strong>Nationalité : </strong><?=$nationalite?></li>
                <li class="list-group-item"><strong>Signature : </strong><?=$signature_detenteur?></li>
                <li class="list-group-item"><strong>Date d'enregistrement : </strong><?=$date_enregistrement?></li>
                <li class="modification list-group-item"><a href="updateProfil.php">Modification</a></li>
            </ul>   
    </div>
    <a href="accueil.php" class="boutton_orangeV2"><img src="ASSETS/ico/retour.png">retour</a>
    </div>


<?php } elseif(isset($_SESSION['id_proprietaire'])){ 

        $id_proprietaire = $_SESSION['id_proprietaire'];
        $queryProprietaire = "SELECT * FROM `proprietaire` JOIN `login` ON proprietaire.id_login=login.id_login WHERE id_proprietaire=$id_proprietaire"  ; 
        $resultProprietaire = mysqli_query($mysqli,$queryProprietaire) or die(mysqli_error($mysqli));

        if(mysqli_num_rows($resultProprietaire) > 0){
        while($rowData = mysqli_fetch_array($resultProprietaire)){

            $nom = $rowData['nom'];
            $prenom = $rowData['prenom'];
            $email = $rowData['email'];
            $password = $rowData['mot_de_passe'];
            $rue = $rowData['rue'];
            $commune = $rowData['commune'];
            $code_postal = $rowData['code_postal'];
            }
        }    
    ?>

    <div class="profil">
    <h1 class="titre_1">Mon Profil</h1>   
    <div class="card" style="min-width: 250px ; max-width: 400px;">
            <img src="../ASSETS/img_bdd/<?php echo $lienPdp?>" class="card-img-top" alt="Propriétaire n°<?php echo $id_proprietaire?>">
            <div class="card-body">
            <h5 class="card-title"><?php echo $prenom." ".$nom; ?></h5>
            </div>  
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Prénom : </strong><?=$prenom?></li>
                <li class="list-group-item"><strong>Nom : </strong><?=$nom?></li>
                <li class="list-group-item"><strong>Mail : </strong><?=$email?></li>
                <li class="list-group-item"><strong>Mot de passe : </strong>********</li>
                <li class="list-group-item"><strong>Adresse : </strong><?=$rue?></li>
                <li class="list-group-item"><strong>Commune : </strong><?=$commune?></li>
                <li class="list-group-item"><strong>Code Postal : </strong><?=$code_postal?></li>
                <li class="modification list-group-item"><a href="updateProfil.php"> Modification</a></li>
            </ul>    
    </div>
    <a href="accueil.php" class="boutton_orangeV2"><img src="ASSETS/ico/retour.png">retour</a>
    </div>


<?php }else{

}

?>