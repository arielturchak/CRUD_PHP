<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar == '') {
    header("Location: ../includes/login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/es.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Usuarios</title>
    <style>
     body{
            background-image: url('../img/mobile-phone3.jpg');
        color: aliceblue;
      }
      </style>
</head>

<body>
    <div class="container is-fluid">
        <div class="col-xs-12">
            <h1>Bienvenido Usuario:  <?php echo $_SESSION['nombre']; ?></h1>
            <br>
            <h1>Lista de usuarios</h1>
            <br>
            <div>
                <a class="btn btn-warning" href="../includes/_sesion/cerrarSesion.php">Log Out
                   <i class="bi bi-box-arrow-right"></i></i>
                </a>
            </div>
            <br>
            <table class="table table-striped table-dark" id="table_id">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Fecha</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $conexion = new PDO("mysql:host=localhost;dbname=r_user", "root", "");
                        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $query = "SELECT user.id, user.nombre, user.correo, user.telefono, user.fecha, permisos.rol 
                                  FROM user
                                  LEFT JOIN permisos ON user.rol = permisos.id";
                        $stmt = $conexion->query($query);

                        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['correo']; ?></td>
                                <td><?php echo $fila['telefono']; ?></td>
                                <td><?php echo $fila['fecha']; ?></td>
                                <td><?php echo $fila['rol']; ?></td>
                            </tr>
                    <?php
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>
                </tbody>
            </table>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
            <script src="../js/user.js"></script>
        </div>
    </div>
</body>

</html>
