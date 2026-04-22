 window.addEventListener('load', function () {
    var hash = window.location.hash;
    if (hash === '#notes') {
      afficherPage('notes', document.getElementById('lien-notes'));
    } else if (hash === '#etudiants') {
      afficherPage('etudiants', document.getElementById('lien-etudiants'));
    } else {
      document.getElementById('lien-modules').classList.add('actif');
    }
  });

  function afficherPage(idPage, lienClique) {
    document.querySelectorAll('.page').forEach(function(p) {
      p.classList.remove('actif');
    });
    document.querySelectorAll('.sidebar a').forEach(function(a) {
      a.classList.remove('actif');
    });
    document.getElementById(idPage).classList.add('actif');
    if (lienClique) { lienClique.classList.add('actif'); }
  }

  function rechercherDans(idCorps, idChamp, idAucun) {
    var txt    = document.getElementById(idChamp).value.toLowerCase();
    var lignes = document.getElementById(idCorps).getElementsByTagName('tr');
    var nb     = 0;
    for (var i = 0; i < lignes.length; i++) {
      if (lignes[i].textContent.toLowerCase().indexOf(txt) > -1) {
        lignes[i].style.display = '';
        nb++;
      } else {
        lignes[i].style.display = 'none';
      }
    }
    document.getElementById(idAucun).style.display = nb === 0 ? 'block' : 'none';
  }