<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// --- Conexión a la base de datos ---
$host = "bue7uxydn0p1pbb45knd-mysql.services.clever-cloud.com";
$dbname = "bue7uxydn0p1pbb45knd";
$user = "uefxmppat3v0f3im";
$pass = "RtKaOQ9IoetYXLuaSIYi";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(["error" => "Error de conexión: " . $e->getMessage()]);
    exit;
}

// --- Funciones CRUD ---
$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        // Opcional: buscar por id o traer todo
        $id = $_GET['b'] ?? '';
        if ($id) {
            $stmt = $conn->prepare("SELECT * FROM categorias WHERE id_categoria = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        } else {
            $stmt = $conn->prepare("SELECT * FROM categorias ORDER BY id_categoria ASC");
        }
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $conn->prepare("INSERT INTO categorias (nombre, descripcion) VALUES (:nombre, :descripcion)");
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':descripcion', $data['descripcion']);
        $success = $stmt->execute();
        echo json_encode(["success" => $success]);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $conn->prepare("UPDATE categorias SET nombre = :nombre, descripcion = :descripcion WHERE id_categoria = :id");
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':descripcion', $data['descripcion']);
        $stmt->bindParam(':id', $data['id_categoria'], PDO::PARAM_INT);
        $success = $stmt->execute();
        echo json_encode(["success" => $success]);
        break;

    case 'DELETE':
        $id = $_GET['id_categoria'] ?? '';
        if ($id) {
            $stmt = $conn->prepare("DELETE FROM categorias WHERE id_categoria = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $success = $stmt->execute();
            echo json_encode(["success" => $success]);
        } else {
            echo json_encode(["success" => false, "error" => "No se indicó ID"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
        break;
}
?>