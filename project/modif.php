<?php
// Inclure le fichier de connexion à la base de données
include_once("../admin/mysqli_connect.php");
include_once("header.php");

class ModificationProjet {
    private $link; // Connexion à la base de données

    private $targetDirectory; // Répertoire cible où les fichiers seront téléchargés

    // Constructeur de la classe
    public function __construct($link, $targetDirectory)
    {
        $this->link = $link; // Initialisation de la connexion à la base de données
        $this->targetDirectory = $targetDirectory; // Initialisation du répertoire cible
    }

    // Méthode pour modifier un projet
    public function modifierProjet($id, $projectLangages, $projectDescription, $projectLink, $projectImage)
    {
        // Chemin complet du fichier cible
        $targetFile = $this->targetDirectory . basename($projectImage["name"]);

        // Déplacement du fichier téléchargé vers le répertoire cible
        if (move_uploaded_file($projectImage["tmp_name"], $targetFile)) {
            // Requête SQL pour mettre à jour les informations du projet dans la base de données
            $sql = "UPDATE projects SET project_langages = ?, project_description = ?, project_link = ?, project_image = ? WHERE id = ?";
            $stmt = mysqli_prepare($this->link, $sql); // Préparation de la requête SQL

            // Vérification si la préparation de la requête a réussi
            if ($stmt) {
                // Liaison des paramètres à la requête SQL
                mysqli_stmt_bind_param($stmt, "ssssi", $projectLangages, $projectDescription, $projectLink, $targetFile, $id);
                
                // Exécution de la requête SQL
                if (mysqli_stmt_execute($stmt)) {
                    echo "Projet modifié avec succès."; // Affichage du message de succès
                } else {
                    echo "Erreur lors de la modification du projet : " . mysqli_stmt_error($stmt); // Affichage de l'erreur s'il y a eu un problème lors de l'exécution de la requête SQL
                }
            } else {
                echo "Erreur lors de la préparation de la requête : " . mysqli_error($this->link); // Affichage de l'erreur si la préparation de la requête a échoué
            }
        } else {
            echo "Une erreur s'est produite lors du téléchargement de votre fichier."; // Affichage de l'erreur si le téléchargement du fichier a échoué
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
