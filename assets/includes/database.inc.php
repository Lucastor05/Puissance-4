<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';

try{
    $conn = new PDO("mysql:host=$servername;dbname=Puissance-4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "ERROR : " . $e->getMessage();
}
?>

