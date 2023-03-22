<?php
// Connexion à la base de données MySQL
$host = 'localhost';
$username = 'root';
$password = 'jeteste';
$dbname = 'registre_equides';
$conn = mysqli_connect($host, $username, $password, $dbname);

// Récupération de la valeur de recherche
$q = $_GET['q'];

// Requête SQL pour récupérer les résultats de la recherche
$sql = "SELECT * FROM equides WHERE nom LIKE '%$q%'";

// Exécution de la requête
$result = mysqli_query($conn, $sql);

// Affichage des résultats
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<div class="search-result">' . $row['nom'] . '</div>';
	}
} else {
	echo '<div class="search-result">Aucun résultat trouvé</div>';
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>
