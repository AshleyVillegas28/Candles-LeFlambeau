<?php

require_once __DIR__ . '/config.php'; 

class Conexion {
    public static function getConexion() {
        $dsn = 'mysql:host=' . DB_HOST . ';port=3306;dbname=' . DBNAME;
        $conexion = null;

        try {
            $conexion = new PDO($dsn, DBUSER, DBPASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die("Error de conexión: " . $e->getMessage());
        }

        return $conexion;
    }
}