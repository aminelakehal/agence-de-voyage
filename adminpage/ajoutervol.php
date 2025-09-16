<?php
include('layouts/sidebar.php')?>

<?php
require_once 'config.php';
try {
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get form values
    $Destination = $_POST['Destination'];
    $date_depart = $_POST['date_depart'];
    $user_id = $_POST['user_id'];
    $date_arrivee = $_POST['date_arrivee'];
    $nombre_passager = $_POST['nombre_passager'];

    // Validate form data
    if (empty($lieu_depart) || empty($date_depart) || empty($user_id) || empty($date_arrivee) || empty($nombre_passager)) {
        throw new Exception("Tous les champs doivent être remplis.");
    }

    // Prepare SQL query for inserting data into database
    $requete = $connexion->prepare("INSERT INTO reservation_vol(Destination, date_depart, user_id, date_arrivee, nombre_passager) VALUES (:Destination, :date_depart, :user_id, :date_arrivee, :nombre_passager)");

    // Bind parameters and execute query
    $requete->bindParam(":Destination", $Destination);
    $requete->bindParam(":date_depart", $date_depart);
    $requete->bindParam(":user_id", $user_id);
    $requete->bindParam(":date_arrivee", $date_arrivee);
    $requete->bindParam(":nombre_passager", $nombre_passager);

    $requete->execute();

    header("Location: reservationvol.php"); // Redirect after successful insertion
    exit();
} catch (PDOException $e) {
    echo "Erreur lors de l'ajout du vol : " . $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    // Close database connection
    $connexion = null;
}
?>
