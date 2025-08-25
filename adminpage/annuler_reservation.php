
<?php
// Connection established once at the beginning  
$servername = "localhost";
$username = "root";
$password = "";
$database = "agence de voyage";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
