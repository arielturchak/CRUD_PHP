

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/estilosLogin.css">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

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