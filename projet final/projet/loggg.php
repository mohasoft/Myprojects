 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";





// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//10
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email= $_POST['email'];
$mdp = $_POST['motdepasse'];
$sql = "SELECT email,motdepasse FROM admin where email='$email' and motdepasse='$mdp' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
		session_start ();
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['motdepasse'] = $_POST['motdepasse'];
    header("location: admin.php");
} else {
$sql1 = "SELECT email,motdepasse FROM utilisateurs where email='$email' and motdepasse='$mdp' ";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
	session_start ();
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['motdepasse'] = $_POST['motdepasse'];
    header("location: user.php");
}else{
echo "Email ou Mot de passe incorrect";
}
}
$conn->close();




?> 