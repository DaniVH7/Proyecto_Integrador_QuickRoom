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

            $fecha = htmlspecialchars($_POST["txtfecha"]);
            $total = htmlspecialchars($_POST["txttotal"]);
            $cita = htmlspecialchars($_POST["txtcita"]);

            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name );
            #
            if (mysqli_connect_errno())
            {
            #
                printf("ERROR: %u- %s", mysqli_connect_errno(), mysqli_connect_error());
                exit();
            }
            $insertar = "INSERT INTO efectivo VALUES (null,'$fecha', '$total', '$cita')";
            if ($resultado = mysqli_query($conectar, $insertar))
            {
                header("Location:../Usuario/cita.html");
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