<?php
$titre ="Créer un voyage";
ob_start();
include_once("header.php");
if(isset($_SESSION['logged_user']) || isset($_COOKIE['user_id_login'])){ 
    $id_login = intval($_COOKIE['user_id_login']); 
?>

<div class="ajout_traitement">
    <h1>Créer une fiche de transport</h1>
    <div class="formulaire_1">
        <form method="post" class="formulaire_2" name="formajoutTraitement" enctype="multipart/form-data">

            <a href="carnet_transport.php"><span class="material-symbols-outlined">close</span></a>
            <label for="">Molécule traitement :</label>
            <input type="text" id="moleculeTraitement" name="moleculeTraitement" placeholder="Molécule traitement" required><br>

            <label for="numSire">Référence traitement :</label>
            <input type="text" id="referenceTraitement" name="referenceTraitement" placeholder="Référence traitement" required><br>

            <label for="dateTraitement">Date :</label>
            <input type="date" id="dateTraitement" name="dateTraitement" required><br>

            <label for="commentaireTraitement">Commentaire :</label>
            <input type="text" id="commentaireTraitement" name="commentaireTraitement" placeholder="Commentaire" required><br>

            <button type="submit" name="ajouter">Créer</button>

        </form>
    </div>	
</div>





<?php include_once("footer.php"); ?>
<?php }else {
    header("Location: index.php");
}ob_end_flush(); ?>