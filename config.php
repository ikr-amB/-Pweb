<?php
$serveur = "localhost";
$user = "root";
$password = "";
$base = "sys-gestion";

// Connexion
$conn = mysqli_connect($serveur, $user, $password, $base);

if (!$conn) {
    die("Erreur connexion : " . mysqli_connect_error());
}
?>