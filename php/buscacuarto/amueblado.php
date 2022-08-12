<!DOCTYPE html>
<html lang="es">
    <title>HTML Cristian
    </title>
<head>
<link rel="icon" href="sources/images/logo_size.jpg" type="image/png">

 <meta charset="utf-8">
<html>
    <head>
        <title> Conectar la BD-PHP con MYSQL </title>
        <style>
            body{ background-color: #0F4C75;}
            table{margin: auto; width: 900px; border-collapse: collapse}
            table, tr, th, td { border: 1px solid gray; background-color: black;}
            td {width: 125px; color: #ffcc00; text-align:center;} th{color:white}
        </style>
    </head>
    
    <body>
        <?php
            $bd_host = "127.0.0.1";
            $bd_user = "root";
            $bd_pass = "";
            $bd_name = "quickroom";
            $amueblado = htmlspecialchars($_POST["amueblado"]);
            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name);

            if (mysqli_connect_errno())
            {
                printf("ERROR: %u - %s ", mysqli_connect_errno(), mysqli_connect_error());
                exit();
            }
            mysqli_set_charset($conectar, "utf8");
            $consultar = "SELECT id_cuarto, amueblado,precio, fotografias FROM cuartos where amueblado='$amueblado'";

            if ($resultado = mysqli_query($conectar, $consultar))
            {
                printf ("<table><tr>
                 <th>Codigo</th> <th>Amueblado</th> <th>Precio</th> <th>Fotografias</th> <th>Renta Ahora</th> </tr>");
                while ($fila = mysqli_fetch_row($resultado))
                {
                    printf ("<tr> <td>%d</td>  <td>%s</td> <td>%s</td>
                    <td><img src='data:image/jpg;base64,". $fila[3]." 'alt='imagen acerca del Cuarto' /></td> 
                    <td><a href='../../Rentas/rentafija.html"."' style='color: #BBE1FA; text-align:center;'>Renta Ahora</a></td></tr>", 
                    $fila[0], $fila[1],$fila[2]);
                }
                printf ("</table>");

                mysqli_free_result($resultado);
            }

            mysqli_close($conectar);
        ?>
        <footer><div class="ayuda"><a href="../../Usuario/ayuda.html" style="color: #BBE1FA;">Ayuda
            <div class="antes"><a href="../../Usuario/nuevabusqueda.html" style="color:#BBE1FA; float:right;">Regresar</a></footer>
    </body>
</html>