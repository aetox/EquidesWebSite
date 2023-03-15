<?php


// Appel de la librairie FPDF
require("../fpdf/fpdf.php");
// Si base de données en UTF-8, il faudra utiliser la fonction utf8_decode() pour tous les champs de texte à afficher

// extraction des données à
// tableau des résultats de la ligne > $data_voyageur['nom_champ']

//Permet d'avoir le numéro de l'equidé séléctionné
$idSire = $_GET['numSIRE'];

class PDF extends FPDF {
	// Header
	function Header() {

        //Définit la varibale $idSire
        global $idSire;
        
		// Logo : 8 >position à gauche du document (en mm), 2 >position en haut du document, 80 >largeur de l'image en mm). La hauteur est calculée automatiquement.
		$this->Image('../../ASSETS/ico/ico.png',2,2,30,30);
		// Saut de ligne 20 mm
		$this->Ln(10);

		// Titre gras (B) police Helbetica de 11
		$this->SetFont('Helvetica','B',20,);
		// fond de couleur gris (valeurs en RGB)
		$this->setFillColor(207, 113, 3);
        //Met la couleur du texte en blanc
        $this->SetTextColor( 255 , 255, 255);
 		// position du coin supérieur gauche par rapport à la marge gauche (mm)
		$this->SetX(55);
		// Texte : 60 >largeur ligne, 8 >hauteur ligne. Premier 0 >pas de bordure, 1 >retour à la ligneensuite, C >centrer texte, 1> couleur de fond ok	
        $this->Cell(200, 20, "Carnet de traitement de l'équidé n°$idSire", 70, 1, 'C', 1);
		// Saut de ligne 10 mm
		$this->Ln(10);		
	}
	// Footer
	function Footer() {
		// Positionnement à 1,5 cm du bas
		$this->SetY(-15);
		// Police Arial italique 8
		$this->SetFont('Helvetica','I',9);
		// Numéro de page, centré (C)
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}


// On active la classe une fois pour toutes les pages suivantes
// Format portrait (>P) ou paysage (>L), en mm (ou en points > pts), A4 (ou A5, etc.)
$pdf = new PDF('L','mm','A4');

// Nouvelle page A4 (incluant ici logo, titre et pied de page)
$pdf->AddPage();
// Polices par défaut : Helvetica taille 9
$pdf->SetFont('Helvetica','',9);
// Couleur par défaut : noir
$pdf->SetTextColor(0);
// Compteur de pages {nb}
$pdf->AliasNbPages();


// Sous-titre calées à gauche, texte gras (Bold), police de caractère 11
$pdf->SetFont('Helvetica','B',11);
// couleur de fond de la cellule : gris clair
$pdf->setFillColor(230,230,230);
// Cellule avec les données du sous-titre sur 2 lignes, pas de bordure mais couleur de fond grise

// Fonction en-tête des tableaux en 3 colonnes de largeurs variables
function entete_table($position_entete) {
	global $pdf;
	$pdf->SetDrawColor(183); // Couleur du fond RVB
	$pdf->SetFillColor(221); // Couleur des filets RVB
	$pdf->SetTextColor(0); // Couleur du texte noir
	$pdf->SetY($position_entete);
	// position de colonne 1 (10mm à gauche)	
	$pdf->SetX(40);
	$pdf->Cell(30,8,'ID',1,0,'C',1);	// 60 >largeur colonne, 8 >hauteur colonne
	// position de la colonne 2 (70 = 10+60)
	$pdf->SetX(70); 
	$pdf->Cell(50,8,'Molécule traitement',1,0,'C',1);
	// position de la colonne 3 (130 = 70+60)
	$pdf->SetX(120); 
	$pdf->Cell(50,8,'Référence traitement',1,0,'C',1);

    $pdf->SetX(170); 
	$pdf->Cell(30,8,'Date',1,0,'C',1);

    $pdf->SetX(200); 
	$pdf->Cell(60,8,'Commentaire',1,0,'C',1);

	$pdf->Ln(); // Retour à la ligne
}
// AFFICHAGE EN-TÊTE DU TABLEAU
// Position ordonnée de l'entête en valeur absolue par rapport au sommet de la page (60 mm)
$position_entete = 70;
// police des caractères
$pdf->SetFont('Helvetica','',9);
$pdf->SetTextColor(0);
// on affiche les en-têtes du tableau
entete_table($position_entete);

$position_detail = 78; // Position ordonnée = $position_entete+hauteur de la cellule d'en-tête (60+8)

$sql = "SELECT * FROM `traitement` WHERE sire ='$idSire'";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($result) > 0) {      

    while($traitement = mysqli_fetch_array($result)){ 

        $pdf->SetY($position_detail);
        $pdf->SetX(40);
        $pdf->MultiCell(30,8,mb_convert_encoding($traitement['id_traitement'], 'UTF-8', mb_list_encodings()),1,'C');
        // position abcisse de la colonne 2 (70 = 10 + 60)	
        $pdf->SetY($position_detail);
        $pdf->SetX(70); 
        $pdf->MultiCell(50,8,mb_convert_encoding($traitement['molecule_traitement'],'ISO-8859-1', 'UTF-8'),1,'C');
        // position abcisse de la colonne 3 (130 = 70+ 60)
        $pdf->SetY($position_detail);
        $pdf->SetX(120); 
        $pdf->MultiCell(50,8,$traitement['reference_traitement'],1,'C');
        // position abcisse de la colonne 3 (190 = 130+ 60)
        $pdf->SetY($position_detail);
        $pdf->SetX(170); 
        $pdf->MultiCell(30,8,$traitement['date_traitement'],1,'C');
       // position abcisse de la colonne 3 (250 = 190+ 60)
       $pdf->SetY($position_detail);
       $pdf->SetX(200); 
       $pdf->MultiCell(60,8,$traitement['commentaire_traitement'],1,'C');
   
        // on incrémente la position ordonnée de la ligne suivante (+8mm = hauteur des cellules)	
        $position_detail += 8; 

       }
    }else {
        echo("Vous n'avez pas enregistré de traitement");
    }

$pdf->Output('test.pdf','I'); // affichage à l'écran
// Ou export sur le serveur
// $pdf->Output('F', '../test.pdf');
?>
