<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=registre_equides;charset=utf8';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
    exit;
}

// Recherche par sire
if (isset($_POST['sire'])) {
    $sire = $_POST['sire'];
    $sql = "SELECT nom FROM equides WHERE sire = :sire";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['sire' => $sire]);
    $nom = $stmt->fetch(PDO::FETCH_COLUMN);
    if ($nom) {
        // Affichage du nom de l'équidé correspondant
        echo '<a href="details_equide.php?sire='.$sire.'">'.$nom.'</a>';
    } else {
        echo 'Aucun équidé trouvé';
    }
}

// Fermeture de la connexion à la base de données
$pdo = null;
?>
