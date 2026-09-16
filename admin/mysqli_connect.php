<?php
// Connexion à la base de données
$link = mysqli_connect("mysql-isaac-serhane.alwaysdata.net", "isaac-serhane", "mysql95", "isaac-serhane_portfolio");
if (!$link) {
    die('Erreur de connexion (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
} 
?>
