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
    $sql = "DELETE FROM `utilisateurs` WHERE `id_user` = :id_user LIMIT 1";
    $smt = $databaseConnection->prepare($sql);
    $smt->bindParam(':id_user', $_POST['id_user'], PDO::PARAM_INT);
    $smt->execute();

header('Location: admin.php');