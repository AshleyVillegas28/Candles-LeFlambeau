<?php

require_once __DIR__ . '/config.php'; 

class Conexion {
    public static function getConexion() {
        $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DBNAME;
        $conexion = null;

        try {
            $conexion = new PDO($dsn, DB_USER, DB_PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die("Error de conexión: " . $e->getMessage());
        }

        return $conexion;
    }
}