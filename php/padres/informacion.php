<!DOCTYPE html>
<html>
    <html lang="es"></html>
    <link rel="icon" href="../sources/images/white_logo_transparent_background.png" type="image/png">

    <head>
        <title> Padres </title>
        <style>
            body{ background-color: #1b262c;}
            table{margin: auto; width: 900px; border-collapse: collapse; }
            table, tr, th, td { border: 1px solid gray; justify-content: center; background-color: black;}
            td {width: 125px; color: #ffcc00; } th{color:#BBE1Fa;}
            .container{border: 1px solid #BBE1FA;background-color: #1B262C;width: 100%;height: 9vh;}
            .iniciar{width: 100%;height: 100%;}
            .texto{color: #bbe1fa;; text-align:center;font-size:7vh;}
            .cuadro{width:100%; height:880%; border:1px solid blue;}
            .seguridad{width:50%; height:42%; border:1px solid beige; margin:auto;}
            .clase{border:1px solid black; width:99.8%;height:14%;text-align:center; color:#BBE1FA; font-size:4vh;}
        </style>
    </head>
 <meta charset="utf-8">
    <title>Cuartos Express</title>
    <link rel="stylesheet" type="text/css" href="../sources/css//padres/padresinicio.css">
    <link rel="icon" href="../sources/images/white_logo_transparent_background.png" type="image/png">
    <body>
    <main class="container">
        <div class="iniciar">
                <div class="texto">Detalle de Renta</div><br>
                <div class="cuadro"><br><br>
                <?php
                   try
                   {
                   #
                   $conMySQL = new PDO("mysql:host=localhost; port=3306;
                   dbname=quickroom", "root","");
                   $conMySQL ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   $conMySQL ->exec("SET CHARACTER SET UTF8");
                   #
                   $sentenciaSQL = "SELECT id_estudiante,id_cuarto,fecha,tiempo_de_renta FROM rentas";
                   foreach($conMySQL->query($sentenciaSQL) as $fila)
                       {
                           printf ("<div><table><tr>
                           </tr> <tr><th class='izq'>Id del Alumno:</th>
                           <td class='der'>%s</td></tr> <tr><th class='izq'>Id del Cuarto</th>
                           <td class='der'>%u</td></tr> <tr><th class='izq'>Inicio de Rentas:</th>
                           <td class='der'>%s</td></tr> <tr><th class='izq'>Renovar el contrato en:</th>
                           <td class='der'>%s</td></tr> <tr><th class='izq'>Pagar Renta</th>
                           <td class='der'>%s----<a href='#s' style=color:#BBE1FA;'>Paga</td>
                           </td></tr></table><br></div>",
                           $fila[0], $fila[1], $fila[2], $fila[3],$fila[3]);
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
                <div class="seguridad">
                    <div class="clase">Dad</div>
                </div>
                </div>
                
        <footer><a href="ayuda.html" style="color: #BBE1FA;">Ayuda</a>
            <a href="padres.php" style="color: #BBE1FA; float: right;">Regresar</a>
        </footer>
        </div>
    </main>
</body>
</html>