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


// iK WIL HIER HET BERICHT VERWIJDEREN GESCHREVEN BIJ DE EERSTE POST
    $brweg = "UPDATE WK3BLOG SET bericht='' WHERE id=1 ";
    $result = $connection->query($brweg);
}  

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}   

// even lezen of het gelukt is:
        $sql = "SELECT * FROM wk3blog";

        $statement = $connection->prepare($sql);

        $statement->bindParam(":naam", $naam);

        $statement->bindParam(":datum", $datum);

        $statement->bindParam(":email", $email);

        $statement->bindParam(":bericht", $bericht);

        if  ($statement->execute()) {       
 
            ?>
            <table border='1'> 
                <tr><td>naam</td><td>datum</td><td>email</td><td>bericht</td></tr>     
            <?php

            while ($row =  $statement->fetch()) {

            ?>           
                <tr><td><?php echo $row['naam'] ?></td><td><?php echo $row['datum'] ?></td><td><?php echo $row['email'] ?></td><td><?php echo $row['bericht'] ?></td></tr>
            <?php
            }
            } else{
                echo "query niet uitgevoerd";
        } 

    ?>
    </table>
    <?php
// Close connection
$connection = null; 

?>

