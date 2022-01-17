<?php
header('Content-Type: application/json');
include_once "include/config.php";
$mysqli = new mysqli($host, $username, $password, $database);

// Vérifier la connexion
if ($mysqli->connect_errno) {
    echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
    exit();
} else {
    echo "Connexion réussie!!";
}


$resultat_requete = $mysqli->query("SELECT `id`, `nom`, `description`, `prix` FROM `produits`");

$donnees_tableau = $resultat_requete->fetch_all(MYSQLI_ASSOC);
echo json_encode($donnees_tableau);

// Fermeture de la connexion
$mysqli->close();
