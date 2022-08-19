<!DOCTYPE html>
<html>
    <head>
        <title> Insertar registros - PHP con MYSQL </title>
</head>
    <body>
        <?php
            $bd_host = "127.0.0.1";
            $bd_user = "root";
            $bd_pass = "";
            $bd_name = "quickroom";
            #
            $tarjeta = htmlspecialchars($_POST["numtarjeta"]);
            $vence = htmlspecialchars($_POST["vence"]);
            $tipo = htmlspecialchars($_POST["tipo"]);
            $codigo = md5($_POST["codigo"]);
            $nombres = htmlspecialchars($_POST["nombres"]);
            $apellidos = htmlspecialchars($_POST["apellidos"]);
            $correo = htmlspecialchars($_POST["correo"]);
            #
            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name );
            #
            if (mysqli_connect_errno())
            {
            #
                printf("ERROR: %u- %s", mysqli_connect_errno(), mysqli_connect_error());
                exit();
            }
            #
            mysqli_set_charset($conectar, "utf8");
            $insertar = "INSERT INTO tarjeta VALUES 
            ('$tarjeta', '$vence', '$tipo', '$codigo', '$nombres',
             '$apellidos', '$correo' )"; 

            #
            if ($resultado = mysqli_query($conectar, $insertar))
            {
                printf("Registro almacenado en la BD");
            }
            else 
            {
                printf("ERROR - Al almacenar en la BD");
            }
            #
            mysqli_close($conectar);
        ?>
    </body>
</html>

