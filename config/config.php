<?php

// Base de datos
define('DB_HOST', getenv('DB_HOST') ?: 'db');
define('DB_PORT', getenv('DB_PORT') ?: '3306');
define('DBNAME', getenv('DB_NAME') ?: 'CandlesYou_db');
define('DBUSER', getenv('DB_USER') ?: 'user');
define('DBPASSWORD', getenv('DB_PASS') ?: 'user');

// Ruta base
define('BASE_URL', getenv('BASE_URL') ?: 'http://localhost:8000/');

// Controlador y función predeterminada
define("CONTROLADOR_PRINCIPAL","index");
define("FUNCION_PRINCIPAL", "index");

// Rutas de templates y vistas
define("HEADER", 'view/templates/header.php');
define("FOOTER", 'view/templates/footer.php');

define("VVELAS", "view/velas/vela.");
define("VCATEGORIAS", "view/categorias/categoria.");