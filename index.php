<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>USTHB</title>

  <style>
   * { margin: 0; padding: 0; box-sizing: border-box; }
   html { scroll-behavior: smooth; } 
   body { font-family: 'Source Sans 3',Arial, sans-serif; background: #fff; color: #222; } 
    /* ===== TOPBAR ===== */
    .topbar {
      background: #003366;
      padding: 8px 60px;
      display: flex;
      justify-content: space-between;
      gap: 20px;
    }
    .topbar a {
      color: #ccc;
      text-decoration: none;
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      padding: 4px 10px;
      border: 1px solid rgba(255,255,255,0.2);
      border-radius: 3px;
    }
    .topbar span { color: #ccc; font-size: 12px; }
    .topbar a:hover { background: rgba(255,255,255,0.1); color: white; }

    /* ===== NAVBAR ===== */
    nav {
      background: white;
      padding: 0 60px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 90px;
      border-bottom: 1px solid #e0e0e0;
    }

    .nav-logo {
      display: flex;
      align-items: center;
      gap: 14px;
      text-decoration: none;
    }

    .nav-logo img {
      height: 60px;
      width: 60px;
      object-fit: contain;
    }

    .nav-logo .title {
      font-size: 20px;
      font-weight: 700;
      color: #003366;
      display: block;
      line-height: 1.2;
    }

    .nav-logo .sub {
      font-size: 12px;
      color: #888;
      display: block;
    }

    .nav-links {
      display: flex;
      align-items: center;
      height: 100%;
    }

    .nav-links a {
      color: #222;
      text-decoration: none;
      font-size: 14px;
      font-weight: 700;
      padding: 0 18px;
      height: 90px;
      display: flex;
      align-items: center;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      border-bottom: 4px solid transparent;
      transition: all 0.2s;
    }

    .nav-links a:hover {
      color: #003366;
      border-bottom: 4px solid #003366;
    }

    .nav-links a.active {
      color: #003366;
      border-bottom: 4px solid #003366;
    }

    .nav-links a.btn-login {
      background: #003366;
      color: white;
      border-radius: 4px;
      height: 42px;
      margin-left: 16px;
      padding: 0 22px;
      border-bottom: none;
      font-size: 14px;
    }

    .nav-links a.btn-login:hover {
      background: #00509e;
      border-bottom: none;
    }

   /* ===== HERO ===== */
    .hero {
  position: relative;
  height: 580px;
   background: url('img2/photo_2026-03-13_22-59-59.jpg') center/cover no-repeat;
  display: flex;
  align-items: flex-end;
    }

    .hero-bloc {
      background: #003366;
      color: white;
      padding: 40px 44px;
      max-width: 570px;
      margin: 0 0 0 60px;
      margin-bottom: 0;
    }

    .hero-bloc h1 {
      font-size: 30px;
      font-weight: 700;
      line-height: 1.3;
      margin-bottom: 16px;
    }

    .hero-bloc p {
      font-size: 15px;
      color: #aac4e8;
      line-height: 1.8;
      margin-bottom: 20px;
    }

    .hero-bloc a {
      color: white;
      font-weight: 700;
      font-size: 14px;
      text-decoration: none;
      border-bottom: 2px solid white;
      padding-bottom: 2px;
    }

    .hero-bloc a:hover { color: #aac4e8; border-color: #aac4e8; }

    /* ===== SECTION ===== */
    .section { padding: 60px; }
 
    .section-header {
      display: flex;
      align-items: center;
      gap: 16px;
      margin-bottom: 36px;
    }
 
    .section-header h2 {
      font-size: 26px;
      font-weight: 700;
      color: #003366;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
 
    .section-header .line {
      flex: 1;
      height: 2px;
      background: #003366;
    }
 
    /* ===== CARDS ===== */
    .cards {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap:  20px;
      border: none;
    }
 
    .card {
      padding: 32px 28px;
      border: 1px solid #ddd;
      border-radius: 10px;
      transition: all 0.2s;
      background: white;
    }
 
    .card:last-child { border-right:  1px solid #ddd; }
 
    .card:hover { background: #f0f4ff; }
 
   .card-img {
     width: 100px;
     height: 100px;
     display: block;
     object-fit: contain;
     margin-bottom: 12px;
    }
 
    .card h3 {
      font-size: 17px;
      font-weight: 700;
      color: #003366;
      margin-bottom: 10px;
      text-transform: uppercase;
      font-size: 13px;
      letter-spacing: 0.5px;
    }
 
    .card p {
      font-size: 14px;
      color: #555;
      line-height: 1.7;
      margin-bottom: 16px;
    }
 
    .card-link {
      color: #003366;
      font-weight: 700;
      font-size: 13px;
      text-decoration: none;
      border-bottom: 2px solid #003366;
      padding-bottom: 2px;
    }

    /* ===== FOOTER ===== */
    footer {
      background: #1a1a2e;
      color: #aaa;
      padding: 40px 60px 20px;
    }
 
    .footer-grid {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr;
      gap: 40px;
      margin-bottom: 30px;
    }
 
    .footer-col h4 {
      color: white;
      font-size: 13px;
      font-weight: 700;
      margin-bottom: 14px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
 
    .footer-col p, .footer-col a {
      font-size: 13px;
      color: #aaa;
      text-decoration: none;
      display: block;
      margin-bottom: 8px;
      line-height: 1.6;
    }
 
    .footer-col a:hover { color: white; }
 
    .footer-bottom {
      border-top: 1px solid rgba(255,255,255,0.1);
      padding-top: 20px;
      font-size: 12px;
      color: #666;
      text-align: center;
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
    <a href="index.php" class="active">Accueil</a>
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
      <a href="index.php">Accueil</a>
      <a href="#acces">Connexion</a>
      <a href="apropos.php">À propos</a>
    </div>
    <div class="footer-col">
      <h4>Contact</h4>
      <a href="index.php">Faculté d'Informatique</a>
      <a href="index.php">USTHB, Bab Ezzouar</a>
      <a href="index.php">Alger, Algérie</a>
    </div>
  </div>
  <div class="footer-bottom">
    © 2025/2026 USTHB — Faculté d'Informatique — Module PWEB — 2ème Année INFO-ISIL
  </div>
</footer>

</body>
</html>