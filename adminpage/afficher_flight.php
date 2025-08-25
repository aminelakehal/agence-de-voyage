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
       
        
      </div>
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
    $sql = "SELECT vol_id,nom_flight,le_voyage,heure_depart_vol , heure_arrive_vol FROM vol";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Affichage des données
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
	echo '<th>vol_id</th>';
    echo '<th>nom_flight</th>';
    echo '<th>le_voyage</th>';
    echo '<th>heure_depart_vol</th>';
    echo '<th>heure_arrive_vol</th>';
	// echo '<th>Modifier</th>';
    echo '<th>Supprimer</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
		echo '<td>' . $row['vol_id'] .'</td>';
        echo '<td>' . $row['nom_flight'] .'</td>';
        echo '<td>' . $row['le_voyage'] .'</td>';
        echo '<td>' . $row['heure_depart_vol'] .'</td>';
        echo '<td>' . $row['heure_arrive_vol'] .'</td>';
    
    //     echo '<td>
    //     <form method="post" action="update_flight.php">
    //         <input type="hidden" name="update-id" value="' . $row['vol_id'] . '">
    //         <button class="modifier" name="update-btn" type="submit"><img src="./icon/iiii.svg" alt="Plane Icon"></button>
    //     </form>
    // </td>';
echo '<td><form method="post" action="supprimer_flight.php">
        <input type="hidden" name="delete-id" value="' . $row['vol_id'] . '">
        <button class="delet" name="delete-btn" type="submit"><img src="./icon/airplane-plane-svgrepo-com.svg" alt="Plane Icon"></button>
    </form></td>';
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
 .modifier {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    background-color: #08ff98f2;
    color: #fff;
    border:#08ff98f2 ;
    border-radius: 16px;
    cursor: pointer;
    margin-left: 28px ;
}

    .modifier img {
      width: 50px; 
      height: 30px; 
      margin-right: 5px; 
    }
    
    
 .delet {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    background-color: #ff0000f2;
    color: #fff;
    border:#08ff98f2 ;
    border-radius: 16px;
    cursor: pointer;
    margin-left: 28px ;
}

    .delet img {
      width: 50px; 
      height: 30px; 
      margin-right: 5px; 
    }
    
          .btn-with-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    background-color:#0400fff2;
    color: #fff;
    border:#08ff98f2 ;
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
    <button type="submit" class="btn-with-icon" onclick="window.location.href='ajouter_flight.php'" >
             <img src="./icon/airplane.svg" alt="Plane Icon">
                    </button>
		
			  <!-- <input id="button" type=button class="btn btn-light"  value= Ajouter onclick="window.location.href='ajouter_flight.php'" /> -->
		
		</section>
	</body>

</html>