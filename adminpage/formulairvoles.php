<?php
include('layouts/sidebar.php')?>
<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="./bootstrap-dist/css/bootstrap.min.css" />
		
		<title>
			Formulaire vol
		</title>
		
		<link rel="stylesheet" href="styleFormulaires" media="screen" type="text/css" />
		
	</head>
	
	<body>
	
	
	
	<nav class="navbar" navbar-default role=navigatio>
		</nav>
		
		<section id="bas">
		
		<form action="ajoutervol.php" method="post" >
		
		<table class="table">
        <thead>
          <tr>
			
            <th>Formulaire de ajouter un vol:</th>
			
        
          </tr>
        </thead>
        <tbody>
		<tr>
			
            <!-- <td><label for="idClient" > Identifiant : </label></td>
            <td><input type="text" name="idClient"/></td> -->
            
		   </tr>
          
		   <tr>
            <td><label for="Destination" > Destination: </label></td>
            <td><input type="text" name="Destination"/></td>
            
		   </tr>
		   <tr>
		   <tr>
            <td><label for="date_depart" > date_depart : </label></td>
            <td><input type="date" name="date_depart"/></td>
		   </tr>
		  
            
		   </tr>
		   <tr>
            <td><label for="user_id" > ID utilisateur: </label></td>
            <td><input type="text" name="user_id"/></td>
		   </tr>
		   <tr>
            <td><label for="date_arrivee" > date_arrivee : </label></td>
            <td><input type="date" name="date_arrivee"/></td>
            
		   </tr>
		   <tr>
            <td><label for="nombre_passager" > nombre_passager: </label></td>
            <td><input type="text" name="nombre_passager"/></td>
            
		   </tr>
        </body>
      </table>
			
	  <input type="submit" value="Valider" name="Valider"  >
			
			
		</form>
	</body>

</html>