<?php

//Permet d'avoir le numéro de l'equidé séléctionné
$idSire = $_GET['sire'];

require_once '../../INCLUDES/vendor/autoload.php'; // chemin d'accès au fichier Mpdf autoload.php

require('../other_functions/connexion_bdd.php');

$sql = "SELECT traitement.id_traitement AS id_traitement, traitement.nom AS nom_traitement, acte.date AS date_acte, acte.details AS detail_acte
FROM `equide`
JOIN `en_pension`
ON equide.id_equide=en_pension.id_equide
JOIN `registre_equide`
ON en_pension.id_registre=registre_equide.id_registre
JOIN `acte`
ON registre_equide.id_registre=acte.id_registre
JOIN `type_acte`
ON acte.id_type_acte=type_acte.id_type_acte
JOIN `traitement`
ON type_acte.id_traitement=traitement.id_traitement

WHERE sire ='$idSire' "; //ORDER BY `date_traitement` DESC

$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

$sql2 = "SELECT * FROM `equide` WHERE sire ='$idSire'"; 
$result2 = mysqli_query($mysqli,$sql2) or die(mysqli_error($mysqli));

$dateDuJour = date('j-m-y');

// Créer un objet Mpdf
$mpdf = new \Mpdf\Mpdf();
$mpdf->debug = true;
// Ajout d'une nouvelle page en mode paysage
$mpdf->AddPage(''); // 'L' pour mettre le PDF en paysage

$mpdf->SetTitle("Carnet de vermifuge de l'équidé n°$idSire");



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
			<h1>Carnet de traitement de l\'équidé n°'.$idSire.'</h1>

';

while($row2 = mysqli_fetch_assoc($result2)) {
	$html .= '
			<ul>
	   <li>Numéro SIRE :  '.$row2["sire"].'</li>
	   <li>Numéro UELN : '.$row2["ueln"].'</li>
	   <li>Date de naissance : '.$row2["date_naissance"].'</li>
	   <li>Sexe : '.$row2["sexe"].'</li>
	   <li>Date du document : '.$dateDuJour.'</li>
	</ul>';
}


$html .='
	
		<div id="table">
		<table border="1">
			<tr>
				<th>Id </th>
				<th>Molécule traitement</th>
				<th>Référence traitement</th>
				<th>Date</th>
				<th>Commentaire</th>
			</tr>


';


// Génération des données du tableau en utilisant une boucle while




// Génération des données du tableau en utilisant une boucle while
 while($row = mysqli_fetch_assoc($result)) {
	$html .= '
	<tr>
	   <td>'.$row["id_traitement"].'</td>
	   <td>'.$row["nom_traitement"].'</td>
	   <td>'.$row["id_traitement"].'</td>
	   <td>'.date("d/m/y", strtotime($row['date_acte'])).'</td>
	   <td>'.$row["detail_acte"].'</td>
	</tr>';
}
$html .= '</table> </div>';

// Ajout du contenu au document PDF
$mpdf->WriteHTML($html);

// Générer le PDF
$mpdf->Output("Carnet_Traitement_Equide$idSire.pdf",'I'); // 'I' pour l'afficher dans une fenetre et 'D' pour le télécharger directement