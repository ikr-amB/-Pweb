<?php
// ===== VÉRIFICATION SESSION =====
session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'enseignant') {
    header("Location: login-ensei.php");
    exit;
}

require 'config.php';

// ===== RÉCUPÉRATION DES DONNÉES =====
$matricule = isset($_POST['matricule']) ? trim($_POST['matricule']) : '';
$id_module = isset($_POST['id_module']) ? intval($_POST['id_module']) : 0;
$note_raw  = $_POST['note'] ?? '';
$action    = $_POST['action'] ?? '';

// ===== VALIDATION =====
if ($matricule === '' || $id_module === 0 || $note_raw === '') {
    header("Location: enseignant.php?msg=erreur#notes");
    exit;
}

if (!is_numeric($note_raw)) {
    header("Location: enseignant.php?msg=erreur#notes");
    exit;
}

$note = floatval($note_raw);

if ($note < 0 || $note > 20) {
    header("Location: enseignant.php?msg=erreur#notes");
    exit;
}

// ===== SÉCURISATION =====
$matricule = mysqli_real_escape_string($conn, $matricule);

// ===== VÉRIFIER SI LA NOTE EXISTE =====
$sql_check = "SELECT * FROM notes 
              WHERE matricule = '$matricule' 
              AND `id-module` = $id_module";

$res_check = mysqli_query($conn, $sql_check);

if (!$res_check) {
    die("Erreur SQL (check) : " . mysqli_error($conn));
}

if (mysqli_num_rows($res_check) > 0) {
    // ===== UPDATE =====
    $sql = "UPDATE notes 
            SET note = '$note'
            WHERE matricule = '$matricule' 
            AND `id-module` = $id_module";
} else {
    // ===== INSERT =====
    $sql = "INSERT INTO notes (matricule, `id-module`, note)
            VALUES ('$matricule', $id_module, '$note')";
}

// ===== EXÉCUTION =====
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erreur SQL : " . mysqli_error($conn));
}

// ===== REDIRECTION =====
header("Location: enseignant.php?msg=succes#notes");
exit;
?>