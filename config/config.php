<?php

define('DB_HOST', 'db'); // Docker
// define('DB_HOST', 'localhost'); // XAMPP

//Ruta base
define('BASE_URL', 'http://localhost:8000/');

//controlador y funcion predefinida
define("CONTROLADOR_PRINCIPAL","index");
define("FUNCION_PRINCIPAL", "index");

//ruta de templates
define("HEADER", 'view/templates/header.php');
define("FOOTER", 'view/templates/footer.php');

// ruta de vistas modulo productos
define("VVELAS", "view/velas/vela.");
define("VCATEGORIAS", "view/categorias/categoria.");

// conexion bb
define("DBNAME","CandlesYou_db");
define("DBUSER","user");
define("DBPASSWORD","user");