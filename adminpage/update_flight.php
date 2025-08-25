<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$database = "agence de voyage";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifie si le formulaire a été soumis
    if (isset($_POST['update-btn'])) {
        // Récupère les valeurs du formulaire
        $vol_id = isset($_POST['update-id']) ? $_POST['update-id'] : null;
        $nouveau_nom_flight = isset($_POST['nouveau-nom-flight']) ? $_POST['nouveau-nom-flight'] : null;
        $nouveau_le_voyage = isset($_POST['nouveau-le-voyage']) ? $_POST['nouveau-le-voyage'] : null;
        $nouvelle_heure_depart_vol = isset($_POST['nouvelle-heure-depart-vol']) ? $_POST['nouvelle-heure-depart-vol'] : null;
        $nouvelle_heure_arrive_vol = isset($_POST['nouvelle-heure-arrive-vol']) ? $_POST['nouvelle-heure-arrive-vol'] : null;
        $nouvelle_note = isset($_POST['nouvelle-note']) ? $_POST['nouvelle-note'] : null;

        // Requête de mise à jour
        $sql = "UPDATE vol SET nom_flight = :nom_flight, le_voyage = :le_voyage, heure_depart_vol = :heure_depart_vol, heure_arrive_vol = :heure_arrive_vol, note = :note WHERE vol_id = :vol_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom_flight', $nouveau_nom_flight);
        $stmt->bindParam(':le_voyage', $nouveau_le_voyage);
        $stmt->bindParam(':heure_depart_vol', $nouvelle_heure_depart_vol);
        $stmt->bindParam(':heure_arrive_vol', $nouvelle_heure_arrive_vol);
        $stmt->bindParam(':note', $nouvelle_note);
        $stmt->bindParam(':vol_id', $vol_id);
        $stmt->execute();

        // Redirige l'utilisateur vers la page d'affichage après la mise à jour
        header("Location: afficher_flight.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$conn = null;
?>
