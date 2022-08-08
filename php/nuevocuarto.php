<!DOCTYPE html>
<html>
<head>
<title> Insertar registros - PHP con MYSQL </title>
</head>
<body>
<?php
try{
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
$b_compartido = htmlspecialchars($_POST["txtBaño"]);
$cuarto_comp = htmlspecialchars($_POST["txtCompartido"]);
$t_renta = htmlspecialchars($_POST["txtRenta"]);
$t_condominio = htmlspecialchars($_POST["txtCondominio"]);
$calle = htmlspecialchars($_POST["txtCalle"]);
$estado = htmlspecialchars($_POST["txtEstado"]);
$municipio = htmlspecialchars($_POST["txtMunicipio"]);
$imgFil = fopen($_FILES['fileFoto']['tmp_name'], 'rb');
$imgSiz = $_FILES['fileFoto']['size'];
$imgEnd = fread($imgFil, $imgSiz);
fclose($imgFil);
$imagen = base64_encode($imgEnd);
$sentenciaSQL = "INSERT INTO cuartos
values(null, ?,?,?,?,?,?,?,?,?,?,?,?,?)";


#
$conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name );
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
$sentenciaSQL = "INSERT INTO cuartos values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$sentenciaPrep = $conMySQL->prepare($sentenciaSQL);
$sentenciaPrep->bindParam(1, $precio );
$sentenciaPrep->bindParam(2,$amueblado );
$sentenciaPrep->bindParam(3,$agua  );
$sentenciaPrep->bindParam(4,$luz );
$sentenciaPrep->bindParam(5,$internet );
$sentenciaPrep->bindParam(6,$vigilancia );
$sentenciaPrep->bindParam(7,$b_compartido );
$sentenciaPrep->bindParam(8,$cuarto_comp );
$sentenciaPrep->bindParam(9,$t_renta );
$sentenciaPrep->bindParam(10,$t_condominio );
$sentenciaPrep->bindParam(11,$calle );
$sentenciaPrep->bindParam(12,$estado );
$sentenciaPrep->bindParam(13,$municipio);
$sentenciaPrep->bindParam(14,$imagen);

if ($sentenciaPrep->execute())
{
printf("Registro alamacenado");
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