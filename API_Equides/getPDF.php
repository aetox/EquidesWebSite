<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../INCLUDES/vendor/autoload.php'; // chemin d'accès au fichier Mpdf autoload.php
require('Database.php');


header('Content-type: application/json');
header('Content-Disposition: attachment; filename="carnet_de_transport.pdf"');

$idDetenteur = $_GET['idDetenteur'];

$json = json_decode(file_get_contents('php://input'), true);


$getEcurieInfo = $bdd->prepare("SELECT id_registre, nom_ecurie FROM `registre_equide` WHERE id_detenteur= ?");
$getEcurieInfo->execute(array($idDetenteur));


if ($getEcurieInfo->rowCount() > 0 ) {
	 while( $user = $getEcurieInfo->fetch(PDO::FETCH_ASSOC)){

		$idRegistre = $user['id_registre'];
		$nomEcurie = $user['nom_ecurie'];

	}
}

$getEquideInfo= $bdd->prepare(
"SELECT equide.nom AS nomEquide, fiche_transport.date_depart AS date_depart, fiche_transport.date_arrivee AS date_arrivee, fiche_transport.lieu_depart AS lieu_depart,
fiche_transport.lieu_arrivee AS lieu_arrivee, fiche_transport.motif_deplacement AS motif_deplacement
FROM `fiche_transport`
JOIN `equide`
ON fiche_transport.id_equide=equide.id_equide
WHERE id_registre= ?");

$getEquideInfo->execute(array($idRegistre));


$dateDuJour = date('j-m-y');

// Créer un objet Mpdf
$mpdf = new \Mpdf\Mpdf();
$mpdf->debug = true;
// Ajout d'une nouvelle page en mode paysage
$mpdf->AddPage(''); // 'L' pour mettre le PDF en paysage

$mpdf->SetTitle("Carnet de transport de l'ecurie : $nomEcurie ");



// Ajouter des infos tels :
// -	Nom detenteur
// -	Num SIRE
// - 	Num UELN
// ...


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
            
			ul{
				padding-top : 20px;
				font-family: Arial, sans-serif;
				font-weight: bold;
				

			}
            
			div#table{

				padding-top:40px;
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
			<h1>Carnet de transport de l\'ecurie '.$nomEcurie.'</h1>

';


	$html .= '
			<ul>
	   <li>Nom de l\'ecurie : '.$nomEcurie.'</li>
	   <li>Date du document : '.date("d/m/y", strtotime($dateDuJour)).'</li>
	</ul>';



$html .='
	
		<div id="table">
		<table border="1">
			<tr>
				<th>Nom de l\'equide </th>
				<th>Date de départ</th>
                <th>Date d\'arrivée</th>
                <th>Lieu de départ</th>
                <th>Lieu d\'arrivée</th>
                <th>Motif de déplacement</th>
			</tr>


';


// Génération des données du tableau en utilisant une boucle while




//Génération des données du tableau en utilisant une boucle while
 while($row = $getEquideInfo->fetch(PDO::FETCH_ASSOC)) {
    $nomEquide = $row["nomEquide"];
    $date_depart = date("d/m/y", strtotime($row['date_depart']));
    $date_arrivee = date("d/m/y", strtotime($row['date_arrivee']));
    $lieu_depart = $row["lieu_depart"];
    $lieu_arrivee = $row["lieu_arrivee"];
    $motif_deplacement = $row["motif_deplacement"];

$html .= '
	<tr>
	   <td>'.$nomEquide.'</td>
	   <td>'.$date_depart.'</td>
	   <td>'.$date_arrivee.'</td>
	   <td>'.$lieu_depart.'</td>
	   <td>'.$lieu_arrivee.'</td>
       <td>'.$motif_deplacement.'</td>
	</tr>';
}
$html .= '</table> </div>';

// Ajout du contenu au document PDF
$mpdf->WriteHTML($html);

// Générer le PDF
$mpdf->Output("Carnet_Transport.pdf",'I'); // 'I' pour l'afficher dans une fenetre et 'D' pour le télécharger directement
