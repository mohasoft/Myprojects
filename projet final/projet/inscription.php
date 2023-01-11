<?php 
$server='localhost';
$login='root';
$password='';
$DB='supermarket';
$connect = mysql_connect($server, $login, $password);
mysql_select_db($DB);

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$motdepasse = $_POST['motdepasse'];
$mobile = $_POST['mobile'];
$adresse = $_POST['adresse'];

$query="INSERT INTO utilisateurs
            SET
            
            nom='".$nom."',
            prenom='".$prenom."',
            email='".$email."',    
            motdepasse='".$motdepasse."',        
            mobile='".$mobile."',
            adresse='".$adresse."'";
mysql_query($query);

header('Location: login.php');
