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
      
        <li><a class="active" href="acceuil.php">Client</a></li>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "agence de voyage";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $destination_hotle = $_POST['destination_hotle'];
  $description = $_POST['description'];
  $read_more_url = $_POST['read_more_url'];
  $pays = $_POST['pays'];
  if (isset($_FILES['img_src']) && $_FILES['img_src']['size'] > 0) {
    $uploadutilisateur = "../site/profil/uploads/";
    $target_dir = "../site/uploads/";
    $original_filename = $_FILES['img_src']['name'];
    $allowed_extensions = array('jpg', 'jpeg', 'png');
    $ext = pathinfo($original_filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed_extensions)) {
      echo "Extension de fichier non autorisée.";
      exit;
    }
    $new_filename = uniqid() . "." . $ext;
    $target_file_user = $uploadutilisateur . $new_filename;
    $target_file = $target_dir . $new_filename;
    if (move_uploaded_file($_FILES['img_src']['tmp_name'], $target_file)) {
      if (copy($target_file, $target_file_user)) {
          $img_src = $target_file;
          echo "File successfully uploaded to both directories.";
      } else {
          echo "Error copying file to user directory.";
          exit;
      }
  } else {
      echo "Error moving file to main directory.";
      exit;
  }
  } else {
    echo "Aucune image sélectionnée.";
    exit;
  }
  $sql = "INSERT INTO destination (destination_hotle, img_src, pays, description, read_more_url) VALUES (?, ?, ?, ?, ?)";
  
  $stmt = $conn->prepare($sql);

  // Bind parameters
  $stmt->bind_param("sssss", $destination_hotle, $img_src, $pays, $description, $read_more_url);

  // Execute the statement
  if ($stmt->execute()) {
    echo "<p>Nouvelle entrée ajoutée avec succès.</p>";
  } else {
    echo "Erreur: " . $sql . "<br>" . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>
<form action="destination.php" method="post" enctype="multipart/form-data" >
<table class="table table-striped">
  <thead>
    <tr>
      <th>Formulaire pour ajouter une destination :</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><label for="title">Titre:</label></td>
      <td><input type="text" name="destination_hotle" required><br></td>
    </tr>
    <tr>
      <td><label for="title">pays:</label></td>
      <td><input type="text" name="pays" required><br></td>
    </tr>
    <tr>
      <td><label for="img_src">Image:</label></td>
      <td><input type="file" name="img_src" id="image" accept="image/*" required><br></td>
    </tr>
    
    <tr>
      <td><label for="description">Description:</label></td>
      <td><textarea name="description" required></textarea><br></td>
    </tr>
    <tr>
      <td><label for="read_more_url">URL de lecture:</label></td>
      <td><input type="text" name="read_more_url" required><br></td>
    </tr>
    <tr>
      <td><input type="submit" value="Ajouter"></td>
    </tr>
  </tbody>
</table>
</form>
</section>

</body>
</html>