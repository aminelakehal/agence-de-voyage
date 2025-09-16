<?php
include('layouts/sidebar.php');
require_once 'config.php'; 

try {
    $nom         = $_POST["nom"];
    $prenom      = $_POST["prenom"];
    $email       = $_POST["email"];
    $telephone   = $_POST["telephone"];
    $adresse     = $_POST["adresse"];
    $mot_de_passe= $_POST['password'];
    $Ville       = $_POST['Ville'];
    $Pays        = $_POST['Pays'];
    $code_postal = $_POST['code_postal'];

    // Validation rapide (exemple)
    if (empty($nom) || empty($prenom) || empty($email)) {
        throw new Exception("Veuillez remplir tous les champs obligatoires.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Adresse e-mail invalide.");
    }
    if (!is_numeric($telephone)) {
        throw new Exception("Le téléphone doit contenir uniquement des chiffres.");
    }

    // Requête d’insertion
    $requete = $connexion->prepare("
        INSERT INTO user (nom, prenom, email, telephone, adresse, Ville, Pays, code_postal, password)
        VALUES (:nom, :prenom, :email, :telephone, :adresse, :Ville, :Pays, :code_postal, :password)
    ");

    $requete->execute([
        ":nom"        => $nom,
        ":prenom"     => $prenom,
        ":email"      => $email,
        ":telephone"  => $telephone,
        ":adresse"    => $adresse,
        ":Ville"      => $Ville,
        ":Pays"       => $Pays,
        ":code_postal"=> $code_postal,
        ":password"   => $mot_de_passe 
    ]);

    header("Location: cliante.php");
    exit;

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

?>