<?php
$host = 'mysql.railway.internal';
$port = 3306;
$db   = 'railway';
$user = 'root';
$pass = 'GpbdPRfYHNYmGfTNcAgvbKVDccYBQCiC'; 
$charset = 'utf8mb4';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

