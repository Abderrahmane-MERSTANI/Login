<?php 
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $login = trim($_POST["login"]);
    $password = trim($_POST["password"]);
    
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=inscription","root","");   // poo = le nome du dossier du projet
    }
    catch(PDOExeption $e){
        echo $e->getMessage();
    }
    $req = $pdo->prepare("SELECT * FROM inscription WHERE login=? AND password=?");
    $req->execute([$login, md5("$password")]);

    $user = $req->fetch(PDO::FETCH_ASSOC);

    if ($user) {

        header("Location: session.php");
        exit();
    } else {
        $error = "Login ou mot de passe incorrect.";
    }
    
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Authentification</title>
    <link rel="stylesheet" href="authentification.css"/>
</head>
<body>

<div class="container">
    <h2>Inscription</h2>
    <?php if (!empty($error)) : ?>
        <p style="color:red; text-align:center;"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit" name="lelogin" id="lelogin">Login</button>
    </form>
</div>

</body>
</html>
