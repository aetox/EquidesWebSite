<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost:3306;dbname=dbs10369264;charset=utf8';
$username = 'root';
$password = 'root';
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

// Récupération des équidés correspondant à la recherche par nom
if (isset($_GET['term'])) {
    $term = $_GET['term'];
    $sql = "SELECT nom FROM equides WHERE nom LIKE :term";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['term' => '%' . $term . '%']);
    $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo json_encode($results);
}

// Fermeture de la connexion à la base de données
$pdo = null;
?>
