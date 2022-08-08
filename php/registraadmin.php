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

            $nombre = htmlspecialchars($_POST["txtNombre"]);
            $apellidop = htmlspecialchars($_POST["txtApellidop"]);
            $apellidom = htmlspecialchars($_POST["txtApellidom"]);
            $telefono = (int)$_POST["txtTelefono"];
            $usuario = htmlspecialchars($_POST["txtUsuario"]);
            $email = htmlspecialchars($_POST["txtCorreo"]);
            $contra = md5($_POST["txtContraseña"]);

            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name );
            #
            if (mysqli_connect_errno())
            {
            #
                printf("ERROR: %u- %s", mysqli_connect_errno(), mysqli_connect_error());
                exit();
            }
            $insertar = "INSERT INTO administradores VALUES (null,'$nombre', '$apellidop', '$apellidom',
             $telefono, '$usuario', '$email', '$contra' )";
            if ($resultado = mysqli_query($conectar, $insertar))
            {
                header("Location:../Admin/registroalmacenado.html");
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