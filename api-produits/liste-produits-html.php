<?php
include_once "include/config.php";
$mysqli = new mysqli($host, $username, $password, $database);

// Vérifier la connexion
if ($mysqli->connect_errno) {
    echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
    exit();
} else {
    echo "Connexion réussie!!";
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Tableau des produits</title>
</head>

<body>
    <h1>Tableau des produits</h1>

    <?php
    $res = $mysqli->query("SELECT * FROM `produits` WHERE 1");

    echo "<table class='table'>";

    // Affichage de l'entête du tableau
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Nom</th>";
    echo "<th>Description</th>";
    echo "<th>Prix</th>";

    echo "</tr>";

    while ($row = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nom"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["prix"] . "</td>";

        echo "</tr>";
    }
    echo "</table>";
    ?>


</body>

</html>