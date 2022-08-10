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
            td {width: 125px; color: #ffcc00; } th{color:white}
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
                <div class="texto">Bienvenido</div><br>
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
                    $sentenciaSQL = "SELECT alumno FROM padres";
                    foreach($conMySQL->query($sentenciaSQL) as $fila)
                        {
                            printf ("<div><table><tr>
                            </tr> <tr><th class='izq'>Nombre del Alumno:</th>
                            <td class='der' rowspan='2'>%s</td></tr> <tr><th class='izq'>
                            <a href='informacion.php' style=color:#BBE1FA;>Verifica</th>
                            
                            </td></tr></table><br></div>",
                            $fila[0]);
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
                
                </div>
                
        <footer><a href="ayuda.html" style="color: #BBE1FA;">Ayuda</a>
            <a href="cerrarsesion.php" style="color: #BBE1FA; float: right;">Cerrar Sesion</a>
        </footer>
        </div>
    </main>
</body>
</html>