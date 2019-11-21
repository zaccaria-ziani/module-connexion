<?php


session_start();
$connexion= mysqli_connect("localhost","root","","moduleconnexion");

$query="SELECT * from utilisateurs WHERE login = '".$_SESSION['login']."' ";
$result= mysqli_query($connexion, $query);
$row = mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<link rel="stylesheet" href="moduleconnexion.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
</head>
<body class="bodymvp">
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
	<div class="formulaireprofil">
		<h1 id="titremvp">Modifier votre profil </h1>
		<form action="profil.php" method="post">
				

				<div class="infoprofil">
					
					<label for="login">Login :<br> </label>
					<input type="text" name="login" id="login" required value="<?php echo $row['login']?>">

					<br>
					<br>

					<label for="prenom">Prenom :<br></label>
					<input type="text" name="prenom" id="prenom" value="<?php echo $row['prenom']?>">

					<br>
					<br>


					<label for="nom">Nom :<br></label>
					<input type="text" name="nom" id="nom" value="<?php echo $row['nom']?>">

					<br>
					<br>

					<label for="password">Mot de passe :<br></label>
					<input type="password" name="password" id="password" required value="<?php echo $row['password']?>">

					<br>
					<br>


					<label for="confirmpassword">Confirmer mot de passe : <br></label>
					<input type="password" name="confirmpassword" id="confirmpassword" required>
					<br>
					<br>

					<input type="submit" value="Modifier" name="modifier" /><br>
				</div>

				
		</form>
		
	</div>
	

</body>
</html>

<?php 

if(isset($_POST['modifier']))
{
	$connexion = mysqli_connect("localhost", "root","", "moduleconnexion");
		$login = $_POST['login'] ;                   
		$requete3 = "SELECT login FROM utilisateurs WHERE login = '$login'";         
		$query3 = mysqli_query($connexion, $requete3);         
		$resultat3 = mysqli_fetch_all($query3);             
		if (!empty($resultat3))             
		{                 
			echo "<div id='false3'>Ce Login est déjà prit</div>";             
		}             
		elseif($_POST["password"] != $_POST["confirmpassword"])            
		{                
			echo "<div id='false3'>Les mots de passe ne correspondent pas</div>";            
		}
		else
		{
			if($_POST['login'] != $row['login'])

			{
			   $connexion = mysqli_connect("localhost","root","","moduleconnexion");
			   $query = "UPDATE utilisateurs SET login = '".$_POST['login']."' WHERE utilisateurs.login='".$row['login']."'";
			   $result = mysqli_query($connexion, $query);
			   
			}
			if($_POST['prenom'] != $row['prenom'])
			{
			   $connexion = mysqli_connect("localhost","root","","moduleconnexion");
			   $query = "UPDATE utilisateurs SET prenom = '".$_POST['prenom']."' WHERE utilisateurs.prenom='".$row['prenom']."'";
			   $result = mysqli_query($connexion, $query);

			}
			if($_POST['nom'] != $row['nom'])
			{
			   $connexion = mysqli_connect("localhost","root","","moduleconnexion");
			   $query = "UPDATE utilisateurs SET nom = '".$_POST['nom']."' WHERE utilisateurs.nom='".$row['nom']."'";
			   $result = mysqli_query($connexion, $query);

			}
			if($_POST['password'] != $row['password'])
			{
			   $connexion = mysqli_connect("localhost","root","","moduleconnexion");
			   $query = "UPDATE utilisateurs SET password = '".$_POST['password']."' WHERE utilisateurs.password='".$row['password']."'";
			   $result = mysqli_query($connexion, $query);

			}
		}
             
   


}


?>