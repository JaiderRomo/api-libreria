<?php
$host = 'metro.proxy.rlwy.net';
$port = 29819;
$db   = 'railway';
$user = 'root';
$pass = 'GpbdPRfYHNYmGfTNcAgvbKVDccYBQCiC'; 
$charset = 'utf8mb4';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=$charset", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

