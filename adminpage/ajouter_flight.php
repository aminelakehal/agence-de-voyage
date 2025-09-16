<?php
require_once 'config.php'; // inclure la connexion

try {
    if (isset($_POST['Valider'])) {
        $nom_flight       = $_POST['nom_flight'] ?? '';
        $le_voyage        = $_POST['le_voyage'] ?? '';
        $heure_depart_vol = $_POST['heure_depart_vol'] ?? '';
        $heure_arrive_vol = $_POST['heure_arrive_vol'] ?? '';

        // Validation simple
        if (empty($nom_flight) || empty($le_voyage) || empty($heure_depart_vol) || empty($heure_arrive_vol)) {
            throw new Exception("Tous les champs doivent être remplis.");
        }

        // Préparation de la requête
        $requete = $connexion->prepare("
            INSERT INTO vol (nom_flight, le_voyage, heure_depart_vol, heure_arrive_vol) 
            VALUES (:nom_flight, :le_voyage, :heure_depart_vol, :heure_arrive_vol)
        ");

        // Exécution avec tableau associatif
        $requete->execute([
            ":nom_flight"       => $nom_flight,
            ":le_voyage"        => $le_voyage,
            ":heure_depart_vol" => $heure_depart_vol,
            ":heure_arrive_vol" => $heure_arrive_vol
        ]);

        header("Location: afficher_flight.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Erreur lors de l'ajout du vol : " . $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
