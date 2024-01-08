<?php
session_start();//inicio sesion


$validar = $_SESSION['nombre'];

if ($validar == null || $validar == '') {//si no existe el nombre de usuario o es nulo lo redirecciono al login
    header("Location: ../includes/login.php");
    die();//detengo ls ejecucion del script despues de redirigir al usuario
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/es.css">
    <title>Usuarios</title>
    <style>
      body{
        background-image: url('../img/mobile-phone7.jpg');
        background-size:cover;
        color: white;
        text-shadow: 5px 15px 15px solid red;
        
      }
    </style>
</head>

<body>

    <div class="container is-fluid">
        <div class="col-xs-12">
            <h1>Bienvenido Usuario: <?php echo $_SESSION['nombre']; ?></h1>
            <br>
            <h2>Lista de usuarios</h2>
            <br>
            <div>
                <a class="btn btn-success" href="../index.php">Nuevo usuario
                    <i class="bi bi-person-plus"></i> </a>
                <a class="btn btn-warning" href="../includes/_sesion/cerrarSesion.php">Log Out
                    <i class="bi bi-box-arrow-right"></i>
                </a>
            </div>
            <br>
            <table class="table table-striped table-dark" id="table_id">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Password</th>
                        <th>Telefono</th>
                        <th>Fecha</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Se utiliza un bloque try-catch para manejar excepciones PDO
                    try {
                        //establezco una conexion a la bbdd
                        $conexion = new PDO("mysql:host=localhost;dbname=r_user", "root", "");
                        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                         // Se prepara y ejecuta una consulta SQL que une las tablas 'user' y 'permisos'
                        $query = "SELECT user.id, user.nombre, user.correo, user.password, user.telefono, user.fecha, permisos.rol 
                                  FROM user
                                  LEFT JOIN permisos ON user.rol = permisos.id";//uno el rol de la tabla user on el id del rol de la tabla permisos
                        $stmt = $conexion->query($query);

                         // Se recorren los resultados y se imprimen en filas de la tabla
                        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['correo']; ?></td>
                                <td><?php echo $fila['password']; ?></td>
                                <td><?php echo $fila['telefono']; ?></td>
                                <td><?php echo $fila['fecha']; ?></td>
                                <td><?php echo $fila['rol']; ?></td>
                                <td>
                                    <a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id'] ?> ">
                                        <i class="bi bi-pencil-square"></i></a>
                                    <a class="btn btn-danger" href="eliminar_user.php?id=<?php echo $fila['id'] ?>">
                                        <i class="bi bi-trash-fill text-black"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                    } catch (PDOException $e) {
                        echo "Error de conexión: " . $e->getMessage();
                    }
                        ?>
                </tbody>
            </table>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
            <script src="../js/user.js"></script>
</body>

</html>
