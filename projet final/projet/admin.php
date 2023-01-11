<?php 

session_start ();

// On récupère nos variables de session
if (isset($_SESSION['email']) && isset($_SESSION['motdepasse'])) {

	// On teste pour voir si nos variables ont bien été enregistrées
	echo '<html>';
	echo '<head>';
	echo '<title>Administration</title>';
	echo '</head>';

	echo '<body>';
	echo 'vous êtes connecté en tant que  : '.$_SESSION['email'].'';
	echo '<br />';

	// On affiche un lien pour fermer notre session
	
	
	 echo'<center>'; echo'<div style="margin:0 auto" align=left>
<form action="logout.php">
    <button class="btn default" >Déconnecter</button>
</form></div>';
	echo '<br/>';
	echo'</center>';
	

	
}
else {
	echo 'Les variables ne sont pas déclarées.';
}



echo '
<html>
<head>
<title>Administration</title>
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
<form class="chatForm" action="home.php">
    <button class="btn info" >Télephones Mobiles</button>
	
</form>
<form class="chatForm" action="home.php">
    <button class="btn warning" >Informatique</button>
	
</form>
<form class="chatForm" action="home.php">
    <button class="btn danger" >Eléctronique</button>
	
</form>
<form class="chatForm" action="home.php">
    <button class="btn warning" >Eléctroménager</button>
	
</form>
</center>
</body>
</html>';


$link = mysqli_connect("localhost", "root", "", "supermarket");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM produits,utilisateurs where utilisateurs.id_user=produits.id_user and validation=false";


if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
			
        echo ' <fieldset>';
		echo '	<legend><h1>Produits Non-Validés :</h1></legend>';
        while($row = mysqli_fetch_array($result)){
     
	 
	 
	 		
	echo ' 	<style>
.zoom {
    padding: 10px 10px 10px 10px;
    background-color: white;
    transition: transform .2s; /* Animation */
    width: 200px;
    height: 400px;
    margin: 10px 10px 10px 10px;
	
	  display: inline-block;
}

.zoom:hover {
    transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style> ';

echo '<div class="zoom" >

	
 <img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" width="200" height="200" /> 
           
			<h3>  <center> ' . $row['nom_prod'] .'</center> </h3>
	 <center>Prix : '. $row['prix'] . ' DA</center>
    	 <center>Quantité : '. $row['qte'] . '</center>
		 <center>Telph-mobile : '. $row['mobile'] . '</center>
<center>Déposé Le : '. $row['date_db'] . '</center>



<table>
<tr>
<th><center>   <form action="valid-prod-admin.php"  method="post">
  <input type="hidden" name="id_prod" value="'.$row['id_prod'].'"/>
          <input class="btn success" type="submit" value="Valider" />
       </form>
	    </center>			
  </th>   
 <th> </center>
	  <form action="delete-prod-admin.php"  method="post">
  <input type="hidden" name="id_prod" value="'.$row['id_prod'].'"/>
          <input class="btn danger" type="submit" value="Delete" />
       </form>
	   			
      </center>
</th>  </tr>
</table>
		
</div>';
	 
	 
	 
	 
	 
        }
       
        // Free result set
        mysqli_free_result($result);
		echo ' 	</fieldset>';
    } else{
        
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}












$link = mysqli_connect("localhost", "root", "", "supermarket");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM produits,utilisateurs where utilisateurs.id_user=produits.id_user and validation=true";


if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
			
        echo ' <fieldset>';
		echo '	<legend><h1>Produits validés :</h1></legend>';
        while($row = mysqli_fetch_array($result)){
     
	 
	 
	 		
	echo ' 	<style>
.zoomm {
    padding: 10px 10px 10px 10px;
    background-color: white;
    transition: transform .2s; /* Animation */
    width: 200px;
    height: 470px;
    margin: 10px 10px 10px 10px;
	
	  display: inline-block;
}

.zoomm:hover {
    transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style> ';

echo '<div class="zoomm" >

	
 <img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" width="200" height="200" /> 
           
			<h3>  <center> ' . $row['nom_prod'] .'</center> </h3>
						<center>	<form action="consulter-prod.php"  method="post">
  <input type="hidden" name="id_prod" value="'.$row['id_prod'].'"/>
          <input class="btc consulter" type="submit" value="Consulter" />
       </form></center>
	 <center>Prix : '. $row['prix'] . ' DA</center>
    	 <center>Quantité : '. $row['qte'] . '</center>
		 <center>Telph-mobile : '. $row['mobile'] . '</center>
<center>Déposé Le : '. $row['date_db'] . '</center>


<center>   <form action="delete-prod-admin.php"  method="post">
  <input type="hidden" name="id_prod" value="'.$row['id_prod'].'"/>
          <input class="btn danger" type="submit" value="Delete" />
       </form>
	   			
      </center>


</div>';
		

	 
	 
	 
	 
	 
        }
       
        // Free result set
        mysqli_free_result($result);
		echo ' 	</fieldset>';
    } else{
       
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}















$lllink = mysqli_connect("localhost", "root", "", "supermarket");
 
// Check connection
if($lllink === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sqlll = "SELECT * FROM utilisateurs";


if($result = mysqli_query($lllink, $sqlll)){
    if(mysqli_num_rows($result) > 0){
		
        echo ' <fieldset>';
	echo '	<legend><h1>Clients :</h1></legend>';
        while($row = mysqli_fetch_array($result)){
     
	 
	 
	 		
	echo ' 	<style>
.zoom {
    padding: 10px 10px 10px 10px;
    background-color: white;
    transition: transform .2s; /* Animation */
    width: 200px;
    height: 400px;
    margin: 10px 10px 10px 10px;
	
	  display: inline-block;
}

.zoom:hover {
    transform: scale(1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style> ';





echo '<div class="zoom" >


       
			<h3>  <center>Nom : ' . $row['nom'] .'</center> </h3>
		<h3>  <center>Prenom : ' . $row['prenom'] .'</center> </h3>
	<h3>  <center>Email : ' . $row['email'] .'</center> </h3>
	<h3>  <center>Téleph-Mobile :  ' . $row['mobile'] .'</center> </h3>
		<h3>  <center> Adresse :' . $row['adresse'] .'</center> </h3>
	
	
	
	
 <center> <form action="delete-user.php"  method="post">
  <input type="hidden" name="id_user" value="'.$row['id_user'].'"/>
          <input class="btn danger" type="submit" value="Delete" />
       </form></center>
	   			
     


</div>';
		

	 
	 
	 
	 
	 
        }
       
        // Free result set
        mysqli_free_result($result);
		echo ' 	</fieldset>';
    } else{
        echo "aucun produit.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}



















?>
