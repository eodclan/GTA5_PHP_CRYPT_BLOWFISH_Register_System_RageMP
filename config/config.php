<?php
// Dieses Register System ist für ein GTA5 RP Server Projekt entwickelt geworden.
// Verschlüsselung des Passwortes via CRYPT BLOWFISH
// Viel Spaß damit
// Peace DerStr1k3r
 
$conn = mysqli_connect("localhost","root","password","datenbankname");

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>