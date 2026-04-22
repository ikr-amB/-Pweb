<?php

session_start();
include 'config.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $matricule = $_POST['matricule'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, "SELECT * FROM etudiants WHERE matricule = ?");
    mysqli_stmt_bind_param($stmt, "s", $matricule);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && $password == $user['password']) {
        $_SESSION['user_id'] = $user['matricule'];
        $_SESSION['role'] = 'etudiant';
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        header("Location: indexetud.php");
        exit();
    } else {
        $error = "matricule ou mot de passe incorrect.";
    }
}
?>

<html  lang="fr" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Connexion  USTHB</title>
     <link rel="stylesheet" href="CSS/loginEtud.css">
</head>
<body>
<!-- TOPBAR -->
<div class="topbar">   
<div class="gauche">
     <span>USTHB  Faculte d'Informatique  2025/2026</span>
</div>
<div="droitre">
  <a href="loginEtud.php">Connexion </a>
  </div>
</div>

<!-- NAVBAR -->
<nav>
  <a href="Accueil.php" class="nav-logo">
    <img src="img2/télécharger.jpg" alt="USTHB">
    <div>
      <span class="title">Universite des sciences et de la technologie Houari-Boumediene</span>
      <span class="sub">Systeme de Gestion de Scolarite</span>
    </div>
  </a>
  <div class="nav-links">
    <a href="Accueil.php" class="active">Accueil</a>
    <a href="loginEtud.php" class="btn-login">Se connecter</a>
  </div>
</nav>

<div class="login-wrapper">
    <div class="login-card">
        <h2>Connexion Etudiant</h2>
        <p>Entrez vos identifiants pour acceder a votre espace</p>

        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="loginEtud.php">
            <label>Matricule</label>
           <input type="text" name="matricule" placeholder="Entrez votre matricule" required>

            <label>Mot de passe</label>
            <input type="password" name="password" placeholder="Entrez votre mot de passe" required>

            <button type="submit">Se connecter</button>
        </form>

    </div>
</div>

</body>
</html>