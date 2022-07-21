<?php 
session_start();
require_once("pdo.php");

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
    }
}

$rows = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST["edit"]) && isset($_POST["autos_id"])>0 && isset($_POST["make"])>0 && isset($_POST["model"])>0 && isset($_POST["year"])>0 && isset($_POST["mileage"])>0){
    $sql= "UPDATE autos SET autos_id = :autos_id, make = :make, model = :model, year = :year, mileage = :mileage ";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([
        ":autos_id" => $_POST["autos_id"],
        ":make" => $_POST["make"],
        ":model" => $_POST["model"],
        ":year" => $_POST["year"],
        ":mileage" => $_POST["mileage"]
    ]);
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
    <div class="container">
        <h1>Modifier une automobile</h1>
        <form method="POST">
            <div>
                <label for="make">Marque :</label>
                <input type="text" name="make" id="make" value="hdfjidh">
            </div>
            <div>
                <label for="model">Modèle :</label>
                <input type="text" name="model" id="model" value="kdfhjjd">
            </div>
            <div>
                <label for="year">Année :</label>
                <input type="text" name="year" id="year" value="45677">
            </div>
            <div>
                <label for="mileage">Kilométrage :</label>
                <input type="text" name="mileage" id="mileage" value="986567">
            </div>
            <button type="submit" name="edit">Sauvegarder</button>
            <?php
            if (isset($_POST["edit"])) {
                header('Location: ./index.php');
                return;
            }
            ?>
            <button type="submit" name="cancel">Annuler</button>
        </form>
    </div>


</body>

</html>