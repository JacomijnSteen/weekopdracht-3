<?php

  //fouten melden!!
    error_reporting(1);
    ini_set('display_errors',1);

    $naam=$_POST['naam'];
    $datum=$_POST['datum'];
    $bericht=$_POST['blogbericht'];
    $email = $_POST['email'];

    echo "Je bericht is opgeslagen";
      
 //  connectie maken    
    $db = "dbdemo1";
    $host = "localhost";
    $dsn = "mysql:dbname=$db;host=$host";
    $user_name = "root";
    $pass_word = "";
      
    try {
      $connection = new PDO($dsn, $user_name, $pass_word);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
          
      $sql = "INSERT INTO wk3blog (naam, datum, email, bericht) 
              VALUES ('$naam', '$datum', '$email', '$bericht')";
      
      $connection->exec($sql);
         
    }
      
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }   
      
  // Close connection
    $connection = null; 
    
    
    header('Location: wk3bloglezen.php');
?>
  
  