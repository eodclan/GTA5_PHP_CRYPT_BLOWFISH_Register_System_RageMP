<?php
// Dieses Register System ist für ein GTA5 RP Server Projekt entwickelt geworden.
// Verschlüsselung des Passwortes via CRYPT BLOWFISH
// Viel Spaß damit
// Peace DerStr1k3r
 
require_once("config/config.php");
require_once("include/bcrypt_class.php");

if(isset($_POST['submit'])){
	
		$username = htmlentities(strip_tags(trim($_POST['username'])));
		$email 	= htmlentities(strip_tags(trim($_POST['email'])));		
		$socialClub = htmlentities(strip_tags(trim($_POST['socialClub'])));
		$password = htmlentities(strip_tags(trim($_POST['password'])));
		
		$commandName = htmlentities(strip_tags(trim($_POST['commandName'])));
		$ingameName = htmlentities(strip_tags(trim($_POST['ingameName'])));
			
		$options = array("$2a$%02d$"=>13);
		$hashPassword = password_hash($password,CRYPT_BLOWFISH);
		
		$sql = "insert into accounts (username, email, password, socialClub) value('".$username."', '".$email."', '".$hashPassword."','".$socialClub."')";
		$result = mysqli_query($conn, $sql);
		if($result)
		{
			echo "Deine Registrierung wurde erfolgreich abgeschlossen!<br>";
		}
		$sql2 = "insert into characters (commandName, ingameName) value('".$commandName."', '".$ingameName."')";
		$result2 = mysqli_query($conn, $sql2);
		// Platzhalter ^^
		if($result2)
		{
			// echo "Der Charakter Name wurde Erfolgreich gesetzt!";
		}		
	}
?>

<h1>CRYPT BLOWFISH | Register</h1>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="username" value="" placeholder="Social Club Name"><br>
	<input type="text" name="socialClub" value="" placeholder="Social Club Name erneut"><br>
	<input type="text" name="email" value="" placeholder="Email"><br>
	<input type="password" name="password" value="" placeholder="Password"><br>
	<input type="text" name="commandName" value="" placeholder="Charakter Name"> ( Vorname Nachname )<br>
	<input type="text" name="ingameName" value="" placeholder="Charakter Name erneut eingeben"> ( Vorname Nachname )<br>
	
	<button type="submit" name="submit">Registrieren</submit>
</form>