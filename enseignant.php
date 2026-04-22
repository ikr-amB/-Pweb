<?php
// ===== VÉRIFICATION SESSION =====
session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'enseignant') {
    header("Location: login-ensei.php");
    exit;
}

$nom           = $_SESSION['nom'];
$prenom        = $_SESSION['prenom'];
$id_enseignant = $_SESSION['id'];
$initiales     = strtoupper(substr($prenom, 0, 1) . substr($nom, 0, 1));

require 'config.php';

$msg = isset($_GET['msg']) ? $_GET['msg'] : '';

// ===== MODULES =====
$sql_modules = "SELECT * FROM modules WHERE id_enseignant = $id_enseignant";
$res_modules = mysqli_query($conn, $sql_modules);
if (!$res_modules) { die("Erreur modules : " . mysqli_error($conn)); }
$nb_modules = mysqli_num_rows($res_modules);

// ===== LISTE ÉTUDIANTS =====
$sql_liste_etudiants = "
    SELECT DISTINCT e.matricule, e.nom, e.prenom
    FROM etudiants e
    ORDER BY e.nom, e.prenom
";
$res_liste_etudiants = mysqli_query($conn, $sql_liste_etudiants);
if (!$res_liste_etudiants) { die("Erreur etudiants : " . mysqli_error($conn)); }
$nb_etudiants    = mysqli_num_rows($res_liste_etudiants);
$liste_etudiants = [];
while ($etu = mysqli_fetch_assoc($res_liste_etudiants)) {
    $liste_etudiants[] = $etu;
}

// ===== NOTES : jointure correcte via modules.id = notes.id-module =====
$sql_notes = "
    SELECT e.matricule, e.nom, e.prenom,
           m.id AS id_module, m.code, m.`nom-module`,
           n.note
    FROM etudiants e
    CROSS JOIN modules m
    LEFT JOIN notes n ON n.matricule = e.matricule AND n.`id-module` = m.id
    WHERE m.id_enseignant = $id_enseignant
    ORDER BY e.nom, m.code
";
$res_notes = mysqli_query($conn, $sql_notes);
if (!$res_notes) { die("Erreur notes : " . mysqli_error($conn)); }

$nb_notes_saisies = 0;
$lignes_notes     = [];
while ($ligne = mysqli_fetch_assoc($res_notes)) {
    if ($ligne['note'] !== null) { $nb_notes_saisies++; }
    $lignes_notes[] = $ligne;
}
$total_lignes = count($lignes_notes);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>USTHB – Interface Enseignant</title>
  <link rel="stylesheet" href="CSS/enseignant.css">
</head>
<body>



<!-- TOPBAR -->
<div class="topbar">
  <div class="gauche">
    <span>USTHB — Faculté d'Informatique — 2025/2026</span>
  </div>
  <div>
    <a href="login-ensei.php">Déconnexion</a>
  </div>
</div>

<!-- NAVBAR -->
<nav>
  <a href="enseignant.php" class="nav-logo">
    <img src="img2/télécharger.jpg" alt="USTHB">
    <div>
      <span class="title">Université des sciences et de la technologie Houari-Boumédiène</span>
      <span class="sub">Système de Gestion de Scolarité</span>
    </div>
  </a>
  <div class="nav-links">
    <a href="login-ensei.php" class="btn-login">Déconnexion</a>
  </div>
</nav>

<!-- LAYOUT -->
<div class="layout">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="profil">
      <div class="avatar"><?= $initiales ?></div>
      <div class="nom-profil"><?= $prenom . ' ' . $nom ?></div>
    </div>
    <ul>
      <li>
        <a href="#" id="lien-modules" onclick="afficherPage('modules', this)">
          Mes Modules
        </a>
      </li>
      <li>
        <a href="#" id="lien-etudiants" onclick="afficherPage('etudiants', this)">
          Liste Étudiants
        </a>
      </li>
      <li>
        <a href="#" id="lien-notes" onclick="afficherPage('notes', this)">
          Saisir Notes
        </a>
      </li>
      <li>
        <a href="login-ensei.php">Déconnexion</a>
      </li>
    </ul>
  </aside>

  <!-- CONTENU -->
  <main class="contenu">

    <!-- ========== PAGE 1 : MES MODULES ========== -->
    <div id="modules" class="page actif">

      <div class="titre-page">Mes Modules</div>
      <div class="sous-titre">Modules dont vous êtes responsable cette année</div>

      <div class="stats">
        <div class="stat">
          <div class="label">Modules</div>
          <div class="valeur"><?= $nb_modules ?></div>
        </div>
        <div class="stat">
          <div class="label">Étudiants</div>
          <div class="valeur"><?= $nb_etudiants ?></div>
        </div>
        <div class="stat">
          <div class="label">Notes saisies</div>
          <div class="valeur"><?= $nb_notes_saisies ?></div>
        </div>
      </div>

      <div class="carte">
        <div class="carte-entete">
          <h2>Liste des modules</h2>
        </div>
        <table>
          <thead>
            <tr>
              <th>Code</th>
              <th>Intitulé</th>
              <th>Coefficient</th>
            </tr>
          </thead>
          <tbody>
            <?php
            mysqli_data_seek($res_modules, 0);
            while ($mod = mysqli_fetch_assoc($res_modules)) {
                echo "
                <tr>
                    <td><span class='badge-module'>" . $mod['code'] . "</span></td>
                    <td>" . $mod['nom-module'] . "</td>
                    <td>" . $mod['coefficient'] . "</td>
                </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>

    </div><!-- fin page modules -->


    <!-- ========== PAGE 2 : LISTE ÉTUDIANTS ========== -->
    <div id="etudiants" class="page">

      <div class="titre-page">Liste des Étudiants</div>
      <div class="sous-titre">Tous les étudiants inscrits dans le système</div>

      <div class="stats">
        <div class="stat">
          <div class="label">Total étudiants</div>
          <div class="valeur"><?= $nb_etudiants ?></div>
        </div>
      </div>

      <div class="carte">
        <div class="carte-entete">
          <h2>Liste des étudiants</h2>
          <input
            type="text"
            id="rechercheEtu"
            class="recherche"
            placeholder="Nom, prénom, matricule..."
            onkeyup="rechercherDans('corpsEtudiants', 'rechercheEtu', 'aucunEtu')"
          >
        </div>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Matricule</th>
              <th>Nom</th>
              <th>Prénom</th>
            </tr>
          </thead>
          <tbody id="corpsEtudiants">
            <?php
            $num = 1;
            foreach ($liste_etudiants as $etu) {
                echo "
                <tr>
                    <td>{$num}</td>
                    <td>{$etu['matricule']}</td>
                    <td>{$etu['nom']}</td>
                    <td>{$etu['prenom']}</td>
                </tr>";
                $num++;
            }
            ?>
          </tbody>
        </table>
        <div class="aucun" id="aucunEtu">Aucun étudiant trouvé.</div>
      </div>

    </div><!-- fin page etudiants -->


    <!-- ========== PAGE 3 : SAISIR NOTES ========== -->
    <div id="notes" class="page">

      <div class="titre-page">Saisir les Notes</div>
      <div class="sous-titre">Entrez la note et cliquez sur Ajouter ou Modifier.</div>

      <?php if ($msg === 'succes') : ?>
        <div class="message succes" style="display:block;"> Note enregistrée avec succès.</div>
      <?php elseif ($msg === 'erreur') : ?>
        <div class="message erreur" style="display:block;"> Erreur : note invalide (doit être entre 0 et 20).</div>
      <?php endif; ?>

      <div class="stats">
        <div class="stat">
          <div class="label">Notes saisies</div>
          <div class="valeur"><?= $nb_notes_saisies ?></div>
        </div>
        <div class="stat">
          <div class="label">En attente</div>
          <div class="valeur"><?= $total_lignes - $nb_notes_saisies ?></div>
        </div>
      </div>

      <div class="carte">
        <div class="carte-entete">
          <h2>Saisie des notes</h2>
          <input
            type="text"
            id="rechercheNotes"
            class="recherche"
            placeholder="Nom, prénom, matricule..."
            onkeyup="rechercherDans('corpsNotes', 'rechercheNotes', 'aucunNote')"
          >
        </div>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Matricule</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Module</th>
              <th>Note (/20)</th>
              <th>Statut</th>
              <th>État</th>
            </tr>
          </thead>
          <tbody id="corpsNotes">
            <?php
            $numero = 1;
            foreach ($lignes_notes as $ligne) {

                $matricule  = $ligne['matricule'];
                $nom_etu    = $ligne['nom'];
                $prenom_etu = $ligne['prenom'];
                $id_module  = $ligne['id_module']; // ✅ l'id entier du module
                $code       = $ligne['code'];       // pour affichage badge
                $note       = $ligne['note'];

                if ($note === null) {
                    $valeur_champ = '';
                    $action       = 'ajouter';
                    $btn_texte    = '&#10133; Ajouter';
                    $btn_bg       = '#1da462';
                    $statut       = '<span class="badge-attente">En attente</span>';
                    $point        = '<span class="point orange"></span>';
                } elseif ($note >= 10) {
                    $valeur_champ = $note;
                    $action       = 'modifier';
                    $btn_texte    = '&#128190; Modifier';
                    $btn_bg       = '#e8a020';
                    $statut       = '<span class="badge-admis">Admis</span>';
                    $point        = '<span class="point vert"></span>';
                } else {
                    $valeur_champ = $note;
                    $action       = 'modifier';
                    $btn_texte    = '&#128190; Modifier';
                    $btn_bg       = '#e8a020';
                    $statut       = '<span class="badge-ajourne">Ajourné</span>';
                    $point        = '<span class="point rouge"></span>';
                }

                echo "
                <tr>
                    <td>$numero</td>
                    <td>$matricule</td>
                    <td>$nom_etu</td>
                    <td>$prenom_etu</td>
                    <td><span class='badge-module'>$code</span></td>
                    <td>
                        <form method='POST' action='enregistrer-note.php'
                              style='display:flex; gap:5px; align-items:center;'>
                            <input type='hidden' name='matricule' value='$matricule'>
                            <input type='hidden' name='id_module' value='$id_module'>
                            <input type='hidden' name='action'    value='$action'>
                            <input type='number' name='note'
                                   value='$valeur_champ'
                                   min='0' max='20' step='0.25'
                                   placeholder='—'
                                   style='width:65px; padding:4px 6px;
                                          border:2px solid #003366;
                                          border-radius:4px; font-size:12px;
                                          background:#f0f5ff; text-align:center;'>
                            <button type='submit'
                                    style='padding:5px 10px; background:$btn_bg;
                                           color:white; border:none; border-radius:4px;
                                           font-size:12px; font-weight:bold; cursor:pointer;'>
                                $btn_texte
                            </button>
                        </form>
                    </td>
                    <td>$statut</td>
                    <td>$point</td>
                </tr>";
                $numero++;
            }
            ?>
          </tbody>
        </table>
        <div class="aucun" id="aucunNote">Aucun résultat trouvé.</div>
      </div>

    </div><!-- fin page notes -->

  </main>
</div>

<script src="JS/enseignant.js" defer></script>

</body>
</html>