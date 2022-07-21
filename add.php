<?php
session_start();
require_once("pdo.php");

$email = $_POST["email"] ?? "";
$message2 = $_SESSION["message2"] ?? false;

$make = $_POST["make"] ?? "";
$model = $_POST["model"] ?? "";
$year = $_POST["year"] ?? "";
$mileage = $_POST["mileage"] ?? "";

if ($make && $model && $year && $mileage) {
    $_SESSION["email"] = $email;

    if (isset($_POST["make"]) < 1 && isset($_POST["model"]) < 1 && isset($_POST["year"]) < 1 && isset($_POST["mileage"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } elseif (isset($_POST["make"]) < 1 && isset($_POST["model"]) < 1 && isset($_POST["year"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } elseif (isset($_POST["model"]) < 1 && isset($_POST["year"]) < 1 && isset($_POST["mileage"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } elseif (isset($_POST["make"]) < 1 && isset($_POST["year"]) < 1 && isset($_POST["mileage"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } elseif (isset($_POST["make"]) < 1 && isset($_POST["model"]) < 1 && isset($_POST["mileage"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } elseif (isset($_POST["make"]) < 1 && isset($_POST["model"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } elseif (isset($_POST["year"]) < 1 && isset($_POST["mileage"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } elseif (isset($_POST["model"]) < 1 && isset($_POST["year"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } elseif (isset($_POST["make"]) < 1 && isset($_POST["year"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } elseif (isset($_POST["model"]) < 1 && isset($_POST["mileage"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } elseif (isset($_POST["make"]) < 1 && isset($_POST["mileage"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } elseif (isset($_POST["make"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } elseif (isset($_POST["model"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } elseif (isset($_POST["year"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } elseif (isset($_POST["mileage"]) < 1) {
        $_SESSION["message2"] = "Tous les champs sont requis";
    } else {
        if(is_numeric($_POST["year"])>0 && is_numeric($_POST["mileage"])>0){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION["success"] = "Enregistrement ajouté";
            header("Location: ./index.php");
            return;
            }
        }else{
            echo " L'année et le Kilomètrage doivent être des nombres";
        }
        // header("Location: index.php");

    }
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (!isset($_SESSION["email"])) {
        die("ACCÈS REFUSÉ");
    }

    ?>
    <div class="container">
        <?php echo '<h1>Ajouter une automobile pour ' . $_SESSION["email"] . '</h1>'; ?>
        <?php
        if (isset($_SESSION["message2"])) {
            echo "<p style='color: red'>" . $_SESSION["message2"] . "</p>";
            unset($_SESSION["message2"]);
        }

        if (isset($_POST["cancel"])) {
            header("Location: ./index.php");
            return;
        }
        ?>
        <form method="POST">
            <div>
                <label for="make">Marque :</label>
                <input type="text" name="make" id="make">
            </div>
            <div>
                <label for="model">Modèle :</label>
                <input type="text" name="model" id="model">
            </div>
            <div>
                <label for="year">Année :</label>
                <input type="text" name="year" id="year">
            </div>
            <div>
                <label for="mileage">Kilométrage :</label>
                <input type="text" name="mileage" id="mileage">
            </div>
            <button type="submit" name="add" id="add">Ajouter</button>
            <button type="submit" name="cancel">Annuler</button>
        </form>
    </div>

</body>

</html>