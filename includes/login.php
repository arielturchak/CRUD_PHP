<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/estilosLogin.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<!--Pregunta
PDO (PHP Data Objects) en bases de datos es una interfaz de PHP que permite interactuar
con distintos sistemas de gestión de bases de datos utilizando un conjunto común de métodos, 
lo que facilita la conexión y manipulación de datos.
VENTAJAS
1-Portabilidad del código entre distintos SGBD.
2-Mayor seguridad mediante el uso de sentencias preparadas.
3-Mejor rendimiento y más funcionalidades como transacciones y manejo de errores.
4-Compatibilidad con varios tipos de bases de datos.
-->
<body class="contenedor" >
    <div class="login-box">
        <form  action="_functions.php" method="POST">
                        <br>
           
                            <br>
                                <h2 class="text-center">Iniciar Sesión</h2>
                            <br>
                            <div class="user-box">
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                                <label for="correo">Usuario:</label><br>
                                
                            </div>
                            <div class="user-box">
                                <input type="password" name="password" id="password" required>
                                <input type="hidden" name="accion" value="acceso_user">
                                <label type="password">Contraseña:</label><br>
                            </div>   
                           
                             <br>
                            <input type="submit"class="btn" value="Ingresar">
                            
                
        </form>
    </div>
</body>
</html>