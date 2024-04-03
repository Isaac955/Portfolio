<?php
// Inclure le fichier de connexion à la base de données
include_once("../admin/mysqli_connect.php");
include_once("header.php");

class RechercheProjet {
    private $link;

    public function __construct($link)
    {
        $this->link = $link;
    }

    public function rechercherProjets($searchQuery)
    {
        $sql = "SELECT * FROM projects WHERE project_langages LIKE '%$searchQuery%' OR project_description LIKE '%$searchQuery%'";
        $result = mysqli_query($this->link, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "ID: " . $row["id"]. " - Langages: " . $row["project_langages"]. " - Description: " . $row["project_description"]. "<br>";
            }
        } else {
            echo "Aucun résultat trouvé.";
        }
    }
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search_query = $_GET['search'];

    // Créer une instance de RechercheProjet
    $rechercheProjet = new RechercheProjet($link);

    // Appeler la méthode pour rechercher les projets
    $rechercheProjet->rechercherProjets($search_query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recherche de projet</title>
    <link rel="stylesheet" href="../assets/ressources/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h1>Recherche de projet</h1>
<form method="get" action="recherche.php">
    <div>
        <label for="search">Recherche par langages ou description :</label>
        <input type="text" id="search" name="search" required>
    </div>
    <div>
        <button type="submit">Rechercher</button>
    </div>
</form>

</body>
</html>
