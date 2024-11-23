<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/ressources/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        /* Styles spécifiques au menu déroulant */
        ul ul {
            display: none;
            position: absolute;
            z-index: 1000;
            background-color: #fff; /* Couleur de fond */
            border: 1px solid #ccc; /* Bordure */
            padding: 5px 0;
            border-radius: 5px; /* Coins arrondis */
        }

        ul li:hover > ul {
            display: block; /* Affiche le sous-menu au survol */
        }

        ul ul li {
            display: block;
            width: 200px; /* Largeur du sous-menu */
            padding: 10px;
            text-align: left;
        }

        ul ul li a {
            color: #333; /* Couleur du texte */
            text-decoration: none;
        }

        ul ul li a:hover {
            color: #007bff; /* Couleur du texte au survol */
        }
    </style>
    <title>Back office</title>
</head>
<body>
    <header>
        <h1>Back office</h1>
        <nav>
            <ul>
                <li><a href="#">Projets</a>
                    <ul>
                        <li><a href="../project/ajout.php">Ajouter un projet</a></li>
                        <li><a href="../project/supp.php">Supprimer un projet</a></li>
                        <li><a href="../project/recherche.php">Rechercher un projet</a></li>
                        <li><a href="../project/modif.php">Modifier un projet</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <nav>
            <ul>
                <li><a href="#">Réseaux sociaux</a>
                    <ul>
                        <li><a href="../rs/ajout_rs.php">Ajouter un réseau social</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <a href="../index.php" class="button">Retour au site</a>
    </header>
</body>
</html>
