<?php
require_once 'config.php'; // connexion PDO

try {
    // Confirmer sélection
    if (isset($_POST['confirmer']) && !empty($_POST['check'])) {
        $selectedFlightIDs = $_POST['check'];

        $sql = "UPDATE reservation_vol SET statut = 1 WHERE FlightID = :FlightID";
        $stmt = $connexion->prepare($sql);

        foreach ($selectedFlightIDs as $flightID) {
            if (is_numeric($flightID)) {
                $stmt->execute([":FlightID" => $flightID]);
            }
        }

        header("Location: confirmation_client.php");
        exit;
    }

    // Supprimer un vol
    if (isset($_POST['delete']) && is_numeric($_POST['delete'])) {
        $deleteFlightID = $_POST['delete'];
        $sql = "DELETE FROM reservation_vol WHERE FlightID = :FlightID";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([":FlightID" => $deleteFlightID]);

        header("Location: confirmation_client.php");
        exit;
    }

    // Récupération des réservations
    $sql = "SELECT * FROM reservation_vol";
    $stmt = $connexion->query($sql);
    $reservationsVol = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erreur SQL : " . $e->getMessage();
}

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
