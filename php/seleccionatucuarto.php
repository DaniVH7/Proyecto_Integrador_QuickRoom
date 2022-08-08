<!DOCTYPE html>
<html lang="es">
    <title>Resultados de la Busqueda</title>
<head>
 <meta charset="utf-8">
<html>
    <head>
        <title> Mis Cuartos </title>
        <style>
            body{ background-color: #0F4C75;}
            table{margin: auto; width: 900px; border-collapse: collapse}
            table, tr, th, td { border: 1px solid gray; background-color: black;}
            td {width: 125px; color: #ffcc00;} th{color:white}
        </style>
    </head>
    
    <body>
        <?php
            $bd_host = "127.0.0.1";
            $bd_user = "root";
            $bd_pass = "";
            $bd_name = "quickroom";
        
            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name);

            if (mysqli_connect_errno())
            {
                printf("ERROR: %u - %s", mysqli_connect_errno(), mysqli_connect_error());
                exit();
            }
            mysqli_set_charset($conectar, "utf8");
            $consultar = "SELECT * FROM cuartos ";

            if ($resultado = mysqli_query($conectar, $consultar))
            {
                printf ("<table><tr><th>Id</th> <th>Precio</th> <th>Amueblado</th> <th>Agua</th> <th>Luz</th> <th>Internet</th> <th>Vigilancia</th> 
                <th>Cocina</th> <th>Baño Compartido</th> <th>Cuarto Compartido</th> <th>Tiempo de renta</th> <th>Fotografias</th>
                </tr>");
                while ($fila = mysqli_fetch_row($resultado))
                {
                    printf ("<tr><td>%d</td> <td>%s</td>  <td>%s</td> <td>%s</td>  <td>%s</td>  <td>%s</td>  <td>%s</td>  <td>%s</td>  <td>%s</td> 
                    <td>%s</td>  <td>%s</td>  <td>%d</td>  <td>%d</td> </tr>", 
                    $fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10], $fila[11]
                    , $fila[12]);
                }
                printf ("</table>");

                mysqli_free_result($resultado);
            }

            mysqli_close($conectar);
        ?>
        <footer><div class="ayuda"><a href="../../Admin/ayudaadmin.html" style="color: #BBE1FA;">Ayuda
            <div class="antes"><a href="../../Admin/admin.html" style="color:#BBE1FA; float:right;">Regresar</a></footer>
    </body>
</html>