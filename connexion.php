<?php session_start(); ?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Page de connexion</title>
            <link rel="stylesheet" href="moduleconnexion.css">
            <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
        </head>
    <body class="bodyconnexion">
    	<header>
            
            <nav id="menuheader1">
                <div id="menuheader2">
                    <span class="headerspace"><a href="index.php">Index </a></span>
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
	
	$connexion = mysqli_connect("localhost", "root","", "moduleconnexion");

	$requete = "SELECT * FROM utilisateurs";

	$query = mysqli_query($connexion, $requete);

	$result = mysqli_fetch_all($query);

	$cmp= false ;

	if(isset($_POST['connexion']) == true)
	{
	    foreach($result as $key => $value)
	    {
	        if($result[$key][1] == $_POST['login'] && $result[$key][4] == $_POST['password'])
	        {
	            $cmp = true;
	        }
	        
	        
	        
	    }
	    if($cmp == true)
		{
			
	    	$_SESSION['login'] = $_POST['login'];
	    	echo "<div id='false'>Bienvenue ".$_SESSION['login']. " !</div>";
		}

		else
		{
			echo '<div id="false">Login ou mot de passe incorrect</div>';
		}

	}

	if(empty($_SESSION['login']))
    {
        echo '<div class="formulaireconnexion">
			<h1 id="titreconnexion">Connexion</h1><form method="POST" action="connexion.php">
			<div class="infoconnexion">
            <label for="login">Login :<br> </label> 
            <input type="text" name="login" required><br><br>
            <label for="password">Mot de passe :<br></label><input type="password" name="password" required><br><br>
                <input type="submit" value="Connexion" name="connexion">
               
            </div>
        	</form>
        	</div> ';
    }
    else
    {
        echo "";
    }

    if(isset($_POST["login"]))
    {
        $login=$_POST["login"];
    }      
    else 
    {
        $login="";
    }     
    $_SESSION['login'] = $login;
    if($_SESSION['login'] == "admin")
        {
            
            header('Location:admin.php');  
        }

	mysqli_close($connexion);



?>

