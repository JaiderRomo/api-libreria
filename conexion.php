<?php
$host = 'mysql'; // nombre del servicio en docker-compose.yml
$db   = 'biblioteca';
$user = 'root';
$pass = 'root'; // también lo defines en docker-compose.yml
$charset = 'utf8mb4';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

