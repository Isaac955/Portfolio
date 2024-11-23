<?php
include_once("../admin/mysqli_connect.php");
include_once("header.php");
class Projet {
    private $link; // Connexion à la base de données

    private $targetDirectory; // Répertoire cible où les fichiers seront téléchargés

    // Constructeur de la classe
    public function __construct($link, $targetDirectory)
    {
        $this->link = $link; // Initialisation de la connexion à la base de données
        $this->targetDirectory = $targetDirectory; // Initialisation du répertoire cible
    }

    // Méthode pour ajouter un nouveau projet
    public function ajouterProjet($projectLangages, $projectDescription, $projectImage, $projectLink)
    {
        // Chemin complet du fichier cible
        $targetFile = $this->targetDirectory . basename($projectImage["name"]);

        // Déplacement du fichier téléchargé vers le répertoire cible
        if (move_uploaded_file($projectImage["tmp_name"], $targetFile)) {
            // Requête SQL pour insérer les informations du nouveau projet dans la base de données
            $sql = "INSERT INTO projects (project_langages, project_description, project_image, project_link) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($this->link, $sql); // Préparation de la requête SQL

            // Vérification si la préparation de la requête a réussi
            if ($stmt) {
                // Liaison des paramètres à la requête SQL
                mysqli_stmt_bind_param($stmt, "ssss", $projectLangages, $projectDescription, $targetFile, $projectLink);
                
                // Exécution de la requête SQL
                mysqli_stmt_execute($stmt);
                
                // Affichage du message de succès
                echo "Nouveau projet ajouté avec succès.";
            } else {
                // Affichage de l'erreur si la préparation de la requête a échoué
                echo "Erreur lors de la préparation de la requête.";
            }
        } else {
            // Affichage de l'erreur si le téléchargement du fichier a échoué
            echo "Une erreur s'est produite lors du téléchargement de votre fichier.";
        }
    }
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $project_langages = $_POST['project_langages'];
    $project_description = $_POST['project_description'];
    $project_link = $_POST['project_link'];

    // Crée une instance de la classe Projet
    $projet = new Projet($link, "../assets/imgs/");

    // Appel de la méthode pour ajouter le projet avec l'image
    $projet->ajouterProjet($project_langages, $project_description, $_FILES["project_image"], $project_link);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'ajout de projet</title>
    <link rel="stylesheet" href="../assets/ressources/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h1>Ajouter un projet</h1>
<form method="post" action="ajout.php" enctype="multipart/form-data">
    <div>
        <label for="project_langages">Langages utilisés :</label>
        <input type="text" id="project_langages" name="project_langages" required>
    </div>
    <div>
        <label for="project_description">Description du projet :</label>
        <textarea id="project_description" name="project_description" rows="4" required></textarea>
    </div>
    <div>
        <label for="project_image">Image du projet :</label>
        <input type="file" id="project_image" name="project_image" accept="image/*" required>
    </div>
    <div>
        <label for="project_link">Lien du projet :</label>
        <input type="text" id="project_link" name="project_link">
    </div>
    <div>
        <button type="submit">Ajouter projet</button>
    </div>
</form>
</body>
</html>
