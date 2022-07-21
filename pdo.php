<?php
$host = "localhost";
$user ="root";
$password = "";
$dbname = "automobile_db";

$dsn = "mysql:host=$host;dbname=$dbname";

try{
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e){
    echo "Exception message";
    $e->getMessage();
}

if(isset($_POST["add"]) && isset($_POST["make"]) && isset($_POST["model"]) && isset($_POST["year"]) && is_numeric($_POST["year"]) && isset($_POST["mileage"]) && is_numeric($_POST["mileage"])){
    $sql= "INSERT INTO autos (make, model, year, mileage) VALUE (:make, :model, :year, :mileage)";

    $stmt= $pdo->prepare($sql);

    $stmt->execute([
        ":make" => $_POST["make"],
        ":model" => $_POST["model"],
        ":year" => $_POST["year"],
        ":mileage" => $_POST["mileage"]
    ]);
}

if(isset($_POST["make"]) && isset($_POST["model"]) && isset($_POST["year"]) && isset($_POST["mileage"])){
    $sql= "SELECT * FROM autos";

    $stmt= $pdo->prepare($sql);

    $stmt->execute([
        
        ":make" => $_POST["make"],
        ":model" => $_POST["model"],
        ":year" => $_POST["year"],
        ":mileage" => $_POST["mileage"]
    ]);
}

if(isset($_POST["edit"]) && isset($_POST["make"])>0 && isset($_POST["model"])>0 && isset($_POST["year"])>0 && is_numeric($_POST["year"])>0 && isset($_POST["mileage"])>0 && is_numeric($_POST["mileage"])>0){
    $sql= "UPDATE autos SET make = :make, model = :model, year = :year, mileage = :mileage";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([
        ":make" => $_POST["make"],
        ":model" => $_POST["model"],
        ":year" => $_POST["year"],
        ":mileage" => $_POST["mileage"]
    ]);
}

if (isset($_POST["delete"]) && isset($_POST["autos_id"])>0 && is_numeric($_POST["autos_id"])>0) {
    $sql = "DELETE FROM autos WHERE autos_id =" . $_POST["autos_id"];

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":autos_id" => $_POST["autos_id"]
    ]);
}

$stmt = $pdo->query("SELECT * FROM autos");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
