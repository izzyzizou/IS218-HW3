<?php
mysql_connect('localhost', 'username', 'password') or die('Could not connect: ' . mysql_error());

$id = 5;
try {
    $conn = new PDO('mysql:host=sql1.njit.edu;dbname=myDatabase', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
     
    $stmt = $conn->prepare('SELECT * FROM myTable WHERE id = :id');
    $stmt->execute(array('id' => $id));
 
    while($row = $stmt->fetch()) {
        print_r($row);
    }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>