<!DOCTYPE html>
<html>
<head>
<title> Insertar registros </title>
</head>
<body>
<?php
$bd_host = "127.0.0.1";
$bd_user = "root";
$bd_pass = "";
$bd_name = "quickroom";
#
$precio = (int)$_POST["txtPrecio"];
$amueblado = htmlspecialchars($_POST["txtAmueblado"]);
$agua = htmlspecialchars($_POST["txtAgua"]);
$luz = htmlspecialchars($_POST["txtLuz"]);
$internet = htmlspecialchars($_POST["txtInternet"]);
$vigilancia = htmlspecialchars($_POST["txtVigilancia"]);
$cocina = htmlspecialchars($_POST["txtCocina"]);
$baño = htmlspecialchars($_POST["txtBaño"])
$compartido =htmlspecialchars($_POST["txtCompartido"]);
$tiemporenta =htmlspecialchars($_POST["txtTiemporenta"]);
$tipocondominio =htmlspecialchars($_POST["txtTipocondominio"]);
$calle =htmlspecialchars($_POST["txtCalle"]);
$estado =htmlspecialchars($_POST["txtEstado"]);
$municipio =htmlspecialchars($_POST["txtMunicipio"]);
$geomapa =htmlspecialchars($_POST["txtGeomapa"]);
$fotografia =htmlspecialchars($_POST["Fotografia"]);
#
$conectar = mysqli_connect($bd_host, $bd_user, $bd_pass,$bd_name );
#
if (mysqli_connect_errno())
{
#
printf("ERROR: %u- %s", mysqli_connect_errno(),

mysqli_connect_error());
exit();
}
#
mysqli_set_charset($conectar, "utf8");
$insertar = "INSERT INTO cuartos VALUES (null,'$precio','$amueblado','$agua','$luz','$internet','$vigilancia',
'$cocina','$baño','$compartido','$tiemporenta','$tipocondominio',
'$calle','$estado','$municipio','$geomapa','$fotografia')";

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