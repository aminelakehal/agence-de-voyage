
<?php
// Connection established once at the beginning  
require_once 'config.php';
try {

  // Delete client (if idClient received via GET)
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM reservation_vol WHERE FlightID = :FlightID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':FlightID', $id);
    $stmt->execute();

    // header("Location:acceuil.php");
    exit;
  }

} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}

$conn = null;
?>
