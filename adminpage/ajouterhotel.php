<?php
include('layouts/sidebar.php')?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agence de voyage"; // Replace with your database name

try {
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get form values
    $hname = $_POST['hname'];
    $Date_Debut = $_POST['Date_Debut'];
    $Date_fin = $_POST['Date_fin'];
    $personnes = $_POST['personnes'];
    $number_de_chambre = $_POST['number_de_chambre'];
    $user_id = $_POST['user_id'];

    // Validate form data
    if (empty($hname) || empty($Date_Debut) || empty($Date_fin) || empty($user_id)) {
        throw new Exception("Tous les champs doivent être remplis.");
    }

    // Prepare SQL query for inserting data into database
    $requete = $connexion->prepare("INSERT INTO reservation_hotels(hname, Date_Debut, Date_fin,personnes,number_de_chambre	, user_id) VALUES (:hname,:number_de_chambre,:personnes, :Date_Debut, :Date_fin, :user_id)");

    // Bind parameters and execute query
    $requete->bindParam(":hname", $hname);
    $requete->bindParam(":Date_Debut", $Date_Debut);
    $requete->bindParam(":Date_fin", $Date_fin);
    $requete->bindParam(":user_id", $user_id);
    $requete->bindParam(":personnes", $personnes);
    $requete->bindParam(":number_de_chambre", $number_de_chambre);

    $requete->execute();

    header("Location: reservationhotels.php"); // Redirect after successful insertion
    exit();
} catch (PDOException $e) {
    echo "Erreur lors de l'ajout du hotel : " . $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    // Close database connection
    $connexion = null;
}
?>


