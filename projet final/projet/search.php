<?php 
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['email']) && isset($_SESSION['motdepasse'])) {

	// On teste pour voir si nos variables ont bien été enregistrées
	echo '<html>';
	echo '<head>';
	echo '<title>recherche</title>';
	echo '</head>';

	echo '<body>';
	 echo 'vous êtes connecté en tant que : '.$_SESSION['email'].''; 
		// On affiche un lien pour fermer notre session
	 echo'<center>'; echo'<div style="margin:0 auto" align=left>
<form action="logout.php">
    <button class="btn default" >Déconnecter</button>
</form></div>';
	echo '<br/>';
	echo'</center>';


	echo '<br/>';


}
else {
	
	echo '<div style="margin:0 40px" align=right>
<form class="chatForm" action="login.php">
    <button class="btn default" >Se connecter</button>
</form>
<form class="chatForm" action="inscription.html">
    <button class="btn default" >Inscription</button>
	
</form></div>';
	
	 mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
     
    mysql_select_db("supermarket") or die(mysql_error());
    /* tutorial_search is the name of database we've created */
}


echo '
<html>
<head>
<title>Recherche</title>
<link rel="stylesheet"  href="stylehome.css">
</head>
<body>



<center>
<form action="search.php" method="GET">
        <input class="btm defaultt" type="text" name="query" />
        <input class="btn default" type="submit" value="Recherche " />
    </form>	
	
	
</center>

<link rel="stylesheet" href="stylehome.css">
<center>
<form class="chatForm" action="home.php">
    <button class="btn default" >Acceuil</button>
	
</form>
<element class="chatForm">
    <button class="btn success" >Catégories :</element>
	
</form>
<form class="chatForm" action="cattelphn.php">
    <button class="btn info" >Télephones Mobiles</button>
	
</form>
<form class="chatForm" action="catinformatique.php">
    <button class="btn warning" >Informatique</button>
	
</form>
<form class="chatForm" action="catelectronique.php">
    <button class="btn danger" >Eléctronique</button>
	
</form>
<form class="chatForm" action="catelectromenager.php">
    <button class="btn warning" >Eléctroménager</button>
	
</form>
</center>
</body>
</html>';








?>
	

 







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php



$server='localhost';
$login='root';
$password='';
$DB='supermarket';
$connect = mysql_connect($server, $login, $password);
mysql_select_db($DB);




    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         

		 
        $raw_results = mysql_query("SELECT * FROM utilisateurs
RIGHT JOIN produits ON utilisateurs.id_user = produits.id_user
            WHERE (`nom_prod` LIKE '%".$query."%') OR (`categorie` LIKE '%".$query."%')") or die(mysql_error());
             
        // * means that it selects all fields, you can also write: `id`, `nom_prod`, `categorie`
        // produits is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `nom_prod`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
              
                // posts results gotten from database(nom_prod and categorie) you can also show id ($results['id'])
				
				
				
				
					echo ' 	<style>
.zoom {
    padding: 10px 10px 10px 10px;
    background-color: white;
    transition: transform .2s; /* Animation */
    width: 200px;
    height: 350px;
    margin: 10px 10px 10px 10px;
	
	  display: inline-block;
}

.zoom:hover {
    transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style> ';

echo '<div class="zoom" >

	
 <img src="data:image/jpeg;base64,' . base64_encode( $results['image'] ) . '" width="200" height="200" /> 
           
			<h3>  <center> ' . $results['nom_prod'] .'</center> </h3>
						<center>	<form action="consulter-prod.php"  method="post">
  <input type="hidden" name="id_prod" value="'.$results['id_prod'].'"/>
          <input class="btc consulter" type="submit" value="Consulter" />
       </form></center>
	 <center>Prix : '. $results['prix'] . ' DA</center>
    	 <center>Quantité : '. $results['qte'] . '</center>
		   <center>Télph-Mobile : ' . $results['mobile'] .'</center> 
<center>Déposé Le : '. $results['date_db'] . '</center>


</div>';
		
				
				
				
				
				
				
            }
             
        }
        else{ // if there is no matching rows do following
            echo "Aucun résultat de recherche trouvé";
        }
         
    }
    else{ // if query length is less than minimum
        echo "La longueur minimum du mot recherché est : ".$min_length;
    }
?>
</body>
</html>



	<div style="margin:0 auto" align=center>
<form action="contactez-nous.html">
    <button class="btn default" >Contactez-Nous</button>
</form></div>
	
