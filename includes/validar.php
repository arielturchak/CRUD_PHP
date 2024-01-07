<?php
try {
    $conexion = new PDO("mysql:host=localhost;dbname=r_user", "root", "");//hago la conexion con pdo
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['registrar'])) {//verifico si el formulario se envio (cuando se aprieta el boton de ingresar)
        if (//valores del name del formulario
            strlen($_POST['nombre']) >= 1 &&
            strlen($_POST['correo']) >= 1 &&
            strlen($_POST['telefono']) >= 1 &&
            strlen($_POST['password']) >= 1 &&
            strlen($_POST['rol']) >= 1
        ) {//guardo los datos en una variable y elimino espacios vacios con trim
            $nombre = trim($_POST['nombre']);
            $correo = trim($_POST['correo']);
            $telefono = trim($_POST['telefono']);
            $password = trim($_POST['password']);
            $rol = trim($_POST['rol']);
            //inserto en la tabla user
            $consulta = "INSERT INTO user (nombre, correo, telefono, password, rol)
                         VALUES (:nombre, :correo, :telefono, :password, :rol)";
            // preparo la consulta
             $stmt = $conexion->prepare($consulta);
            // Se vinculan los parámetros de la consulta con los valores obtenidos del formulario.
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':rol', $rol);

            $stmt->execute();//se ejecuta la consulta preparada

            header('Location: ../views/user.php');//redirecciono a la pagina de usuarios despues registrarse
            exit();//se termina la ejecucion del script
        }
    }
} catch (PDOException $e) { // En caso de que ocurra un error en la conexión o la ejecución de la consulta, se captura la excepción y se muestra un mensaje.
    echo "Error en la conexión: " . $e->getMessage();
}








?>