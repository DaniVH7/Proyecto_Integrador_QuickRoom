<!DOCTYPE html>
<html lang="es">
    <title>HTML Cristian
    </title>
<head>
<link rel="icon" href="../sources/images/white_logo_transparent_background.png" type="image/png">

 <meta charset="utf-8">
<html>
    <head>
        <title> Conectar la BD-PHP con MYSQL </title>
        <style>
            body{ background-color: #0F4C75;}
            table{margin: auto; width: 900px; border-collapse: collapse; }
            table, tr, th, td { border: 1px solid gray; justify-content: center; background-color: black;}
            td {width: 125px; color: #ffcc00; } th{color:white}
            .container{border: 1px solid #BBE1FA;background-color: #1B262C;width: 100%;height: 97vh;}
            .iniciar{width: 100%;height: 100%;}
        </style>
    </head>
    
    <body>
    <main class="container">
            <div class="iniciar"><br>
        <?php
            $bd_host = "127.0.0.1";
            $bd_user = "root";
            $bd_pass = "";
            $bd_name = "quickroom";
            $agua = htmlspecialchars($_POST["agua"]);        
            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name);

            if (mysqli_connect_errno())
            {
                printf("ERROR: %u - %s ", mysqli_connect_errno(), mysqli_connect_error());
                exit();
            }
            mysqli_set_charset($conectar, "utf8");
            $consultar = "SELECT id_cuarto,agua FROM cuartos where agua ='$agua'";

            if ($resultado = mysqli_query($conectar, $consultar))
            {
                printf ("<table><tr> <th>Cuarto</th> 
                 <th>Tiene Agua</th> <th>Renta</th> </tr>");
                while ($fila = mysqli_fetch_row($resultado))
                {
                    printf ("<tr> <td>%d</td> <td>%s</td> <td><a href='../rentaahora.php"."'>TExto</a></td> </tr>", 
                    $fila[0], $fila[1]);
                }
                printf ("</table>");
                mysqli_free_result($resultado);
            }

            mysqli_close($conectar);
        ?>
        <footer><div class="ayuda"><a href="../../Usuario/ayuda.html" style="color: #BBE1FA;">Ayuda
            <div class="antes"><a href="../../Usuario/nuevabusqueda.html" style="color:#BBE1FA; float:right;">Regresar</a></footer>
        </div>
        </main>      
    </body>
</html>