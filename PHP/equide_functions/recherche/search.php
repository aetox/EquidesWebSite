<?php
include('../../other_functions/connexion_bdd.php');
if(isset($_POST['search_keyword'])) {

    $search_keyword = $mysqli->real_escape_string($_POST['search_keyword']);
    $query = "SELECT nom, sire FROM equide WHERE nom LIKE '%$search_keyword%'";
    $result = $mysqli->query($query);

    if ($result === false) {
        trigger_error('Error: ' . $mysqli->error, E_USER_ERROR);
    } else {
        $rows_returned = $result->num_rows;
    }

    $bold_search_keyword = '<strong>' . $search_keyword . '</strong>';
    if ($rows_returned > 0) {
        while ($rows = $result->fetch_assoc()) {
            echo '<div class="show" align="left"><span class="nom">' . str_ireplace
                ($search_keyword, $bold_search_keyword, $rows['nom']) . '</span></div>';
        }
    } else {
        echo '<div class="show" align="left">No matching records.</div>';
    }
}
?>