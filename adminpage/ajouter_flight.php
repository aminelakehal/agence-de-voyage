<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agence de voyage";

try {
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['Valider'])) {
        $nom_flight = $_POST['nom_flight'];
        $le_voyage = $_POST['le_voyage'];
        $heure_depart_vol = $_POST['heure_depart_vol'];
        $heure_arrive_vol = $_POST['heure_arrive_vol'];

        if (empty($le_voyage) || empty($heure_depart_vol) || empty($heure_arrive_vol)) {
            // throw new Exception("Tous les champs doivent être remplis.");
        }

        $requete = $connexion->prepare("INSERT INTO vol(nom_flight, le_voyage, heure_depart_vol, heure_arrive_vol) VALUES (:nom_flight, :le_voyage, :heure_depart_vol, :heure_arrive_vol)");

        // Bind parameters and execute query
        $requete->bindParam(":nom_flight", $nom_flight);
        $requete->bindParam(":le_voyage", $le_voyage);
        $requete->bindParam(":heure_depart_vol", $heure_depart_vol);
        $requete->bindParam(":heure_arrive_vol", $heure_arrive_vol);

        $requete->execute();

        header("Location: afficher_flight.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Erreur lors de l'ajout du vol : " . $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    $connexion = null;
}
?>


<?php include('layouts/sidebar.php') ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./css/affichercss.css">
    <link rel="stylesheet" href="./bootstrap-dist/css/bootstrap.min.css" />

    <title>Fomulaire clients</title>

    <link rel="stylesheet" href="styleFormulaires" media="screen" type="text/css" />

</head>

<body>

    <nav class="navbar" navbar-default role=navigatio>
    </nav>

    <section id="bas">

        <form action="./ajouter_flight.php" method="post">

            <table class="table">
                <thead>
                    <tr>

                        <th>Formulaire pour ajouter un flight :</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label for="nom_flight">Nom du vol :</label></td>
                        <td><input type="text" name="nom_flight" /></td>

                    </tr>
                    <tr>
                        <td><label for="le_voyage">le_voyage:</label></td>
                        <td><input type="text" name="le_voyage" /></td>

                    </tr>
                    
                    <tr>
                        <td><label for="heure_depart_vol">Heure de départ :</label></td>
                        <td><input type="time" name="heure_depart_vol" /></td>

                    </tr>

                    <tr>
                       <td><label for="heure_arrive_vol">Heure d'arrivée :</label></td>
                       <td><input type="time" name="heure_arrive_vol" /></td>
                        </tr>


                </tbody>
            </table>
            <style> 
          .btn-with-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    background-color: #08ff98f2;
    color: #fff;
    border: none;
    border-radius: 16px;
    cursor: pointer;
    margin-left: 28px ;
}

    .btn-with-icon img {
      width: 50px; 
      height: 30px; 
      margin-right: 5px; 
    }
    </style>
            <button type="submit" class="btn-with-icon" name="Valider" >
             <img src="./icon/iiii.svg" alt="Plane Icon">
                    </button>

<!-- 
            <input type="submit" value="Valider" name="Valider"> -->
        </form>

    </section>

</body>

</html>
