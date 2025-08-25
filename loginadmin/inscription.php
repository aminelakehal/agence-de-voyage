<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$nomBaseDeDonnees = "agence de voyage"; // Correction du nom de la base de données

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $nomBaseDeDonnees);

// Vérifier la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Récupérer les données du formulaire
$name = isset($_POST["name"]) ? mysqli_real_escape_string($connexion, $_POST["name"]) : "";
$email = isset($_POST["email"]) ? mysqli_real_escape_string($connexion, $_POST["email"]) : "";
$password = isset($_POST["password"]) ? password_hash($_POST["password"], PASSWORD_DEFAULT) : "";

// Requête d'insertion
$sql = "INSERT INTO administrateurs (name, email, password) VALUES ('$name', '$email', '$password')";

// Exécuter la requête
if (mysqli_query($connexion, $sql)) {
    header('Location: ');
} else {
    echo "Erreur d'enregistrement : " . mysqli_error($connexion);
}

// Fermer la connexion
mysqli_close($connexion);
?>
