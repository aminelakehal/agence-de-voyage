<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agence de voyage";

// Connect to the database
$connexion = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$connexion) {
    die("Échec de la connexion à la base de données : " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['confirmer'])) {
    // Get the selected FlightIDs
    $selectedFlightIDs = isset($_POST['check']) ? $_POST['check'] : [];

    // Update the confirmation status for selected flights
    foreach ($selectedFlightIDs as $flightID) {
        $updateSql = "UPDATE reservation_vol SET statut = 1 WHERE FlightID = '$flightID'";
        mysqli_query($connexion, $updateSql);
    }

    // Redirect after confirmation
    header("Location: confirmation_client.php");
    exit();
}

if (isset($_POST['delete'])) {
    $deleteFlightID = $_POST['delete'];
    $deleteSql = "DELETE FROM reservation_vol WHERE FlightID = '$deleteFlightID'";
    mysqli_query($connexion, $deleteSql);

    // Redirect after deletion
    header("Location: confirmation_client.php");
    exit();
}

// Fetch reservation data for display
$sql = "SELECT * FROM reservation_vol";
$result = mysqli_query($connexion, $sql);

// Check the results
if ($result) {
    $reservationsVol = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Erreur dans la requête : " . mysqli_error($connexion);
}

// Close the database connection
mysqli_close($connexion);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>MY Admin</title>
    <link rel="stylesheet" href="./css/affichercss.css">
    <link rel="stylesheet" href="./bootstrap-dist/css/bootstrap.min.css">
</head>

<body>
    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="user">
            <img src="" />
            <span class="username">ADMIN PAGE</span>
        </div>

        <nav role='navigation'>
            <ul>
            <li><a class="active" href="cliante.php">Client</a></li>
            <li><a href="./afficher_flight.php">ajouter VOl</a></li>
            <li><a href="./confirmation_client.php">reservation voles</a></li>
            <li><a href="./destination.php">ajouter Hotel</a></li>
            <li><a href="./reservationhotels.php">reservation hotels</a></li>
            <a  href="./index.php" class="icon">Deconnexion</a>
            </ul>
        </nav>
    </div>

    <!-- MAIN -->
    <div class="main">
        <header>
            <!-- HEADER TOP -->
            <div class="top">
            <style>
         .icon {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    background-color: #ff1414;
    color: #fff;
    border: none;
    border-radius: 16px;
    cursor: pointer;
    margin-left: 1px ;
}

  
      </style>
        
                <!-- Hotel Table Section -->
                <section id="hotel-table">
                    <form method="post" action="">
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Vol</th>
                                    <th>ID Client</th>
                                    <th>Destination</th>
                                    <th>date_depart</th>
                                    <th>Date Arrivée</th>
                                    <th>Nombre Passager</th>
                                    <th>passeport</th>
                                    <th>Statut</th>
                                    <th>Confirmer</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservationsVol as $value): ?>
                                    <tr>
                                        <td><?= $value['FlightID']; ?><br></td>
                                        <td><?= $value['user_id']; ?><br></td>
                                        <td><?= $value['Destination']; ?><br></td>
                                        <td><?= $value['date_depart']; ?><br></td>
                                        <td><?= $value['date_arrivee']; ?><br></td>
                                        <td><?= $value['nombre_passager']; ?><br></td>
                                        <td>
                                     <a href="<?= urlencode($value['passeport']); ?>" download>Télécharger le passeport</a>
                                       </td>

                                        <td><input type="checkbox" name="check[]" value="<?= $value['FlightID'] ?>"></td>
                                        <td>
                                            <div class="btn">
                                                <button type="submit" style="background-color: #28a745; color: #fff; padding: 10px 15px; border: none; cursor: pointer;" name="confirmer">Confirmer</button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn">
                                                <button type="submit" style="background-color: #dc3545; color: #fff; padding: 10px 15px; border: none; cursor: pointer;" name="delete" value="<?= $value['FlightID'] ?>">Supprimer</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        
                    </form>
                </section>
                <!-- <input id="button" type=button class="btn btn-light"  value= Ajouter onclick="window.location.href='formulairvoles.php'" /> -->
            </div>
        </header>
    </div>
</body>

</html>
