<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<title>
			MY Admin
		</title>
		<link rel="stylesheet" href="./css/affichercss.css">
    <link rel="stylesheet" href="./bootstrap-dist/css/bootstrap.min.css">
		
		
	</head>
	
	<body>
       <!-- SIDEBAR -->
<div class="sidebar">
	
    <div class="user">
      <img src="" />
      <span class="username">ADMIN PAGE </span>
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
       
        
        
      </div>
      
     
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
        
       
        <?php
		
		// Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "agence de voyage";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	// Récupération des données des clients
    $sql = "SELECT user_id,nom, prenom, email, telephone, adresse,Ville,Pays,code_postal FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Affichage des données
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
	echo '<th>user_id</th>';
    echo '<th>Nom</th>';
    echo '<th>Prénom</th>';
    echo '<th>Email</th>';
    echo '<th>Téléphone</th>';
    echo '<th>Adresse</th>';
    echo '<th>Ville</th>';
    echo '<th>Pays</th>';
    echo '<th>Code postal</th>';
	// echo '<th>Modifier</th>';
    echo '<th>Supprimer</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
		echo '<td>' . $row['user_id'] .'</td>';
        echo '<td>' . $row['nom'] .'</td>';
        echo '<td>' . $row['prenom'] .'</td>';
        echo '<td>' . $row['email'] .'</td>';
        echo '<td>' . $row['telephone'] .'</td>';
        echo '<td>' . $row['adresse'] .'</td>';
        echo '<td>' . $row['Ville'] .'</td>';
        echo '<td>' . $row['Pays'] .'</td>';
        echo '<td>' . $row['code_postal'] .'</td>';
       
       
        echo '<td><button class="btn-with"  name="delete_btn" onclick="window.location.href=\'supprimer.php?id=' . $row['user_id'] . '\'"><img src="./icon/user-delete.svg" alt="Plane Icon"></button></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$conn = null;

		
		
?>
<style>
  .btn-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    background-color: #2214ff;
    color: #fff;
    border: none;
    border-radius: 16px;
    cursor: pointer;
    margin-left: 28px ;
}

    .btn-icon img {
      width: 50px; 
      height: 30px; 
      margin-right: 5px; 
    }
.btn-with {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    background-color: #bd0000;
    color: #fff;
    border: none;
    border-radius: 16px;
    cursor: pointer;
    margin-left: 28px ;
}

    .btn-with img {
      width: 50px; 
      height: 30px; 
      margin-right: 5px; 
    }
  	 
 
.btn-with-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    background-color:#009d5cf2;
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
		
		
		<section id="footer">
    <button type="submit" class="btn-with-icon" name="Valider"  onclick="window.location.href='ajouter.php'" >
             <img src="./icon/user-add.svg" alt="Plane Icon">
                    </button>
		
			  
		</section>
	</body>

</html>