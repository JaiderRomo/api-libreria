<?php
$host = "dpg-xxxxxabcdef1234xx.render.com"; 
$dbname = 'biblioteca';
$user = 'root';
$pass = '4iDgnJrk1GNMig04wFTdgma16MlG6mPW';
$charset = 'utf8mb4';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

