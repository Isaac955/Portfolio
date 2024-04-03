<?php
// Inclure le fichier de connexion à la base de données
include_once("../admin/mysqli_connect.php");
include_once("header.php");

class ModificationProjet {
    private $link;
    private $targetDirectory;

    public function __construct($link, $targetDirectory)
    {
        $this->link = $link;
        $this->targetDirectory = $targetDirectory;
    }

    public function modifierProjet($id, $projectLangages, $projectDescription, $projectLink, $projectImage)
    {
        $targetFile = $this->targetDirectory . basename($projectImage["name"]);

        if (move_uploaded_file($projectImage["tmp_name"], $targetFile)) {
            $sql = "UPDATE projects SET project_langages = ?, project_description = ?, project_link = ?, project_image = ? WHERE id = ?";
            $stmt = mysqli_prepare($this->link, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssssi", $projectLangages, $projectDescription, $projectLink, $targetFile, $id);
                if (mysqli_stmt_execute($stmt)) {
                    echo "Projet modifié avec succès.";
                } else {
                    echo "Erreur lors de la modification du projet : " . mysqli_stmt_error($stmt);
                }
            } else {
                echo "Erreur lors de la préparation de la requête : " . mysqli_error($this->link);
            }
        } else {
            echo "Une erreur s'est produite lors du téléchargement de votre fichier.";
        }
    }
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    $project_langages = $_POST['project_langages'];
    $project_description = $_POST['project_description'];
    $project_link = $_POST['project_link'];
    $project_image = $_FILES["project_image"];

    // Créer une instance de ModificationProjet
    $modificationProjet = new ModificationProjet($link, "../assets/imgs/");

    // Appeler la méthode pour modifier le projet
    $modificationProjet->modifierProjet($id, $project_langages, $project_description, $project_link, $project_image);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modification de projet</title>
    <link rel="stylesheet" href="../assets/ressources/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h1>Modifier un projet</h1>
<form method="post" action="modif.php" enctype="multipart/form-data">
    <div>
        <label for="id">ID du projet à modifier :</label>
        <input type="text" id="id" name="id" required>
    </div>
    <div>
        <label for="project_langages">Langages utilisés :</label>
        <input type="text" id="project_langages" name="project_langages" required>
    </div>
    <div>
        <label for="project_description">Description du projet :</label>
        <textarea id="project_description" name="project_description" rows="4" required></textarea>
    </div>
    <div>
        <label for="project_link">Lien du projet :</label>
        <input type="text" id="project_link" name="project_link">
    </div>
    <div>
        <label for="project_image">Image du projet :</label>
        <input type="file" id="project_image" name="project_image" accept="image/*">
    </div>
    <div>
        <button type="submit">Modifier projet</button>
    </div>
</form>

</body>
</html>
