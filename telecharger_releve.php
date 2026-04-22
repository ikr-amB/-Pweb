<?php
session_start();
include 'config.php';
require('fpdf/fpdf.php');

// Vérification session
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'etudiant') {
    header("Location: loginEtud.php");
    exit();
}

$id = $_SESSION['user_id'];

// ===== INFOS ETUDIANT =====
$res = mysqli_query($conn, "SELECT * FROM etudiants WHERE matricule = '$id'");
if (!$res) {
    die("Erreur SQL (etudiants) : " . mysqli_error($conn));
}
$e = mysqli_fetch_assoc($res);

// ===== NOTES =====
$res_notes = mysqli_query($conn, "
    SELECT m.`nom-module` AS nom_module, m.coefficient, n.note
    FROM notes n
    JOIN modules m ON n.`id-module` = m.id
    WHERE n.matricule = '$id'
");

if (!$res_notes) {
    die("Erreur SQL (notes) : " . mysqli_error($conn));
}

// ===== CALCUL =====
$notes = [];
$total_points = 0;
$total_coeffs = 0;

while ($row = mysqli_fetch_assoc($res_notes)) {
    $notes[] = $row;
    $total_points += $row['note'] * $row['coefficient'];
    $total_coeffs += $row['coefficient'];
}

$moyenne = ($total_coeffs > 0) ? round($total_points / $total_coeffs, 2) : 0;
$statut  = ($moyenne >= 10) ? 'Admis' : 'Ajourné';

// ===== PDF =====
$pdf = new FPDF();
$pdf->AddPage();

// Titre
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,utf8_decode('Relevé de Notes'),0,1,'C');

$pdf->Ln(5);

// Infos étudiant
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,8,utf8_decode('Matricule : '.$e['matricule']),0,1);
$pdf->Cell(0,8,utf8_decode('Nom : '.$e['nom']),0,1);
$pdf->Cell(0,8,utf8_decode('Prénom : '.$e['prenom']),0,1);

$pdf->Ln(5);

// Tableau
$pdf->SetFont('Arial','B',12);
$pdf->Cell(70,10,utf8_decode('Module'),1);
$pdf->Cell(30,10,'Coef',1);
$pdf->Cell(30,10,'Note',1);
$pdf->Cell(40,10,utf8_decode('Statut'),1);
$pdf->Ln();

$pdf->SetFont('Arial','',12);

foreach ($notes as $n) {
    $pdf->Cell(70,10,utf8_decode($n['nom_module']),1);
    $pdf->Cell(30,10,$n['coefficient'],1);
    $pdf->Cell(30,10,$n['note'],1);
    $pdf->Cell(40,10,utf8_decode($n['note'] >= 10 ? 'Validé' : 'Non validé'),1);
    $pdf->Ln();
}

// Moyenne
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('Moyenne : '.$moyenne.' / 20'),0,1);
$pdf->Cell(0,10,utf8_decode('Statut : '.$statut),0,1);

// Télécharger PDF
$pdf->Output('D', 'releve_notes.pdf');
exit;
?>