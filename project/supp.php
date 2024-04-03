<?php
// Inclure le fichier de connexion à la base de données
include_once("../admin/mysqli_connect.php");
include_once("header.php");

class SuppressionProjet {
    private $link;

    public function __construct($link)
    {
        $this->link = $link;
    }

    public function supprimerProjet($projectId)
    {
        $sql = "DELETE FROM projects WHERE id = ?";
        $stmt = mysqli_prepare($this->link, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $projectId);
            if (mysqli_stmt_execute($stmt)) {
                echo "Projet supprimé avec succès.";
            } else {
                echo "Erreur lors de la suppression du projet : " . mysqli_stmt_error($stmt);
            }
        } else {
            echo "Erreur lors de la préparation de la requête : " . mysqli_error($this->link);
        }
    }
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_project'])) {
    $projectId = $_POST['project_id'];

    // Crée une instance de SuppressionProjet
    $suppressionProjet = new SuppressionProjet($link);

    // Appel de la méthode pour supprimer le projet
    $suppressionProjet->supprimerProjet($projectId);
}

// Récupération des projets depuis la base de données
$sql = "SELECT * FROM projects";
$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Suppression de projet</title>
    <link rel="stylesheet" href="../assets/ressources/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h1>Supprimer un projet</h1>

<?php
// Affichage des projets sous forme de formulaire
if (mysqli_num_rows($result) > 0) {
    echo "<form method='post' action='supp.php'>";
    echo "<select name='project_id'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['id'] . "'>" . $row['project_langages'] . " - " . $row['project_description'] . "</option>";
    }
    echo "</select>";
    echo "<button type='submit' name='delete_project'>Supprimer projet</button>";
    echo "</form>";
} else {
    echo "Aucun projet trouvé.";
}
?>

</body>
</html>
