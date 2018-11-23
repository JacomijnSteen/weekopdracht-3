<!doctypehtml>
<html>
    <head>    
        <title>week3 blog</title>
        <link rel="stylesheet" type="text/CSS" href="blogtst.css">
    </head>
    <body>
    <?php

    //database opzoeken en verbinden
    $db = "dbdemo1";
    $host = "localhost";
    $dsn = "mysql:dbname=$db;host=$host";
    $user_name = "root";
    $pass_word ="";

    try {
        $connection = new PDO($dsn, $user_name, $pass_word);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //Ik wil nu table bekijken
        $sql = "SELECT * FROM wk3blog ORDER BY datum DESC";

        $statement = $connection->prepare($sql);

        $statement->bindParam(":naam", $naam);

        $statement->bindParam(":datum", $datum);

        $statement->bindParam(":email", $email);

        $statement->bindParam(":bericht", $bericht);

        if ($statement->execute()) {       

            
            ?>
            <table  class="tabel"> 
            <tr><td><h2>naam</h2></td><td><h2>datum</h2></td><td><h2>email</h2></td><td><h2>bericht</h2></td></tr>    
            <?php

            while ($row =  $statement->fetch()) {
                
            ?>           
                <tr>
                    <td><?php echo $row['naam'] ?></td>
                    <td><?php echo $row['datum'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['bericht'] ?></td>
                    <td><form action="blogtstweg.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>"/> 
                        <input type="submit" value="verwijderen" name="submit"/></form></td>
                </tr>
        
            <?php
            }
        } else {
            echo "query niet uitgevoerd";
        } 
        
    }

    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }   
            ?>
            </table>
            <?php  
    // Close connection
    $connection = null; 
    ?>
    </body>
</html>