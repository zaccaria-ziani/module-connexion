<?php 	session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" href="moduleconnexion.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
</head>
<body class="bodyindex">
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


</body>
</html>

<?php

	#ini_set('display_errors','off');



	

  	if (isset($_SESSION['login'])) 
  	{
  		echo "<div id='accueil'>Bienvenue ".$_SESSION['login']. " !</div>";
  	}
  	else
  	{
  		echo "<div id='accueil>Veuillez vous connectez</div>";
  	}

  	

  	


  	
	

?>



