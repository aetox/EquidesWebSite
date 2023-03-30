<?php

include_once('../../other_functions/connexion_bdd.php');
session_start();

if(isset($_POST['search_keyword'])){

    $idDetenteur = $_SESSION['id_detenteur'];
    $search_keyword = $mysqli->real_escape_string($_POST['search_keyword']);
    $query =
    "SELECT equide.nom AS nom, equide.sire AS sire
    FROM equide
    JOIN `en_pension`
    ON en_pension.id_equide = equide.id_equide
    JOIN `registre_equide`
    ON registre_equide.id_registre = en_pension.id_registre
    JOIN `detenteur`
    ON detenteur.id_detenteur = registre_equide.id_detenteur
    WHERE equide.nom LIKE '%$search_keyword%' AND detenteur.id_detenteur='$idDetenteur'";
    $result = $mysqli->query($query);

    if ($result === false) {
        trigger_error('Error: ' . $mysqli->error, E_USER_ERROR);
    } else {
        $rows_returned = $result->num_rows;
    }

    $bold_search_keyword = '<strong>' . $search_keyword . '</strong>';
    if ($rows_returned > 0) {
        while ($rows = $result->fetch_assoc()) {
            echo '<div class="show" align="left"><span class="nom"><a href="equide_description.php?sireEquide=' . $rows['sire'] . '">' . str_ireplace($search_keyword, $bold_search_keyword, $rows['nom']) . '</a></span></div>';

        }
    } else {
        echo '<div class="show" align="left">Aucun équidé.</div>';
    }
}
?>