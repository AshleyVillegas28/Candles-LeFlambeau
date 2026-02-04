<?php

require_once __DIR__ . '/config.php'; 

class Conexion {
    public static function getConexion() {
        $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DBNAME . ';charset=utf8';
        $conexion = null;

        try {
            $conexion = new PDO($dsn, DBUSER, DBPASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        } catch (Exception $e) {
            die("Error de conexión: " . $e->getMessage());
        }

        return $conexion;
    }
}