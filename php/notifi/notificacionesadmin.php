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

    $usuario = htmlspecialchars($_POST["txtUsuario"]);
    $mensaje = htmlspecialchars($_POST["txtMensaje"]);
    $fecha = $_POST['fecha'];

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
$insertar = "INSERT INTO chat values(null,'$usuario','$mensaje', '$fecha')";

if ($resultado = mysqli_query($conectar, $insertar))
{
header("Location:../mensajes/user.php");
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