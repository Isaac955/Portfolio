<?php

include_once ("mysqli_connect.php");
// Vérification des informations de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérification des identifiants
    if ($username === '347999' && $password === 'mysql95') {
        // Authentification réussie
        echo "Vous êtes connecté au back office";
        // Redirection vers la page d'accueil
        header('Location: ../project/header.php');
        exit;
    } else {
        // Authentification échouée
        echo "Identifiants invalides. Veuillez réessayer.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>

<h2>Connexion</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<link rel="stylesheet" href="../assets/ressources/themify-icons/css/themify-icons.css">
<link rel="stylesheet" href="../assets/css/style.css">
    <div>
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <button type="submit">Se Connecter</button>
    </div>
</form>

</body>
</html>
