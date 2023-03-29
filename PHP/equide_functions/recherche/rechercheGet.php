<?php
	// Connexion à la base de données
	try {
		$pdo = new PDO('mysql:host=localhost:3306;dbname=dbs10369264;charset=utf8', 'root', 'root');
	} catch (PDOException $e) {
		echo 'Erreur de connexion : ' . $e->getMessage();
	}

	// Traitement de la recherche par nom
	if (isset($_GET['nom'])) {
		$nom = $_GET['nom'];
		$sql = "SELECT * FROM equide WHERE nom LIKE :nom";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(['nom' => '%' . $nom . '%']);
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Affichage des résultats
		if (count($results) > 0) {
			echo '<h2>Résultats de la recherche par nom :</h2>';
			echo '<ul>';
			foreach ($results as $result) {
				echo '<li><a href="fiche_equide.php?nom=' . $result['nom'] . '">' . $result['nom'] . '</a></li>';
			}
			echo '</ul>';
        } else {
            echo '<p>Aucun équidé trouvé pour cette recherche.</p>';
        }
    }
    
    // Traitement de la recherche par sire
    if (isset($_POST['sire'])) {
        $sire = $_POST['sire'];
        $sql = "SELECT nom FROM equide WHERE sire = :sire";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['sire' => $sire]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Affichage du résultat
        if ($result) {
            echo '<h2>Résultat de la recherche par sire :</h2>';
            echo '<ul>';
            echo '<li>' . $result['nom'] . '</li>';
            echo '</ul>';
        }
    }
    
    // Fermeture de la connexion à la base de données
    $pdo = null;
    ?>