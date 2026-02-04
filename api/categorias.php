<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once '../model/dao/CategoriaDAO.php';

$dao = new CategoriaDAO();
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $buscar = $_GET['b'] ?? '';
        echo json_encode($dao->selectAll($buscar));
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);

        $cat = new Categoria();
        $cat->setNombre($data['nombre']);
        $cat->setDescripcion($data['descripcion']);

        echo json_encode([
            "success" => $dao->insert($cat)
        ]);
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
        break;
}
?>