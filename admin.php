<?php
	
 	session_start();
 
	$connexion = mysqli_connect("localhost", "root", "", "moduleconnexion");

	$requete = "SELECT * FROM utilisateurs";

	$query = mysqli_query($connexion, $requete);

	$resultat = mysqli_fetch_all($query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Page Admin</title>
	<link rel="stylesheet" href="moduleconnexion.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
</head>
<body class="bodyadmin">
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

			<?php 
				if (!empty($_SESSION)) 
				{
					if($_SESSION['login'] == "admin")
					{
						echo "<table class='tableadmin'>
						<thead>
					    	<tr>
						        <th>ID</th>
						        <th>Login</th>
						        <th>Prénom</th>
						        <th>Nom</th>
						        <th>Mot de passe</th>
						    <tr>
						</thead>
						<tbody>";

						foreach($resultat as $cle => $valeur)
						{
							echo "<tr>";

					    	foreach($valeur as $id => $value)
					    	{
					    		echo "<td>".$value."</td>";
					    	}
					        	echo "</tr>";
						}

						echo "</tbody></table>";

					}
					else
					{
					    echo "<div id='refuse'>Vous n'avez pas accés à cette page. <br>Veuillez vous connectez en tant que Admin</div>";
					}
					mysqli_close($connexion);
				}
				

			?>

								
			
			
		
	

</body>
</html>



