<?php




define('_HOST_NAME_', 'localhost');
define('_USER_NAME_', 'root');
define('_DB_PASSWORD', '');
define('_DATABASE_NAME_', 'supermarket');

//PDO Database Connection
try {
 $databaseConnection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
 $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
 echo 'ERROR: ' . $e->getMessage();
}


    // create PDO instance; assign it to $db variable
    $sql = "DELETE FROM `produits` WHERE `id_prod` = :id_prod LIMIT 1";
    $smt = $databaseConnection->prepare($sql);
    $smt->bindParam(':id_prod', $_POST['id_prod'], PDO::PARAM_INT);
    $smt->execute();

header('Location: admin.php');