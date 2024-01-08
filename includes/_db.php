<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "r_user";

try {
    $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $conexion = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}