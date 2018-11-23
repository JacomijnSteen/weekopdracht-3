<?php

//database opzoeken en verbinden
$db = "dbdemo1";
$host = "localhost";
$dsn = "mysql:dbname=$db;host=$host";
$user_name = "root";
$pass_word = "";

$brweg = $_POST['id'];


try {
    $connection = new PDO($dsn, $user_name, $pass_word);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $rijweg= "DELETE FROM wk3blog WHERE id=$brweg";
   
    $connection->exec($rijweg);
}  
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}    

// Close connection
$connection = null; 

header('Location:blogtstlezen.php');
?>

