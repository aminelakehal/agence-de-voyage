<?php
include('layouts/sidebar.php'); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agence de voyage";


$connexion = mysqli_connect($servername, $username, $password, $dbname);


if (!$connexion) {
    die("Échec de la connexion à la base de données : " . mysqli_connect_error());
}

if (isset($_POST['confirmer'])) {
   
    $selectedHotel_ids = isset($_POST['check']) ? $_POST['check'] : [];

   
    foreach ($selectedHotel_ids as $Hotel_id) {
        $updateSql = "UPDATE reservation_hotels SET statut = 1 WHERE Hotel_id = '$Hotel_id'";
        mysqli_query($connexion, $updateSql);
    }

    
    header("Location: reservationhotels.php");
    exit();
}

if (isset($_POST['delete'])) {
    $deleteHotel_id = $_POST['delete'];
    $deleteSql = "DELETE FROM reservation_hotels WHERE Hotel_id = '$deleteHotel_id'";
    mysqli_query($connexion, $deleteSql);

    
    header("Location: reservationhotels.php");
    exit();
}


$sql = "SELECT * FROM reservation_hotels";
$result = mysqli_query($connexion, $sql);


if ($result) {
    $reservationsHotels = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Erreur dans la requête : " . mysqli_error($connexion);
}


mysqli_close($connexion);
?>




                <form method="post" action="">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID Hotel</th>
                                <th>ID Client</th>
                                <th>Nom Hotel</th>
                                <th>Date Debut</th>
                                <th>Date fin</th>
                                <th>personnes</th>
                                <th>number_de_chambre</th>
                                <th>Statut</th>
                                <th>Confirmer</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reservationsHotels as $value): ?>
                                <tr>
                                    <td><?= $value['Hotel_id']; ?><br></td>
                                    <td><?= $value['user_id']; ?><br></td>
                                    <td><?= $value['hname']; ?><br></td>
                                    <td><?= $value['Date_Debut']; ?><br></td>
                                    <td><?= $value['Date_fin']; ?><br></td>
                                    <td><?= $value['personnes']; ?><br></td>
                                    <td><?= $value['number_de_chambre']; ?><br></td>
                                    <td><input type="checkbox" name="check[]" value="<?= $value['Hotel_id'] ?>"></td>
                                    <td>
                                        <div class="btn">
                                            <button type="submit" style="background-color: #28a745; color: #fff; padding: 10px 15px; border: none; cursor: pointer;" name="confirmer">Confirmer</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn">
                                            <button type="submit" style="background-color: #dc3545; color: #fff; padding: 10px 15px; border: none; cursor: pointer;" name="delete" value="<?= $value['Hotel_id'] ?>">Supprimer</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
            </section>
            <!-- <input id="button" type="button" class="btn btn-light" value="Ajouter" onclick="window.location.href='formulairvoles.php'" /> -->
        </header>
    </div>
</body>

</html>
