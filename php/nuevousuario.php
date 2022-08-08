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
    $fecha = date($_POST["txtEdad"]);
    $usuario = htmlspecialchars($_POST["txtUsuario"]);
    $correo = htmlspecialchars($_POST["txtCorreo"]);
    $contra = md5($_POST["txtContraseña"]);
    $telefono = htmlspecialchars($_POST["txtTelefono"]);

    $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name, 3306);
    #
    if (mysqli_connect_errno())
    {
    #
    printf("ERROR: %u- %s", mysqli_connect_errno(),
    
    mysqli_connect_error());
    exit();
    }
    mysqli_set_charset($conectar, "utf8");
$insertar = "INSERT INTO estudiantes values(null,'$nombre','$apellidop', '$apellidom', '$fecha', '$usuario','$correo', 
'$contra','$telefono',null,null)";

if ($resultado = mysqli_query($conectar, $insertar))
{
header("Location:../Usuario/registroalmacenadouser.html");
}
else
{

printf("ERROR  Al almacenar en la BD");
}
#
mysqli_close($conectar);
?>
</body>
</html>