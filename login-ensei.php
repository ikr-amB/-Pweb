<?php
session_start();
require 'config.php';

$erreur = "";

if (isset($_POST['login'])) {

    // Nettoyage (cours)
    $nom = htmlentities(trim($_POST['nom']));
    $prenom = htmlentities(trim($_POST['prenom']));
    $password = htmlentities($_POST['password']);

    // Protection injection SQL
    $nom = mysqli_real_escape_string($conn, $nom);
    $prenom = mysqli_real_escape_string($conn, $prenom);
   

    // Requête
    $sql = "SELECT * FROM enseignants 
            WHERE nom='$nom' AND prenom='$prenom'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        // Vérification mot de passe
        if ($password == $user['password']) {

            $_SESSION['id'] = $user['id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['role'] = "enseignant";

            header("Location: enseignant.php");
            exit;

        } else {
        $erreur = "Nom,prénom ou mot de passe incorrect";
    }
    }
}
?>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>USTHB - Connexion</title>
  
   <link rel="stylesheet" href="CSS/login-ensei.css">

</head>
<body>

<!-- TOPBAR -->
<div class="topbar">
  <span>USTHB — Faculté d'Informatique — 2025/2026</span>
  <a href="login-ensei.php">Connexion</a>
</div>

<!-- NAVBAR -->
<nav>
  <a href="Accueil.php" class="nav-logo">
    <img src="img2/télécharger.jpg" alt="USTHB">
    <div>
      <span class="title">Université des sciences et de la technologie Houari-Boumédiène</span>
      <span class="sub">Système de Gestion de Scolarité</span>
    </div>
  </a>
  <div class="nav-links">
    <a href="apropos.php">À propos</a>
    <a href="login-ensei.php" class="btn-login active">Se connecter</a>
  </div>
</nav>

<!-- FORMULAIRE -->
<div class="login-section">
  <div class="login-box">
    <h2>Connexion Enseignant</h2>
    <p>Accédez à votre espace personnel</p>

    <?php if (!empty($erreur)): ?>
      <div class="erreur"><?= $erreur ?></div>
    <?php endif; ?>

    <form method="POST" action="login-ensei.php">

      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required>
      </div>

      <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prenom" required>
      </div>

      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
      </div>

      <button type="submit" name="login" class="btn-login">
        Se connecter
      </button>

    </form>
  </div>
</div>

</body>
</html>