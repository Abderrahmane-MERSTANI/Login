<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = trim($_POST["nom"]);
    $prenom = trim($_POST["prenom"]);
    $login = trim($_POST["login"]);
    $password = trim($_POST["password"]);
    $repassword = trim($_POST["repassword"]);

    // Vérification des mots de passe
    if ($password !== $repassword) {
        $error = "Les mots de passe ne sont pas les mêmes.";
    } else {
        try{
        $pdo = new PDO("mysql:host=localhost;dbname=inscription","root","");   // poo = le nome du dossier du projet
        }
        catch(PDOExeption $e){
        echo $e->getMessage();
        }
        $req = $pdo->prepare("insert into inscription (nom,prenom,login,password)values(?,?,?,?)");  //requet MySQL pour l'insersion des information dans la base de donnees
        $req->execute(array("$nom","$prenom","$login",md5("$password")));

        // Redirection vers login.php
        header("Location: authentification.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="inscription.css"/>
</head>
<body>

<div class="container">
    <h2>Inscription</h2>
    <form method="POST">
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="text" name="prenom" placeholder="Prénom" required>
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="password" name="repassword" placeholder="Retapez le mot de passe" required>
        <button type="submit" name="inscription">S'inscrire</button>
    </form>
</div>

</body>
</html>
