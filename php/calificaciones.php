<!DOCTYPE html>
<html>
    <html lang="es"></html>
    <link rel="icon" href="../sources/images/white_logo_transparent_background.png" type="image/png">

    <head>
        <title> Renta </title>
        <style>
            body{ background-color: #1b262c;}
            table{margin: auto; width: 900px; border-collapse: collapse; }
            table, tr, th, td { border: 1px solid black; justify-content: center; background-color: #0f4c75;}
            td {width: 125px; text-align:center; color:#BBE1Fa; } th{color:black}
            .container{border: 1px solid #BBE1FA;background-color: #1B262C;width: 100%;height: 9vh;}
            .iniciar{width: 100%;height: 100%;}
            .texto{color:white; text-align:center;font-size:6vh;}
            .cuadro{width:100%; height:880%; border:1px solid blue;}
            .seguridad{width:50%; height:50%;}
        </style>
    </head>
 <meta charset="utf-8">
    <title>Cuartos Express</title>
    <link rel="stylesheet" type="text/css" href="../sources/css//padres/padresinicio.css">
    <link rel="icon" href="../sources/images/white_logo_transparent_background.png" type="image/png">
    <body>
    <main class="container">
        <div class="iniciar">
                <div class="texto">Cuarto en Renta</div><br>
                <?php
                    try
                    {
                    #
                    $conMySQL = new PDO("mysql:host=localhost; port=3306;
                    dbname=quickroom", "root","");
                    $conMySQL ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conMySQL ->exec("SET CHARACTER SET UTF8");
                    #
                    $sentenciaSQL = "SELECT id_cuarto,calificacion,descripcion FROM calificacion";
                    foreach($conMySQL->query($sentenciaSQL) as $fila)
                        {
                            printf ("<div>
                            <table>
                                <tr>
                                    <th>Numero de Cuarto</th>
                                    <th>Calificacion </th>
                                    <th>Descripcion</th>
                                </tr>
                                <tr>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                </tr>
                            </table><br>",
                            $fila[0],$fila[1],$fila[2]);
                        }
                    }
                    
                    #
                    catch(PDOException $e)
                    {
                    print "¡ERROR!: " . $e-> getMessage() . "<br>";
                    die();
                    }
                    finally
        
                    {
                    $conMySQL = null;
                    }
                ?>
 <footer><div class="ayuda"><a href="../../Admin/ayudaadmin.html" style="color: #BBE1FA;">Ayuda
            <div class="antes"><a href="../Usuario/rentas.php   " style="color:#BBE1FA; float:right;">Regresar</a></footer>
        </div>
       
    </main>
</body>