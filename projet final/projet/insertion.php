<?php 
$server='localhost';
$login='root';
$password='';
$DB='supermarket';
$connect = mysql_connect($server, $login, $password);
mysql_select_db($DB);



session_start ();


// On récupère nos variables de session
if (isset($_SESSION['email']) && isset($_SESSION['motdepasse'])) {

	// On teste pour voir si nos variables ont bien été enregistrées
	echo '<html>';
	echo '<head>';
	echo '<title>Insertion</title>';
	echo '</head>';

	echo '<body>';
echo 'Votre login est '.$_SESSION['email'].'';
echo ' <br>';
echo 'Produit ajouté avec succès.' ;
echo '<br />';
 echo 'clicker pour ajouter un autre produit : ';
	echo '<a href="insertion.html"><input type="button" value="Insertion"></a>';
	echo '<br />';

	// On affiche un lien pour fermer notre session
	echo '<a href="./logout.php">Déconnection</a>';
}
else {
}




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
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}




$nom_prod = $_POST['nom_prod'];
$categorie = $_POST['categorie'];
$qte = $_POST['qte'];
$prix = $_POST['prix'];



$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));



$query="INSERT INTO produits
            SET




            nom_prod='".$nom_prod."',
           categorie='".$categorie."',
            qte='".$qte."',
            prix='".$prix."',            
            date_db=CURRENT_TIMESTAMP,
			id_user='".$taki."',
			validation=false,
            image='".$image."'";
			
         
	
      
mysql_query($query);

header('Location: user.php');
