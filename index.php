<?php
session_start();
require_once("pdo.php");

$guess = $_POST["guess"] ?? "";

if ($guess) {
    $_SESSION["guess"] = $guess;

    header("Location: index.php");
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    $email = $_POST["email"] ?? "";
    $message2 = $_SESSION["message2"] ?? false;
    $_SESSION["email"] = $email;

    if (isset($_SESSION["email"])) {
        echo '<div class="container">';
        echo '<h1>Bienvenue sur la base de données Automobiles</h1>';

        if (isset($_SESSION["message2"])) {
            echo "<p style='color: red'>" . $_SESSION["message2"] . "</p>";
            unset($_SESSION["message2"]);
        }

        if (isset($_SESSION["success"])) {
            echo "<p style='color: green'>" . $_SESSION["success"] . "</p>";
            unset($_SESSION["success"]);
        }

        $sql = "SELECT * FROM autos";

        $stmt = $pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo '<tbody>';
        echo '
        <tr>
            <th>Autos_id</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Année</th>
            <th>Kilométrage</th>
            <th>Action</th>
        </tr>';

        foreach ($rows as $row) {
            $tab = <<<EOL
                            <tr>
                                <td>{$row["autos_id"]}</td>
                                <td>{$row["make"]}</td>
                                <td>{$row["model"]}</td>
                                <td>{$row["year"]}</td>
                                <td>{$row["mileage"]}</td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="autos_id" value="Action">
                                        <a href="./edit.php?autos_id=181">Éditer</a> / <a href="./delete.php?autos_id=181">Supprimer</a>
                                    </form>
                                </td>
                            </tr>
                            EOL;
            echo $tab;
        }
        echo '</tbody>';
        echo "</table>";
        echo "<br>";
        if (isset($_SESSION["edit"]) && isset($_SESSION["email"])) {
            header("Location: ./edit.php");
            return;
        } elseif (isset($_SESSION["delete"]) && isset($_SESSION["email"])) {
            header("Location: ./delete.php");
            return;
        }

        echo "Pas de lignes trouvées";
        echo '<p><a href="./add.php">Ajouter Une Nouvelle Entrée</a></p>';
        echo '<a href="./logout.php">Se Déconnecter</a>';

        echo '</div>';
    } else {
        echo '<div class="container">';
        echo '<h1>Bienvenue sur la base de données Automobiles</h1>';
        echo '<a href="./login.php">Connectez-vous</a>';
        echo "<p>Essayer d'" . '<a href="./add.php">ajouter des données</a> sans se connecter</p>';
        echo '</div>';
    }

    ?>


</body>

</html>