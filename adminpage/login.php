<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "agence de voyage";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

   
    $query = "SELECT * FROM administrateurs WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            if (password_verify($password, $row['password'])) {
                
                header('Location: cliante.php '); 
                exit(); 
            } else {
               
                echo "Identifiants invalides. Veuillez réessayer.";
            }
        } else {
            
            echo "Identifiants invalides. Veuillez réessayer.";
        }
    } else {
        
        die("Erreur SQL : " . $conn->error);
    }
}


$conn->close();
?>
