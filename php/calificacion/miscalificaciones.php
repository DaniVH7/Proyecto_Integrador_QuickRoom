<!DOCTYPE html>
<html>
 <meta charset="utf-8">
    <title>Cuartos Express
    </title>
    <link rel="stylesheet" type="text/css" href="../../sources/css/busquedarapida.css">
    <link rel="icon" href="../sources/images/white_logo_transparent_background.png" type="image/png">
    <head>
        <title> Conectar la BD-PHP con MYSQL </title>
        <style>
            table{margin: auto; width: 900px; border-collapse: collapse}
            table, tr, th, td { border: 1px solid gray; background-color: black;}
            td {width: 125px; color: #0099ff; text-align:center;} th{color:#BBE1FA}
        </style>
    </head>
<body>
    <main class="container">
        <div class="iniciar">
            <div class="texto"><h1>Calificacion</h1></div>
            <div class="tabla">
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
            $consultar = "SELECT id_cuarto,calificacion,descripcion from calificacion	";

            if ($resultado = mysqli_query($conectar, $consultar))
            {
                printf ("<table><tr><th>Numero de Cuarto</th> <th>Calificacion Recibida</th> <th>Comentarios</th> 
                </tr>");
                while ($fila = mysqli_fetch_row($resultado))
                {
                    printf ("<tr> <td>%s</td> <td>%s</td> <td>%s</td> </td></tr>", 
                    $fila[0], $fila[1],$fila[2]);
                }
                printf ("</table>");

                mysqli_free_result($resultado);
            }

            mysqli_close($conectar);
        ?>
            </div>
            <div class="pie"><a href="ayuda.html" style="color: #BBE1FA;">Ayuda</a>
                <div class="cerrar"><a href="../../Admin/admin.html" style="color: #BBE1FA;">Anterior</a></div>
        </div>
    </main>
</body>