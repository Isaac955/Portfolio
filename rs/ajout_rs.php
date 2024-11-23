<?php
include_once("../admin/mysqli_connect.php");
include_once("../project/header.php");


class SocialMedia {
    private $link;

    public function __construct($link)
    {
        $this->link = $link;
    }

    public function ajouterReseauSocial($name, $iconClass, $url)
    {

        $sql = "INSERT INTO social_media (name, icon_class, url) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($this->link, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $name, $iconClass, $url);
            mysqli_stmt_execute($stmt);

            echo "Nouveau réseau social ajouté avec succès.";
        } else {
            echo "Erreur lors de la préparation de la requête.";
        }
    }
}


// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $name = $_POST['name'];
    $iconClass = $_POST['icon_class'];
    $url = $_POST['url'];

    // Crée une instance de la classe SocialMedia
    $socialMedia = new SocialMedia($link);

    // Appel de la méthode pour ajouter le réseau social
    $socialMedia->ajouterReseauSocial($name, $iconClass, $url);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'ajout de réseau social</title>
    <link rel="stylesheet" href="../assets/ressources/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h1>Ajouter un réseau social</h1>
<form method="post" action="ajout_rs.php">
    <div>
        <label for="name">Nom du réseau social :</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="icon_class">Classe de l'icône :</label>
        <input type="text" id="icon_class" name="icon_class" required>
    </div>
    <div>
        <label for="url">URL du réseau social :</label>
        <input type="text" id="url" name="url" required>
    </div>
    <div>
        <button type="submit">Ajouter réseau social</button>
    </div>
</form>
</body>
</html>
