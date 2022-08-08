<!DOCTYPE html>
<html>
<head>
<title> Insertar registros - PHP con MYSQL </title>
</head>
<body>
<?php
try
{
$conMySQL = new PDO("mysql:host=localhost; port=3306;dbname=quickroom", "root", "");

$conMySQL->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

#
$precio = (int)$_POST["txtPrecio"];
$amueblado = htmlspecialchars($_POST["txtAmueblado"]);
$agua = htmlspecialchars($_POST["txtAgua"]);
$luz = htmlspecialchars($_POST["txtLuz"]);
$internet = htmlspecialchars($_POST["txtInternet"]);
$vigilancia = htmlspecialchars($_POST["txtVigilancia"]);
$cocina = htmlspecialchars($_POST["txtCocina"]);
$b_compartido = htmlspecialchars($_POST["txtBaño"]);
$cuarto_comp = htmlspecialchars($_POST["txtCompartido"]);
$t_renta = htmlspecialchars($_POST["txtRenta"]);
$t_condominio = htmlspecialchars($_POST["txtCondominio"]);
$calle = htmlspecialchars($_POST["txtCalle"]);
$estado = htmlspecialchars($_POST["txtEstado"]);
$municipio = htmlspecialchars($_POST["txtMunicipio"]);
$disponible = htmlspecialchars($_POST["txtDisponible"]);
$imgFil = fopen($_FILES['fileFoto']['tmp_name'], 'rb');
$imgSiz = $_FILES['fileFoto']['size'];
$imgEnd = fread($imgFil,$imgSiz);
fclose($imgFil);
$imagen = base64_encode($imgEnd);

$sentenciaSQL = "INSERT INTO cuartos 
values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$sentenciaPrep = $conMySQL->prepare($sentenciaSQL);
$sentenciaPrep->bindParam(1, $precio);
$sentenciaPrep->bindParam(2, $amueblado);
$sentenciaPrep->bindParam(3, $agua);
$sentenciaPrep->bindParam(4, $luz);
$sentenciaPrep->bindParam(5, $internet);
$sentenciaPrep->bindParam(6, $vigilancia);
$sentenciaPrep->bindPAram(7, $cocina);
$sentenciaPrep->bindParam(8, $b_compartido);
$sentenciaPrep->bindParam(9, $cuarto_comp);
$sentenciaPrep->bindParam(10, $t_renta);
$sentenciaPrep->bindParam(11, $t_condominio);
$sentenciaPrep->bindParam(12, $calle);
$sentenciaPrep->bindParam(13, $estado);
$sentenciaPrep->bindParam(14, $municipio);
$sentenciaPrep->bindParam(15, $disponible);
$sentenciaPrep->bindParam(16, $imagen);
if ($sentenciaPrep->execute())
{
    header("Location:../Admin/regresaalinicio.html");
}
else
{
printf("Error al almacenar en la Base de Datos");
}
}
catch (PDOException $e)
{
print "¡Error!: " . $e->getMessage() . "</br>";
die();
}
finally
{ $conMySQL = null; }
?>
</body>
</html>