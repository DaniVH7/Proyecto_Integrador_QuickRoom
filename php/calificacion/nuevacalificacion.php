<!DOCTYPE html>
<html>
<head>
<title> Insertar calificacion - PHP con MYSQL </title>
</head>
<body>
        <?php
            $bd_host = "127.0.0.1";
            $bd_user = "root";
            $bd_pass = "";
            $bd_name = "quickroom";
            
            $cuarto = (int) $_POST["txtcuarto"];
            $calificacion = (int)$_POST["txtcalificacion"];
            $descripcion = htmlspecialchars($_POST["txtdescripcion"]);

            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name );
            #
            if (mysqli_connect_errno())
            {
            #
              printf("ERROR: %u - %s", mysqli_connect_errno, mysqli_connect_error());
            exit();
            }
            mysqli_set_charset($conectar, "utf8");
$insertar = "INSERT INTO calificacion (id_calificacion, id_cuarto, calificacion, descripcion) VALUES (null, '$cuarto', '$calificacion', '$descripcion')";
            if ($resultado = mysqli_query($conectar, $insertar))
            {
                header("Location:../../calificacion/cuartocalificado.html");
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