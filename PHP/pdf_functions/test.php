<?php
require_once '../../INCLUDES/vendor/autoload.php'; // chemin d'accès au fichier Mpdf autoload.php

// Connexion à la BDD (à personnaliser)
require('../other_functions/connexion_bdd.php');

// Créer un objet Mpdf
$mpdf = new \Mpdf\Mpdf();

// Ajouter une page
$mpdf->AddPage();


// Écrire du texte dans le PDF
$mpdf->WriteHTML('<h1>Mon petit PDF</h1>');
$mpdf->WriteHTML('<p>Ceci est un exemple de PDF généré avec Mpdf.</p>');

// Générer le PDF
$mpdf->Output('mon_petit_pdf.pdf','I'); // 'I' pour l'afficher dans une fenetre et 'D' pour le télécharger directement