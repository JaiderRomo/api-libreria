<?php

header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

require 'conexion.php';

// Manejo de solicitud previa (preflight request)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

// Si el ID viene en GET, se usa; si viene en JSON (PUT/DELETE), se captura
$id = $_GET['id'] ?? ($input['id'] ?? null);

switch ($method) {
    case 'GET':
        if ($id) {
            $stmt = $pdo->prepare("SELECT * FROM libros WHERE id = ?");
            $stmt->execute([$id]);
            $libro = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($libro ?: ['error' => 'Libro no encontrado']);
        } else {
            $stmt = $pdo->query("SELECT * FROM libros");
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        break;

    case 'POST':
        if (!isset($input['nombre'], $input['autor'], $input['publicacion'])) {
            echo json_encode(['error' => 'Datos incompletos']);
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO libros (nombre, autor, fecha) VALUES (?, ?, ?)");
        $stmt->execute([$input['nombre'], $input['autor'], $input['publicacion']]);
        echo json_encode(['mensaje' => 'Libro agregado correctamente']);
        break;

    case 'PUT':
        if (!$id || !isset($input['nombre'], $input['autor'], $input['publicacion'])) {
            echo json_encode(['error' => 'ID y datos incompletos']);
            exit;
        }

        $stmt = $pdo->prepare("UPDATE libros SET nombre = ?, autor = ?, fecha = ? WHERE id = ?");
        $stmt->execute([$input['nombre'], $input['autor'], $input['publicacion'], $id]);
        echo json_encode(['mensaje' => 'Libro actualizado correctamente']);
        break;

    case 'DELETE':
        if (!$id) {
            echo json_encode(['error' => 'ID requerido']);
            exit;
        }

        $stmt = $pdo->prepare("DELETE FROM libros WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['mensaje' => 'Libro eliminado correctamente']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Método no permitido']);
}
?>