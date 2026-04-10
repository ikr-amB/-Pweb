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


    /*======login=======*/
   .login-section {
      display: flex;
     justify-content: center;
     align-items: center;
     min-height: 80%;
    }

   .login-box {
     background: white;
     border: 1px solid #ddd;
     border-radius: 12px;
     padding: 40px;
     width: 380px;
     box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }

   .login-box h2 {
     color: #003366;
     font-size: 22px;
     margin-bottom: 6px;
    }

   .login-box p {
     color: #888;
     font-size: 13px;
     margin-bottom: 24px;
    }

  
   .form-group {
     margin-bottom: 16px;
    }

   .form-group label {
     display: block;
     font-size: 13px;
     font-weight: 600;
     color: #003366;
     margin-bottom: 6px;
    }
  
   .form-group input {
     width: 100%;
     padding: 10px 14px;
     border: 1px solid #ddd;
     border-radius: 8px;
     font-size: 14px;
     outline: none;
    }

   .form-group input:focus {
     border-color: #003366;
    }

   .btn-login {
     width: 100%;
     padding: 12px;
     background: #003366;
     color: white;
     border: none;
     border-radius: 8px;
     font-size: 15px;
     font-weight: 600;
     cursor: pointer;
     margin-top: 8px;
    } 

    .btn-login a{
      color: #ddd;
      text-decoration: none;
    }

   .btn-login:hover {
     background: #00214d;
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
  <a href="index.php">Connexion</a> 
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
    <a href="index.php" class="btn-login">Se connecter</a> 
  </div>
</nav>

<!--login-->
<div class="login-section">
  <div class="login-box">
    <h2>Connexion Enseignant</h2>
    <p>Accédez à votre espace personnel</p>

    <div class="form-group">
      <label for="name">Nom</label>
      <input type="text" id="name" placeholder="Entrez votre nom">
    </div>

    <div class="form-group">
      <label for="username">Prenom</label>
      <input type="text" id="username" placeholder="entrez votre prenom">
     </div>
     <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" id="password" placeholder="Entrez votre mot de passe">
    </div>

    <button class="btn-login"><a href="enseignant.php">Connecter</a></button>
  </div>
</div>


</body>