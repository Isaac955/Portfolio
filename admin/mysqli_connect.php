<?php
// Connexion à la base de données
$link = mysqli_connect("mysql-isaacserhane.alwaysdata.net", "347999", "mysql95", "isaacserhane_portfolio");
if (!$link) {
    die('Erreur de connexion (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
} 
?>
