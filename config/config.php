<?php

// Base de datos
define('DB_HOST', getenv('DB_HOST') ?: 'bue7uxydn0p1pbb45knd-mysql.services.clever-cloud.com');
define('DBNAME', getenv('DBNAME') ?: 'bue7uxydn0p1pbb45knd');
define('DB_USER', getenv('DB_USER') ?: 'uefxmppat3v0f3im');
define('DB_PASS', getenv('DB_PASS') ?: 'RtKaOQ9IoetYXLuaSIYi');
define('DB_PORT', getenv('DB_PORT') ?: '3306');

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