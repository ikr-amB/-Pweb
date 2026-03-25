
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>USTHB</title>

  <style>
   * { margin: 0; padding: 0; box-sizing: border-box; }
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


    /* bloc coloré comme Paris-Saclay */
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
  </style>
</head>

<body>
<!-- TOPBAR -->
<div class="topbar">   
<div class="gauche">
     <span>USTHB — Faculté d'Informatique — 2025/2026</span>
</div>
<div="droitre">
  <a href="login.php">Connexion</a>
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
    <a href="login.php" class="btn-login">Se connecter</a>
  </div>
</nav>

<!-- HERO -->
<div class="hero">
  <div class="hero-overlay"></div>
  <div class="hero-bloc">
    <h1>Bienvenue sur la plateforme de scolarité de l'USTHB</h1>
    <p>Gérez facilement les étudiants, les modules et les notes de la Faculté d'Informatique depuis un seul espace.</p>
    <a href="login.php">› Se connecter maintenant</a>
  </div>
</div>

</body>
</html>