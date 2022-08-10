<!DOCTYPE html>
<html>
 <meta charset="utf-8">
    <title>Cuartos Express
    </title>
    <link rel="stylesheet" type="text/css" href="../../sources/css/rentas.css">
    <link rel="icon" href="../sources/images/white_logo_transparent_background.png" type="image/png">
    <meta nombre="ventana" contenido="escala-inicial=1">
    <head>
    <style>
            table{margin: auto; width: 900px; border-collapse: collapse}
            table, tr, th, td { border: 1px solid gray; background-color: black;}
            td {width: 125px; color: #0099ff;} th{color:#BBE1FA}
            body{background-color: #1B262C;}

        </style>
    </head>
    <body>
    <main class="container">
        <header class="iniciar">
            <div class="renta">Renta Ahora</div>
            <div class="apartado">
            <?php
try
{
$conMySQL = new PDO("mysql:host=localhost; port=3306;dbname=quickroom", "root", "");

$conMySQL->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

#
$cuarto = (int)$_POST["cuarto"];
$estudiante = (int)$_POST["estudiante"];
$rentar = htmlspecialchars($_POST["rentar"]);
$tiempo = htmlspecialchars($_POST["tiempo"]);


$sentenciaSQL = "INSERT INTO rentas 
values(null,null,?,?,?,?)";

$sentenciaPrep = $conMySQL->prepare($sentenciaSQL);
$sentenciaPrep->bindParam(1, $cuarto);
$sentenciaPrep->bindParam(2, $estudiante);
$sentenciaPrep->bindParam(3, $rentar);
$sentenciaPrep->bindParam(4, $tiempo);

if ($sentenciaPrep->execute())
{
    header("Location:../../Admin/regresaalinicio.html");
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
            </div>
        </header>
    </main>        
</body>