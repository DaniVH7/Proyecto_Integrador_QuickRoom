<!DOCTYPE html>
<html>
 <meta charset="utf-8">
    <title>Cuartos 
    </title>
    <link rel="icon" href="../sources/images/white_logo_transparent_background.png" type="image/png">
    <head>
        <style>
            body{background-color: #1B262C;}
            table{margin: auto; width: 900px; border-collapse: collapse}
            table, tr, th, td { border: 1px solid gray; background-color: black;}
            td {width: 125px; color: #0099ff; text-align:center;} th{color:#BBE1FA}
            .texto{border: 1px solid green;text-align:center; color:#BBE1Fa; background-color:#1B262C;}
        </style>
    </head>
<body>
    <main class="container">
        <div class="iniciar">
            <div class="texto"><h1>Cuartos Rentados en 4 Meses</h1></div><br>
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
                    $consultar = " SELECT id_cuarto,fecha,tiempo_de_renta FROM rentas WHERE fecha BETWEEN '2022-04-3045' and '2022-08-30';";

                    if ($resultado = mysqli_query($conectar, $consultar))
                    {
                        printf ("<table><tr><th>Numero de Cuarto</th> <th>Fecha de la renta</th>
                         <th>Duracion de la renta</th></tr>");
                        while ($fila = mysqli_fetch_row($resultado))
                        {
                            printf ("<tr><td>%d</td> <td>%s</td>  <td>%s</td>
                            ",$fila[0], $fila[1], $fila[2]);
                        }
                        printf ("</table>");

                        mysqli_free_result($resultado);
                    }

                    mysqli_close($conectar);
                ?>
            </div>
            <div class="pie"><a href="ayuda.html" style="color: #BBE1FA;">Ayuda</a>
                <div class="cerrar"><a href="../../Admin/consultas.html" style="color: #BBE1FA; float:right;">Anterior</a></div>
        </div>
    </main>
</body>