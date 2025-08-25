<?php
include('layouts/sidebar.php')?><!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="./bootstrap-dist/css/bootstrap.min.css" />
		
		<title>
			Fomulaire clients 
		</title>
		
		<link rel="stylesheet" href="styleFormulaires" media="screen" type="text/css" />
		
	</head>
	
	<body>
	
	
	
	<nav class="navbar" navbar-default role=navigatio>
		</nav>
		
		<section id="bas">
		
		<form action="addclient.php" method="post" >
		
		<table class="table">
        <thead>
          <tr>
			
            <th>Formulaire pour ajouter un client :</th>
			
        
          </tr>
        </thead>
        <tbody>
		<tr>
			
            
            
		   </tr>
          <tr>
            <td><label for="nom" > Nom : </label></td>
            <td><input type="text" name="nom"/></td>
            
		   </tr>
		   <tr>
            <td><label for="prenom" > Prénom : </label></td>
            <td><input type="text" name="prenom"/></td>
            
		   </tr>
		   <tr>
            <td><label for="email" > Email : </label></td>
            <td><input type="email" name="email"/></td>
            
		   </tr>
		   <tr>
            <td><label for="telephone" > Téléphone : </label></td>
            <td><input type="ttelephon" name="telephone"/></td>
            
		   </tr>
		   <tr>
            <td><label for="adresse" > Adresse : </label></td>
            <td><input type="text" name="adresse"/></td>

            
		   </tr>
		   <tr>
            <td><label for="password" > password : </label></td>
            <td><input type="password" name="password"/></td>

            
		   </tr>
		   <tr>
            <td><label for="ville" > ville : </label></td>
            <td><input type="text" name="Ville"/></td>

            
		   </tr>
		   <tr>
            <td><label for="pays" > pays : </label></td>
            <td><input type="text" name="Pays"/></td>

            
		   </tr>
		  
		   <tr>
            <td><label for="code_postal" > code_postal : </label></td>
            <td><input type="text" name="code_postal"/></td>

            
		   </tr>
        </body>
      </table>
			
			
			<input type="submit" value="Valider" name="Valider"  >
		</form>
			
		
		
		</section>
		
	</body>

</html>