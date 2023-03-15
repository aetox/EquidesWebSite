<?php

//Permet d'avoir le numéro de l'equidé séléctionné
$idSire = $_GET['numSIRE'];

require_once '../../INCLUDES/vendor/autoload.php'; // chemin d'accès au fichier Mpdf autoload.php

// Connexion à la BDD (à personnaliser)
require('../other_functions/connexion_bdd.php');

//Requete SQL pour les traitements

$sql = "SELECT * FROM `vaccin` WHERE numUELN ='$idSire'";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

// Créer un objet Mpdf
$mpdf = new \Mpdf\Mpdf();
$mpdf->debug = true;
// Ajout d'une nouvelle page en mode paysage
$mpdf->AddPage('');  // 'L' pour mettre le PDF en paysage

$mpdf->SetTitle("Carnet de vaccination de l'équidé n°$idSire");


// Génération du contenu du document
$html = '

<style>

			img {
	
				width: 100px;
				height: 100px;
		
			}


            h1 {

				position : fixed;
				top : 17px;
				left : 120px;
				padding-top: 10px;
              	font-size: 20px;
              	font-family: Arial, sans-serif;
              	text-align: center;
			  	background-color: rgba(207, 113, 3, 1) ;
			  	color: white;
			  	text-transform: uppercase;
			  	font-weight: bold;
			  	border-radius: 10px;
			  	width : 600px;
			  	height: 40px;
			  
            }
            
			div#table{

				padding-top:80px;
			}

            table {
              border-collapse: collapse;
              margin: 0 auto;
              
            }
            
            th, td {
              border: 1px solid #333;
              padding: 10px;
              text-align: center;
              font-family: Arial, sans-serif;

            }
            
            th {
                font-family: Arial, sans-serif;
                background-color: rgba(207, 113, 3, 1) ;
                color: white;
                text-transform: uppercase;
                font-weight: bold;
            }
          </style>


		  	<img src="ico.png"/>
			<h1>Carnet de vaccination de l\'équidé n°'.$idSire.'</h1>
	
		<div id="table">
		<table border="1">
        <tr>
            <th>ID vaccin</th>
            <th>Nom du Vaccin</th>
            <th>Numéro de lot</th>
            <th>Maladie concernées</th>
            <th>Date</th>
            <th>Lieu de vaccination</th>
            <th>Vétérinaire</th>
            <th>Signature</th>
        </tr>

';

// Génération des données du tableau en utilisant une boucle while
 while($row = mysqli_fetch_assoc($result)) {
     $html .= '

     <tr>
        <td>'.$row["id_vaccin"].'</td>
        <td>'.$row["nom_vaccin"].'</td>
        <td>'.$row["numLot_vaccin"].'</td>
        <td>'.$row["maladieConcernees_vaccin"].'</td>
        <td>'.$row["dateInjection_vaccin"].'</td>
        <td>'.$row["lieu_vaccin"].'</td>
        <td>'.$row["veterinaire"].'</td>
        <td>'.$row["signature_vaccin"].'</td>
    </tr>';
 }
$html .= '</table> </div>';

// Ajout du contenu au document PDF
$mpdf->WriteHTML($html);

// Générer le PDF
$mpdf->Output("Carnet_Vaccination_Equide$idSire.pdf",'I'); // 'I' pour l'afficher dans une fenetre et 'D' pour le télécharger directement
