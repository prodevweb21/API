<?php
header("Content-Type: application/json");
include_once "include/config.php";

if (!isset($_GET["id"])) {
    echo "Identifiant manquant";
    exit();
}

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_errno) {
    echo "Échec de connexion à la base de données MySQL:  " . $mysqli->connect_error;
    exit();
}

if ($requete = $mysqli->prepare("SELECT * FROM `produits` WHERE id=?")) {

    $requete->bind_param("i", $_GET["id"]);
    $requete->execute();
    $resultat_requete = $requete->get_result();
    $objet = $resultat_requete->fetch_assoc();
    echo json_encode($objet, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    $requete->close();
}
$mysqli->close();
