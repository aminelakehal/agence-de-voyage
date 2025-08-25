<?php
if (isset($_POST['delete-id'])) {
    // Get the flight ID from the form
    $flightId = $_POST['delete-id'];

    // Your database connection code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "agence de voyage";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Delete the flight record from the database
        $sql = "DELETE FROM vol WHERE vol_id = :flight_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':flight_id', $flightId, PDO::PARAM_INT);
        $stmt->execute();

        // Redirect back to the page displaying flights
        header("Location: afficher_flight.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    $conn = null;
} else {
    // Redirect if no flight ID is provided
    header("Location: afficher_flight.php");
    exit();
}
?>
