<?php
require_once("_db.php");

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'editar_registro':
            editar_registro();
            break;

        case 'eliminar_registro':
            eliminar_registro();
            break;

        case 'acceso_user':
            acceso_user();
            break;
    }
}

function editar_registro()
{
    $conexion = new PDO("mysql:host=localhost;dbname=r_user", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    extract($_POST);//extraigo todos los datos del array para editar el q quiera
    $id = $_POST['id'];

    $consulta = "UPDATE user SET nombre = :nombre, correo = :correo, telefono = :telefono,
                password = :password, rol = :rol WHERE id = :id";

    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':rol', $rol);
    $stmt->bindParam(':id', $id);

    $stmt->execute();

    header('Location: ../views/user.php');
}

function eliminar_registro()
{
    $conexion = new PDO("mysql:host=localhost;dbname=r_user", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['id'];

    $consulta = "DELETE FROM user WHERE id = :id";

    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':id', $id);

    $stmt->execute();

    header('Location: ../views/user.php');
}

function acceso_user()
{
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['nombre'] = $nombre;

    $conexion = new PDO("mysql:host=localhost;dbname=r_user", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $consulta = "SELECT * FROM user WHERE nombre = :nombre AND password = :password";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $filas = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($filas['rol'] == 1) { //admin
        header('Location: ../views/user.php');
    } else if ($filas['rol'] == 2) { //lector
        header('Location: ../views/lector.php');
    } else {
        header('Location: login.php');
        session_destroy();
    }
}


