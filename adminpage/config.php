<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "agence_de_voyage"; // évite les espaces dans le nom de DB

try {
    // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);

    // Mode d'erreur : Exception
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
