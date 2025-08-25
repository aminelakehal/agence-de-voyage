<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Modifier Vol</title>
    <link rel="stylesheet" href="./css/affichercss.css">
    <link rel="stylesheet" href="./bootstrap-dist/css/bootstrap.min.css">
</head>

<body>

    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "agence de voyage";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérifie si l'ID du vol est passé en paramètre
        if (isset($_GET['id'])) {
            $vol_id = $_GET['id'];

            // Récupère les données du vol en fonction de l'ID
            $sql = "SELECT * FROM vol WHERE vol_id = :vol_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':vol_id', $vol_id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                echo "Vol non trouvé.";
                exit();
            }
        } else {
            echo "ID du vol non spécifié.";
            exit();
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>

    <!-- Formulaire de modification -->
    <form method="post" action="update_flight.php">
        <input type="hidden" name="update-id" value="<?php echo $row['vol_id']; ?>">

        <label for="nouveau-nom-flight">Nouveau Nom du Vol:</label>
        <input type="text" name="nouveau-nom-flight" value="<?php echo $row['nom_flight']; ?>" required>

        <label for="nouveau-le-voyage">Nouveau Lieu de Voyage:</label>
        <input type="text" name="nouveau-le-voyage" value="<?php echo $row['le_voyage']; ?>" required>

        <label for="nouvelle-heure-depart-vol">Nouvelle Heure de Départ:</label>
        <input type="text" name="nouvelle-heure-depart-vol" value="<?php echo $row['heure_depart_vol']; ?>" required>

        <label for="nouvelle-heure-arrive-vol">Nouvelle Heure d'Arrivée:</label>
        <input type="text" name="nouvelle-heure-arrive-vol" value="<?php echo $row['heure_arrive_vol']; ?>" required>

        <!-- Ajout du champ de sélection pour la note -->
        <label for="nouvelle-note">Nouvelle Note:</label>
        <select name="nouvelle-note" required>
            <option value="1" <?php if ($row['note'] == 1) echo 'selected'; ?>>1</option>
            <option value="2" <?php if ($row['note'] == 2) echo 'selected'; ?>>2</option>
            <option value="3" <?php if ($row['note'] == 3) echo 'selected'; ?>>3</option>
            <option value="4" <?php if ($row['note'] == 4) echo 'selected'; ?>>4</option>
            <option value="5" <?php if ($row['note'] == 5) echo 'selected'; ?>>5</option>
        </select>

        <button type="submit" name="update-btn">Mettre à Jour</button>
    </form>

    <?php
    $conn = null;
    ?>

</body>

</html>

