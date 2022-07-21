<?php
session_start();

$email= $_POST["email"] ?? "";
$pass = isset($_POST["pass"]) ? $_POST["pass"] : '';
$message1= $_SESSION["message1"] ?? false;

$salt = 'XyZzy12\*\_';
$md5 = hash('md5', 'XyZzy12\*\_php123');
$stored_hash = "dddd5970b9fd8de3700b1db3cf7c8b2a";

if ((isset($_POST["email"]) && strlen($_POST["email"])>0) && (isset($_POST["pass"]) && strlen($_POST["pass"])>0)) {
    $md5 = hash('md5', $salt . $_POST["pass"]);
    unset($_SESSION["email"]);

    if($md5 === $stored_hash){
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["success"] = "Connecté.";
        header('Location: ./index.php?name=' . urlencode($_POST["email"]));
        return;
    }
    else{
        $_SESSION["error"] = "Mot de Passe Incorect.";
        header('Location: login.php');
        return;
    }
  }
  elseif((isset($_POST["email"]) && strlen($_POST["email"])<=0) && (isset($_POST["pass"]) && strlen($_POST["pass"])<=0)){
    $message = "Le nom d'utilisateur et le mot de passe sont requis";
  }


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Se Connecter</h1>
        <?php
        if ( isset($_SESSION['error']) ) {
            echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
            unset($_SESSION['error']);
        }
        
        echo '<p style="color:red">' . $message1 . "</p>\n";
        ?>
        <form method="POST" action="./login.php">
            <div>
                <label for="email">Nom d'Utilisateur</label>
                <input type="text" name="email" id="email">
            </div>
            <div>
                <label for="pass">Mot de Passe</label>
                <input type="password" name="pass" id="pass">
            </div>
            <button type="submit">Se Connecter</button>
            <a href="./index.php">Annuler</a>
        </form>
        <p>Pour un indice sur le mot de passe, regarder dans le code source et trouver l'indice sur le mot de passe dans les commentaires HTML</p>
        <!-- Indice : Le mot de passe est les trois caractères du nom du langage de programmation utilisé dans ce projet (en minuscule) suivi de 123 -->
    </div>


</body>

</html>