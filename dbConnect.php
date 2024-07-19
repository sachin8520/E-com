<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "himalayanputri";

/*$servername = "localhost";
$username = "u234630156_ecom_task";
$password = "g4D1b@RjmG*";
$dbname = "u234630156_ecom_task";*/

$mysql=mysqli_connect($servername,$username,$password,$dbname);


try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}


