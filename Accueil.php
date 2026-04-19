<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>USTHB</title>

  <link rel="stylesheet" href="CSS/Accueil.css">

  <style>
    .hero {
   position: relative;
   height: 580px;
   background: url('img2/photo_2026-03-13_22-59-59.jpg') center/cover no-repeat;
   display: flex;
   align-items: flex-end;
    }
  </style>

</head>



<body>

<!-- TOPBAR -->
<div class="topbar">   
<div class="gauche">
     <span>USTHB — Faculté d'Informatique — 2025/2026</span>
</div>
<div="droitre">
  <a href="#acces">Connexion</a> <!-- ✅ CHANGÉ -->
  </div>
</div>

<!-- NAVBAR -->
<nav>
  <a href="index.php" class="nav-logo">
    <img src="img2/télécharger.jpg" alt="USTHB">
    <div>
      <span class="title">Université des sciences et de la technologie Houari-Boumédiène</span>
      <span class="sub">Système de Gestion de Scolarité</span>
    </div>
  </a>
  <div class="nav-links">
    <a href="Accueil.php" class="active">Accueil</a>
    <a href="apropos.php">À propos</a>
    <a href="#acces" class="btn-login">Se connecter</a> 
  </div>
</nav>

<!-- HERO -->
<div class="hero">
  <div class="hero-overlay"></div>
  <div class="hero-bloc">
    <h1>Bienvenue sur la plateforme de scolarité de l'USTHB</h1>
    <p>Gérez facilement les étudiants, les modules et les notes de la Faculté d'Informatique depuis un seul espace.</p>
    <a href="#acces">› Se connecter maintenant</a> <
  </div>
</div>

<!-- CARDS -->
<div class="section" id="acces"> 
  <div class="section-header">
    <h2>Qui peut accéder ?</h2>
    <div class="line"></div>
  </div>
  <div class="cards">
    <div class="card">
      <div class="card-num">
     <img src="img2/; (4).png" alt="Étudiant" class="card-img">
    </div>
      <h3>Etudiant</h3>
      <p>Consultez vos notes, votre moyenne générale et téléchargez votre relevé de notes.</p>
      <a href="login.php" class="card-link">› Accéder</a>
    </div>
    <div class="card">
      <div class="card-num">
     <img src="img2/Design sans titre.png" alt="Étudiant" class="card-img">
    </div>
      <h3>Enseignant</h3>
      <p>Gérez vos modules et saisissez les notes de vos étudiants facilement.</p>
      <a href="login-ensei.php" class="card-link">› Accéder</a>
    </div>
    <div class="card">
      <div class="card-num">
     <img src="img2/Design sans titre (1).png" alt="Étudiant" class="card-img">
    </div>
      <h3>Administrateur</h3>
      <p>Gérez l'ensemble du système : inscriptions, modules, notes et utilisateurs.</p>
      <a href="login.php" class="card-link">› Accéder</a>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div class="footer-col">
      <h4>GesScol USTHB</h4>
      <p>Système de gestion de scolarité de la Faculté d'Informatique de l'USTHB.</p>
    </div>
    <div class="footer-col">
      <h4>Liens rapides</h4>
      <a href="Accueil.php">Accueil</a>
      <a href="#acces">Connexion</a>
      <a href="apropos.php">À propos</a>
    </div>
    <div class="footer-col">
      <h4>Contact</h4>
      <a href="Accueil.php">Faculté d'Informatique</a>
      <a href="Accueil.php">USTHB, Bab Ezzouar</a>
      <a href="Accueil.php">Alger, Algérie</a>
    </div>
  </div>
  <div class="footer-bottom">
    © 2025/2026 USTHB — Faculté d'Informatique — Module PWEB — 2ème Année INFO-ISIL
  </div>
</footer>

</body>
</html>