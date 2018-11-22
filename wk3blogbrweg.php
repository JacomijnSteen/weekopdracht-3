<?php

//database opzoeken en verbinden
$db = "dbdemo1";
$host = "localhost";
$dsn = "mysql:dbname=$db;host=$host";
$user_name = "root";
$pass_word ="";

$idbrweg=$_POST['id'];

try {
    $connection = new PDO($dsn, $user_name, $pass_word);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $brweg = "DELETE FROM wk3blog WHERE id=$idbrweg";
   
    $connection->exec($brweg);
}  
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}    


// Close connection
$connection = null; 

header('Location: wk3bloglezen.php');
?>

