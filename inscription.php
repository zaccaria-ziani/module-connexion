<?php 	session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<link rel="stylesheet" href="moduleconnexion.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
</head>
<body class="bodyinscription">
	<header>
            
            <nav id="menuheader1">
                <div id="menuheader2">
                    <span class="headerspace"><a href="index.php">Index</a></span>
                    <span class="headerspace"><a href="connexion.php">Connexion</a></span>
                    <span class="headerspace"><a href="inscription.php">Inscription</a></span>
                    <span class="headerspace"><a href="profil.php">Profil</a></span>
                    <span class="headerspace"><a href="admin.php">Admin</a></span>
					<span class="headerspace"><form action ="index.php" method="post"><input type="submit" value="Deconnexion" name="deconnexion"></form></span>
                   
 <?php if(isset($_POST["deconnexion"]))
{
session_unset();
session_destroy();
header('location:index.php');

}
?>
                    
                </div>
            </nav>
        </header>
        
	<div class="formulaireinscription">
		<h1 id="titreinscription">Inscription</h1>
		<form action="inscription.php" method="post">
				

				<div class="info">
					
					<label for="login">Login :<br> </label>
					<input type="text" name="login" id="login" required>

					<br>
					<br>

					<label for="prenom">Prenom :<br></label>
					<input type="text" name="prenom" id="prenom">

					<br>
					<br>


					<label for="nom">Nom :<br></label>
					<input type="text" name="nom" id="nom">

					<br>
					<br>

					<label for="password">Mot de passe :<br></label>
					<input type="password" name="password" id="password" required>

					<br>
					<br>


					<label for="confirmpassword">Confirmer mot de passe : <br></label>
					<input type="password" name="confirmpassword" id="confirmpassword" required>
					<br>
					<br>

					<input type="submit" value="Inscription" name="confirm" /><br>
				</div>

				
		</form>
		
	</div>
	

</body>
</html>





<?php
	

	
	// On commence par récupérer les champs
 	if(isset($_POST["nom"]))
 	{
 		$nom=$_POST["nom"];
 	}     
	else
	{
		$nom="";
	}   


	if(isset($_POST["prenom"]))
	{
		$prenom=$_POST["prenom"];
	}
	else      
	{
			$prenom="";
	}



	if(isset($_POST["login"]))
	{
		$login=$_POST["login"];
	}      
	else 
	{
		$login="";
	}     



	if(isset($_POST["password"]))
	{
		$password=$_POST["password"];
	}      
	else
	{
		$password="";
	}     

	if(isset($_POST["confirmpassword"])) 
	{
		 $confirmpassword=$_POST["confirmpassword"];
	}    
	else  
	{
		 $confirmpassword="";
	}   






	if(isset($_POST['confirm']))
	{
	
		$connexion = mysqli_connect("localhost", "root","", "moduleconnexion");
		                    
		$requete3 = "SELECT login FROM utilisateurs WHERE login = '$login'";         
		$query3 = mysqli_query($connexion, $requete3);         
		$resultat3 = mysqli_fetch_all($query3);             
		if (!empty($resultat3))             
		{                 
			echo "<div id='false2'>Ce Login est déjà pris</div>"; 
		}             
		elseif($_POST["password"] != $_POST["confirmpassword"])            
		{                
			echo "<div id='false2'>Les mots de passe ne correspondent pas </div>";
		}             
		else            
	 	{                
			$requete = "INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('$login', '$prenom', '$nom', '$password')";
			$query = mysqli_query($connexion, $requete);                 
			header('Location:connexion.php');            
		}
	}


	

?>







