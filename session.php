<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: authentification.php");
    exit();
}

if (isset($_POST['deconnexion'])) {
    session_unset();
    session_destroy();
    header("Location: authentification.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Session</title>
    <link rel="stylesheet" href="inscription.css"/>
</head>
<body>

<div class="container">
    <h2>Bienvenue, <?= htmlspecialchars($_SESSION['user']); ?></h2>

    <form method="POST">
        <button type="submit" name="deconnexion" id="deconnexion">Déconnexion</button>
    </form>
</div>

</body>
</html>
