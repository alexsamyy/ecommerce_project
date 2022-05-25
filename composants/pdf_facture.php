<?php
require('fpdf.php');
require_once "../composants/db.php";

$cost_order = $_POST["cost_order"];
$nb_order = $_POST["nb_order"];
$id_order = substr($nb_order, 1, 4);
$id_user = $_GET["id"];

$pdf = new FPDF('P', 'mm', 'A4');

$pdf->SetAutoPagebreak(False);
$pdf->SetMargins(0, 0, 0);

$pdf->AddPage();

//LOGO
$pdf->Image('../media/logo_fonemarket.jpg', 10, 10, 40, 40);

//NUMERO DE COMMANDE
$num_fact = "COMMANDE " . $nb_order;
$pdf->SetLineWidth(0.1);
$pdf->SetFillColor(192);
$pdf->Rect(120, 15, 85, 8, "DF");
$pdf->SetXY(120, 15);
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(85, 8, $num_fact, 0, 0, 'C');

//DATE FACTURE 
$champ_date = $_POST["date_order"];
$pdf->SetFont('Arial', '', 11);
$pdf->SetXY(122, 30);
$pdf->Cell(60, 8, "PARIS, le " . $champ_date, 0, 0, '');

// adr fact du client
$select = "select * from utilisateur where ID_UTILISATEUR =" . $id_user;
$result = mysqli_query($db, $select);
$row_client = mysqli_fetch_row($result);
mysqli_free_result($result);
$pdf->SetFont('Arial', 'B', 11);
$x = 110;
$y = 50;
$pdf->SetXY($x, $y);
$y += 4;
if ($row_client[1]) {
    $pdf->SetXY($x, $y);
    $pdf->Cell(100, 8, utf8_decode($row_client[1]), 0, 0, '');
    $y += 4;
}
if ($row_client[2]) {
    $pdf->SetXY($x, $y);
    $pdf->Cell(100, 8, utf8_decode($row_client[2]), 0, 0, '');
    $y += 4;
}
if ($row_client[3]) {
    $pdf->SetXY($x, $y);
    $pdf->Cell(100, 8, utf8_decode($row_client[3]), 0, 0, '');
    $y += 4;
}

// TABLEAU DES PRODUITS ACHETES
// cadre avec 18 lignes max ! et 118 de hauteur --> 95 + 118 = 213 pour les traits verticaux
$pdf->SetLineWidth(0.1);
$pdf->Rect(5, 95, 200, 118, "D");
// cadre titre des colonnes
$pdf->Line(5, 105, 205, 105);
// les traits verticaux colonnes
$pdf->Line(145, 95, 145, 213);
$pdf->Line(158, 95, 158, 213);
$pdf->Line(176, 95, 176, 213);
$pdf->Line(187, 95, 187, 213);
// titre colonne
$pdf->SetXY(1, 96);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(140, 8, utf8_decode("Libellé"), 0, 0, 'C');
$pdf->SetXY(145, 96);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(13, 8, utf8_decode("Qté"), 0, 0, 'C');
$pdf->SetXY(156, 96);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(22, 8, "PU HT", 0, 0, 'C');
$pdf->SetXY(177, 96);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(10, 8, "TVA", 0, 0, 'C');
$pdf->SetXY(185, 96);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(22, 8, "TOTAL TTC", 0, 0, 'C');

//ARTICLES ACHETES
$pdf->SetFont('Arial', '', 8);
$y = 97;

//CHERCHE LES INFORMATIONS DANS LA TABLE DETAIL_COMMANDE
$sql_detail_commande = "SELECT * FROM detail_commande WHERE ID_Commande = $id_order";
$result_detail_commande = mysqli_query($db, $sql_detail_commande);
$array_detail_commande = mysqli_fetch_all($result_detail_commande, MYSQLI_ASSOC);

$total = 20;

foreach ($array_detail_commande as $detail_order) {

    //MYSQL SELECT INFORMATION TABLE SMARTPHONE ONLY
    $id_this_product = $detail_order["ID_Article"];

    $requete_info = "SELECT * FROM smartphone WHERE '$id_this_product' = ID";
    $info = mysqli_query($db, $requete_info);
    $row = mysqli_fetch_array($info);

    //MYSQL SELECT COLOUR INFORMATION TABLE COULEUR ONLY
    $ID_COL = $row["ID_COULEUR"];
    $requete_couleur = "SELECT c.COULEUR FROM couleur c WHERE $ID_COL = c.ID_COULEUR";
    $couleur = mysqli_query($db, $requete_couleur);
    $row_couleur = mysqli_fetch_array($couleur);

    // ASK FOR MARQUE ID 
    $id_marque = $row["ID_MARQUE"];

    $ID_MARQUE_request = "SELECT MARQUE FROM marque WHERE ID_MARQUE = $id_marque";
    $req_res = mysqli_query($db, $ID_MARQUE_request);
    $row_marque = mysqli_fetch_array($req_res);

    // LIBELLE
    $pdf->SetXY(7, $y + 9);
    $pdf->Cell(140, 5, utf8_decode($row['NOM'] . ' ' . $row_marque['MARQUE'] . ' ' . $row_couleur["COULEUR"] . ' ' . $row['STOCKAGE'] . " Go"), 0, 0, 'L');
    // QUANTITE
    $pdf->SetXY(145, $y + 9);
    $pdf->Cell(13, 5, ($detail_order['Qte']), 3, ' ', true, 0, 0, 'R');
    // PRIX UNITAIRE
    $nombre_format_francais = number_format($row['PRIX'] * 0.80, 2, ',', ' ');
    $pdf->SetXY(158, $y + 9);
    $pdf->Cell(18, 5, $nombre_format_francais, 0, 0, 'R');
    // TAXE
    $nombre_format_francais = number_format($row['PRIX'] * 0.20, 2, ',', ' ');
    $pdf->SetXY(177, $y + 9);
    $pdf->Cell(10, 5, $nombre_format_francais, 0, 0, 'R');
    // TOTAL
    $nombre_format_francais = number_format($row['PRIX'] * $detail_order['Qte'], 2, ',', ' ');
    $pdf->SetXY(187, $y + 9);
    $pdf->Cell(18, 5, $nombre_format_francais, 0, 0, 'R');

    $pdf->Line(5, $y + 14, 205, $y + 14);

    $y += 6;

    $total_cost_quantity = $row['PRIX'] * $detail_order['Qte'];
    $total += $total_cost_quantity;
}

if ($cost_order < $total) {
    // ---------------------- PROMOTION ----------------------
    // LIBELLE
    $pdf->SetXY(7, $y + 9);
    $pdf->Cell(140, 5, utf8_decode("PROMOTION"), 0, 0, 'L');
    // QUANTITE
    $pdf->SetXY(145, $y + 9);
    $pdf->Cell(13, 5, '1', 3, ' ', true, 0, 0, 'R');
    // PRIX UNITAIRE
    $pdf->SetXY(158, $y + 9);
    $pdf->Cell(18, 5, 'NULL', 0, 0, 'R');
    // TAXE
    $pdf->SetXY(177, $y + 9);
    $pdf->Cell(10, 5, 'NULL', 0, 0, 'R');
    // TOTAL
    $pdf->SetXY(187, $y + 9);
    $pdf->Cell(18, 5, '-' . ($total - 20) / 100 * 10, 0, 0, 'R');

    $pdf->Line(5, $y + 14, 205, $y + 14);

    $y += 6;
    // --------------------------------------------------------
}

// -------------- FRAIS DE LIVRAISON ----------------------
// LIBELLE
$pdf->SetXY(7, $y + 9);
$pdf->Cell(140, 5, utf8_decode("FRAIS DE LIVRAISON"), 0, 0, 'L');
// QUANTITE
$pdf->SetXY(145, $y + 9);
$pdf->Cell(13, 5, '1', 3, ' ', true, 0, 0, 'R');
// PRIX UNITAIRE
$nombre_format_francais = number_format($row['PRIX'] * 0.80, 2, ',', ' ');
$pdf->SetXY(158, $y + 9);
$pdf->Cell(18, 5, 16, 0, 0, 'R');
// TAXE
$pdf->SetXY(177, $y + 9);
$pdf->Cell(10, 5, 4, 0, 0, 'R');
// TOTAL
$pdf->SetXY(187, $y + 9);
$pdf->Cell(18, 5, "20", 0, 0, 'R');

$pdf->Line(5, $y + 14, 205, $y + 14);

$y += 6;
// --------------------------------------------------------

$nombre_format_francais =  iconv("UTF-8", "CP1252", "Net à payer TTC : " . $cost_order);

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(25, 213);
$pdf->Cell(90, 8, $nombre_format_francais, 0, 0, 'C');

// PIED DE LA PAGE
$y1 = 270;

$pdf->SetFont('Arial', '', 10);

$pdf->SetXY(1, $y1 + 4);
$pdf->Cell($pdf->GetPageWidth(), 5, utf8_decode("FoneMarket SAS"), 0, 0, 'C');

$pdf->SetXY(1, $y1 + 8);
$pdf->Cell($pdf->GetPageWidth(), 5, utf8_decode("17 rue Linné, 75005 Paris France"), 0, 0, 'C');

$pdf->SetXY(1, $y1 + 12);
$pdf->Cell($pdf->GetPageWidth(), 5, utf8_decode("+33 1 54 00 00 00 contact@fonemarket.fr"), 0, 0, 'C');

$pdf->Output('D', 'facture_'.$nb_order.'.pdf');
