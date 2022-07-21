<?php
session_start();
require_once("pdo.php");

$email = $_POST["email"] ?? "";
$_SESSION["email"]= $email;

if (isset($_POST["delete"]) && isset($_POST["autos_id"])>0 && is_numeric($_POST["autos_id"])>0) {
    $sql = "DELETE FROM autos WHERE autos_id =" . $_POST["autos_id"];

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":autos_id" => $_POST["autos_id"]
    ]);
}

$stmt = $pdo->query("SELECT * FROM autos");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression...</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php
        echo '<p>Confirmer la suppression</p>';
        ?>
        <form method="POST">
            <input type="number" name="autos_id" id="autos_id">
            <button type="submit" name="delete" id="delete">Supprimer</button>
            <?php
            if (isset($_POST["delete"])) {
                header('Location: ./index.php');
                return;
            }
            ?>
            <a href="./index.php">Annuler</a>
        </form>
    </div>


</body>

</html>