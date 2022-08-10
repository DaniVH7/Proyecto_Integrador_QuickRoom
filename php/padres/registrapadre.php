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
            $nombre = htmlspecialchars($_POST["txtNombre"]);
            $apellidop = htmlspecialchars($_POST["txtApellidop"]);
            $apellidom = htmlspecialchars($_POST["txtApellidom"]);
            $usuario = htmlspecialchars($_POST["txtUsuario"]);;
            $email = htmlspecialchars($_POST["txtCorreo"]);
            $contra = md5($_POST["txtContraseña"]);
            $telefono = (int)$_POST["txtTelefono"];
            $alumno = htmlspecialchars($_POST["txtAlumno"]);
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
            $insertar = "INSERT INTO padres VALUES (null,'$nombre', '$apellidop', '$apellidom',
            '$usuario', '$email', '$contra', '$telefono','$alumno')"; 

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

