<?php
include_once("../admin/mysqli_connect.php");
include_once("header.php");

class Projet {
    private $link;
    private $targetDirectory;

    public function __construct($link, $targetDirectory)
    {
        $this->link = $link;
        $this->targetDirectory = $targetDirectory;
    }

    public function ajouterProjet($projectLangages, $projectDescription, $projectImage, $projectLink)
    {
        $targetFile = $this->targetDirectory . basename($projectImage["name"]);

        if (move_uploaded_file($projectImage["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO projects (project_langages, project_description, project_image, project_link) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($this->link, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssss", $projectLangages, $projectDescription, $targetFile, $projectLink);
                mysqli_stmt_execute($stmt);

                echo "Nouveau projet ajouté avec succès.";
            } else {
                echo "Erreur lors de la préparation de la requête.";
            }
        } else {
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
