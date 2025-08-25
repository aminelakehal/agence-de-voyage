<?php
include('layouts/sidebar.php')?>
<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="./bootstrap-dist/css/bootstrap.min.css" />
		
		<title>
			Formulaire Hotel
		</title>
		
		<link rel="stylesheet" href="styleFormulaires" media="screen" type="text/css" />
		
	</head>
	
	<body>
	
	
	
	<nav class="navbar" navbar-default role=navigatio>
		</nav>
		
		<section id="bas">
		
		<form action="ajouterhotel.php" method="post" >
		
		<table class="table">
        <thead>
          <tr>
			
            <th>Formulaire de ajouter un hotel:</th>
			
        
          </tr>
        </thead>
        <tbody>
		<tr>
			
            
		   </tr>
          
		   <tr>
            <td><label for="hname" > hotel name: </label></td>
            <td><input type="text" name="hname"/></td>
            
		   </tr>
		   <tr>
		   <tr>
            <td><label for="Date_Debut" > Date_Debut : </label></td>
            <td><input type="date" name="Date_Debut"/></td>
		   </tr>
		   <tr>
            <td><label for="Date_fin" > Date_fin : </label></td>
            <td><input type="date" name="Date_fin"/></td>
            
		   </tr>
            
		   </tr>
		   <tr>
            <td><label for="user_id" > ID utilisateur: </label></td>
            <td><input type="text" name="user_id"/></td>
		   </tr>
		   <tr>
            <td><label for="personnes" >personnes : </label></td>
            <td><input type="text" name="	personnes"/></td>
		   </tr>
		   <tr>
            <td><label for="number de chambre	" > number de chambre: </label></td>
            <td><input type="text" name="number_de_chambre	"/></td>
		   </tr>
        </body>
      </table>
			
	  <input type="submit" value="Valider" name="Valider"  >
			
			
		</form>
	</body>

</html>