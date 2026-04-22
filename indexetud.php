<?php
session_start();
include 'config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'etudiant') {
    header("Location: loginEtud.php");
    exit();
}

$id = $_SESSION['user_id'];

// Infos personnelles
$res = mysqli_query($conn, "SELECT * FROM etudiants WHERE matricule = '$id'");

if (!$res) {
    die("Erreur SQL (etudiants) : " . mysqli_error($conn));
}

$e = mysqli_fetch_assoc($res);

// Notes
$res_notes = mysqli_query($conn, "
    SELECT m.`nom-module` AS nom_module, m.coefficient, n.note
    FROM notes n
    JOIN modules m ON n.`id-module` = m.id
    WHERE n.matricule = '$id'
");

if (!$res_notes) {
    die("Erreur SQL (notes) : " . mysqli_error($conn));
}

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
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon espace – USTHB</title>
    <link rel="stylesheet" href="CSS/indexetud.css">
</head>
<body>

<!-- TOPBAR -->
<div class="topbar">
  <div class="gauche">
    <span>USTHB — Faculté d'Informatique — 2025/2026</span>
  </div>
  <div>
    <a href="Accueil.php">Déconnexion</a>
  </div>
</div>

<!-- NAVBAR -->
<nav>
  <a href="indexetud.php" class="nav-logo">
    <img src="img2/télécharger.jpg" alt="USTHB">
    <div>
      <span class="title">Université des sciences et de la technologie Houari-Boumédiène</span>
      <span class="sub">Système de Gestion de Scolarité</span>
    </div>
  </a>
  <div class="nav-links">
    <a href="Accueil.php" class="btn-login">Déconnexion</a>
  </div>
</nav>

<div class="container">
    <div class="sidebar">
        <a>Mon tableau de bord</a>
        <a href="loginEtud.php" class="logout">Déconnexion</a>
    </div>

    <main>
        <h2>Mes informations personnelles</h2>
        <table class="info-table">
            <tr><td>Matricule</td><td><?php echo $e['matricule']; ?></td></tr>
            <tr><td>Nom</td><td><?php echo $e['nom']; ?></td></tr>
            <tr><td>Prénom</td><td><?php echo $e['prenom']; ?></td></tr>
        </table>

        <h2>Relevé de notes</h2>
        <table class="notes">
            <thead>
                <tr><th>Module</th><th>Coefficient</th><th>Note /20</th><th>Statut</th></tr>
            </thead>
            <tbody>
                <?php foreach ($notes as $n): ?>
                <tr>
                    <td><?php echo $n['nom_module']; ?></td>
                    <td><?php echo $n['coefficient']; ?></td>
                    <td><?php echo number_format($n['note'], 2); ?></td>
                    <td><?php echo ($n['note'] >= 10) ? '<span class="valide">Validé</span>' : '<span class="nonvalide">Non validé</span>'; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Moyenne générale</td>
                    <td><?php echo number_format($moyenne, 2); ?> / 20</td>
                    <td class="<?php echo ($moyenne >= 10) ? 'valide' : 'nonvalide'; ?>"><?php echo $statut; ?></td>
                </tr>
            </tfoot>
        </table>

       <a href="telecharger_releve.php" class="btn">TÉLÉCHARGER MON RELEVÉ DE NOTES</a>
    </main>
</div>

</body>
</html>