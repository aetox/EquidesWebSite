<?php
session_start();
// Permet de se connecter à la BDD
include_once("PHP/other_functions/connexion_bdd.php");
// Active l'affichage des erreurs
error_reporting(E_ALL);
ini_set("display_errors", 1);

//Définie une variable qui sert de chemin d'accès pour n'importe quel fichier
$site_root = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/connexion&inscription.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/equides.css">
    <link rel="stylesheet" href="CSS/accueil.css">
    <link rel="stylesheet" href="CSS/ecurie.css">
    <link rel="stylesheet" href="CSS/carnet_transport.css">
    <link rel="stylesheet" href="CSS/profil.css">
    <link rel="stylesheet" href="CSS/carnet_traitement.css">
    <link rel="stylesheet" href="CSS/ajout_traitement.css">
    <link rel="stylesheet" href="CSS/ajout_equides.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="icon" type="image/png" href="ASSETS/ico/ico.png" />
    <!-- Permet d'avoir par défaut le titre Equide avec le ?? -->
    <title><?= $titre ?? "Equides"?></title>
</head>
<body>
    <div class="contenu"> <!-- Cette div sera fermée dans footer.php -->

        <?php if(isset($_SESSION['logged_user'])) { ?>

            <header>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" id="nav_img" href="accueil.php">
                            <img src="ASSETS/ico/logo_equides.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-right">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav ms-auto justify-content-end"> <!-- Utilisation de la classe "justify-content-end" pour aligner à droite -->
                                <a class="nav-link text-uppercase text-white" aria-current="page" href="accueil.php">Accueil</a>
                                <a class="nav-link text-uppercase text-white" href="equides.php">Equides</a>
                                <a class="nav-link text-uppercase text-white" href="ecurie.php">Ecurie</a>
                                <a class="nav-link text-uppercase text-white" href="carnet_transport.php">Transport</a>
                                <a class="nav-link text-uppercase text-white" href="profil.php">Mon profil</a>
                                <a class="nav-link text-uppercase text-white" href="PHP/user_functions/deconnexion.php">Déconnexion</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

        <?php }else {}; ?>