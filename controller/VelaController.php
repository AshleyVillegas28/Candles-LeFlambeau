<?php
require_once 'model/dao/VelasDAO.php';
require_once 'model/dto/Vela.php';
require_once 'utils/functions.php';

class VelaController{

    private $model;

    public function __construct()
    {
        $this->model = new VelasDAO();
    }

    public function index()
    {
        $resultados = $this->model->selectAll('');
        $titulo = 'Lista de Velas';
        require_once VVELAS . 'list.php';
    }

    public function search()
    {
        $parametro = htmlspecialchars($_POST['b'] ?? '');
        $resultados = $this->model->selectAll($parametro);
        $titulo = 'Lista de Velas';
        require_once VVELAS . 'list.php';
    }

    public function delete()
    {
        
    }

    public function view_new()
    {
        $titulo = 'Nueva VELA';
        require_once VVELAS . 'nuevo.php';
    }

    public function new()
    {
        
    }

    public function view_edit()
    {
        $titulo = 'Editar VELA';
        require_once VVELAS . 'edit.php';
    }

    public function edit()
    {
        
    }

    public function populate(array $row): Vela
    {
        $this->id_vela = $row['id_vela'] ?? null;
        $this->nombre = $row['nombre'] ?? null;
        $this->descripcion = $row['descripcion'] ?? null;
        $this->precio = $row['precio'] ?? null;
        $this->stock = $row['stock'] ?? null;
        $this->aroma = $row['aroma'] ?? null;
        $this->color = $row['color'] ?? null;
        $this->id_categoria = $row['id_categoria'] ?? null;
        $this->fecha_registro = $row['fecha_registro'] ?? null;

        return $this;
    }

}