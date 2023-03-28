<!DOCTYPE html>
<html>
<head>
	<title>Recherche d'équidés</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script>
		$(document).ready(function() {
			// Configuration de l'autocomplétion pour le champ de recherche par nom
			$('#nom').autocomplete({
				source: 'phpepic2.php',
				minLength: 2
			});

			// Événement de saisie dans le champ de recherche par sire
			$('#sire').on('input', function() {
				var sire = $(this).val();
				if (sire.length > 2) {
					// Requête AJAX pour récupérer le nom correspondant au sire
					$.ajax({
						url: 'phpepic3.php',
						type: 'POST',
						data: {sire: sire},
						success: function(data) {
							$('#result').html(data);
						}
					});
				}
			});

			// Événement de clic sur la liste déroulante
			$('#result').on('click', 'li', function() {
				var nom = $(this).text();
				window.location.href = 'fiche_equide.php?nom=' + nom;
			});
		});
	</script>
</head>
<body>
	<h1>Recherche d'équidés</h1>
	<form action="phpepic2.php" method="get">
		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom" autocomplete="off"><br>
		<label for="sire">Sire :</label>
		<input type="text" id="sire" name="sire"><br>
		<ul id="result"></ul>
		<input type="submit" value="Rechercher">
	</form>

	<?php
	// Connexion à la base de données
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=registre_equides;charset=utf8', 'root', '');
	} catch (PDOException $e) {
		echo 'Erreur de connexion : ' . $e->getMessage();
	}

	// Traitement de la recherche par nom
	if (isset($_GET['nom'])) {
		$nom = $_GET['nom'];
		$sql = "SELECT * FROM equides WHERE nom LIKE :nom";
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
        $sql = "SELECT nom FROM equides WHERE sire = :sire";
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
</body>
</html>
