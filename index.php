<?php
// Dieses Register System ist für ein GTA5 RP Server Projekt entwickelt geworden.
// Verschlüsselung des Passwortes via CRYPT BLOWFISH
// Viel Spaß damit
// Peace DerStr1k3r
 
require_once("config/config.php");
require_once("include/bcrypt_class.php");

if(isset($_POST['submit'])){
	
		$username = stripslashes($_POST['username']);
		$email 	= stripslashes($_POST['email']);	
		$socialClub = stripslashes($_POST['socialClub']);
		$password = stripslashes($_POST['password']);
		
		$commandName = stripslashes($_POST['commandName']);
		$ingameName = stripslashes($_POST['ingameName']);

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
			exit();
		}		
	}
?>

<!DOCTYPE html>
<html lang="de-DE">
	<head>
		<meta charset="utf-8">
		<title>CRYPT BLOWFISH | Register</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<!-- Stylesheet -->
		<link href="css/style.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Heebo:700' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</head>
<body>
	<div>
		<form id="blowfish-contact" class="blowfish-contact" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-8">
					<h1>CRYPT BLOWFISH | Register</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<label class="control-label" for="border-right6"><i id="email-icon" class="fa fa-envelope"></i></label>
					<input required style="box-shadow: 0 0 1px rgba(0,0,0, .4);" aria-label="Social Club Name" type="text" name="username" class="field" placeholder="Social Club Name *" value="" maxlength="30" id="border-right6"/>
				</div>
				<div class="col-sm-4">
					<label class="control-label" for="border-right6"><i id="email-icon" class="fa fa-envelope"></i></label>
					<input required style="box-shadow: 0 0 1px rgba(0,0,0, .4);" aria-label="Social Club Name" type="text" name="socialClub" class="field" placeholder="Social Club Name erneut *" value="" maxlength="30" id="border-right6"/>
				</div>				
			</div>		
			<div class="row">
				<div class="col-sm-4">
					<label class="control-label" for="border-right6"><i id="message-icon" class="fa fa-comment"></i></label>
					<input required style="box-shadow: 0 0 1px rgba(0,0,0, .4);" aria-label="E-Mail" type="text" name="username" class="field" placeholder="E-Mail *" value="" maxlength="30" id="border-right6"/>
				</div>
				<div class="col-sm-4">
					<label class="control-label" for="border-right6"><i id="message-icon" class="fa fa-comment"></i></label>
					<input required style="box-shadow: 0 0 1px rgba(0,0,0, .4);" aria-label="Password" type="password" name="password" class="field" placeholder="Password *" value="" maxlength="30" id="border-right6"/>
				</div>				
			</div>			
			<div class="row">
				<div class="col-sm-4">
					<label class="control-label" for="border-right6"><i id="user-icon" class="fa fa-user"></i></label>
					<input required style="box-shadow: 0 0 1px rgba(0,0,0, .4);" aria-label="Charakter Name" type="text" name="commandName" class="field" placeholder="Charakter Name *" value="" maxlength="30" id="border-right6"/>
				</div>
				<div class="col-sm-4">
					<label class="control-label" for="border-right6"><i id="user-icon" class="fa fa-user"></i></label>
					<input required style="box-shadow: 0 0 1px rgba(0,0,0, .4);" aria-label="Password" type="text" name="ingameName" class="field" placeholder="Charakter Name erneut *" value="" maxlength="30" id="border-right6"/>
				</div>				
			</div>
			<hr style="height:0.10rem; border:none; color:#DADADA; background-color:#DADADA; margin-top:40px; margin-bottom:35px;" />
			<div class="row" id="send">
				<div class="col-sm-8">
					<b>Hinweis:</b> Felder mit <span class="pflichtfeld">*</span> müssen ausgefüllt werden.
					<br />
					<br />
					<button type="submit" class="senden" name="submit">Registrieren</submit>			
				</div>
			</div>			
		</form>
	</div>
</body>
</html>