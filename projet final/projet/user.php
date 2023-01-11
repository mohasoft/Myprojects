<?php 

session_start ();

// On récupère nos variables de session
if (isset($_SESSION['email']) && isset($_SESSION['motdepasse'])) {

	// On teste pour voir si nos variables ont bien été enregistrées
	echo '<html>';
	echo '<head>';
	echo '<title>vendeur</title>';
	echo '</head>';

	echo '<body>';
	
	echo 'vous êtes connecté en tant que : '.$_SESSION['email'].'';

	// On affiche un lien pour fermer notre session
	echo'<div style="margin:0 auto" align=left>
<form action="logout.php">
    <button class="btn default" >Déconnecter</button>
</form></div>';
	

	echo'<div style="margin:0 40px" align=right>
<form action="insertion.html">
    <button class="btn danger" >Insérer un produit</button>
</form></div>';
}
else {
	echo 'vous consulter le site comme visiteur.';
}



echo '
<html>
<head>
<title>compte</title>
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
$sql = "SELECT id_user FROM utilisateurs WHERE email='".$_SESSION['email']."'";
$taki;

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

      
        while($row = mysqli_fetch_array($result)){
           
   $taki = $row['id_user'];
	
          
        }
      
        mysqli_free_result($result);
    } else{
        echo "Aucun produit.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Attempt select query execution

$sql = "SELECT *
FROM utilisateurs
RIGHT JOIN produits ON utilisateurs.id_user = produits.id_user
WHERE produits.id_user='".$taki."' and validation=true";

if($result = mysqli_query($link,$sql)){
    if(mysqli_num_rows($result) > 0){

       echo ' 	<fieldset>';
	   echo '	<legend><h1>Mes produits :</h1></legend>';
        while($row = mysqli_fetch_array($result)){
			
	
		
			
					




			
			
				





		
		
	echo ' 	<style>
.zoom {
    padding: 10px 10px 10px 10px;
    background-color: white;
    transition: transform .2s; /* Animation */
    width: 200px;
    height: 400px;
    margin: 50px 50px 50px 50px;
	
	  display: inline-block;
}

.zoom:hover {
    transform: scale(1); /* (50% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style> ';

echo '<div class="zoom" >

	
 <img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" width="200" height="200" /> 
           
			<h3>  <center> ' . $row['nom_prod'] .'</center> </h3>
						<center>	<form action="consulter-prod.php"  method="post">
  <input type="hidden" name="id_prod" value="'.$row['id_prod'].'"/>
          <input class="btc consulter" type="submit" value="Consulter" />
       </form></center>
	 <center>Prix : '. $row['prix'] . ' DA </center>
    	 <center>Quantité : '. $row['qte'] . '</center>
		 <center>Telph-mobile : '. $row['mobile'] . '</center>
<center>Déposé Le : '. $row['date_db'] . '</center>

	   

	
	<table>
<tr>
<th> <center>    <form action="modifier-prod.php"  method="post">
  <input type="hidden" name="id_prod" value="'.$row['id_prod'].'"/>
          <input class="btn success" type="submit" value="Modifier" />
       </form>	    </center>			
  </th> 
	<th>    </center> <form action="delete.php"  method="post">
  <input type="hidden" name="id_prod" value="'.$row['id_prod'].'"/>
          <input class="btn danger" type="submit" value="Delete" />
       </form>  
	   </center>          
</th>  </tr>
</table>
	   
</div>

	   			
      
	   
';	
            
			

			

    
			

        }
		
     


        // Free result set
        mysqli_free_result($result);
		echo ' 	</fieldset>';
    } else{
        echo 'vous avez aucun produit pour afficher';
    }
} else{
    echo 'ERROR: Could not able to execute $sql'  . mysqli_error($link);
}







?>
	
	
	
	
