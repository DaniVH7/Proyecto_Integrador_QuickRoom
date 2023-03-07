<!DOCTYPE html>
<html>
 <meta charset="utf-8">
    <title>Cuartos Express
    </title>
    <link rel="stylesheet" type="text/css" href="../sources/css/busquedarapida.css">
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
            <div class="texto"><h1>Catalogo</h1></div>
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
            $consultar = "SELECT id_cuarto, administradores.nombre,precio,amueblado,agua,luz,internet,vigilancia,cocina,baño_compartido,
            cuarto_compartido,tiempo_renta,disponibilidad,fotografias FROM cuartos, administradores where disponibilidad LIKE '%Disponible' and id_administrador = 1";

            if ($resultado = mysqli_query($conectar, $consultar))
            {
                printf ("<table><tr><th>Numero de Cuarto</th> <th>Nombre de Administrador</th> <th>Precio</th> <th>Amueblado</th> <th>Agua</th> <th>Luz</th> <th>Internet</th> <th>Vigilancia</th> 
                <th>Cocina</th> <th>Baño Compartido</th> <th>Cuarto Compartido</th> <th>Tiempo de renta</th>   <th>Disponibilidad</th> <th>Fotografias</th> <th>Renta Ahora</th>
                </tr>");
                while ($fila = mysqli_fetch_row($resultado))
                {
                    printf ("<tr><td>%d</td> <td>%s</td>  <td>%s</td> <td>%s</td>  <td>%s</td>  <td>%s</td>  <td>%s</td>  
                    <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> </td><td>%s</td> <td><img src='data:image/jpg;base64,". $fila[13]." 
                    'alt='imagen acerca del Cuarto' />  <td><a href='../Rentas/nuevarenta.html"."' style='color: #BBE1FA;'>Renta Ahora</a></td></tr>", 
                    $fila[0], $fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9],$fila[10],$fila[11],$fila[12],$fila[13]);
                }
                printf ("</table>");

                mysqli_free_result($resultado);
            }

            mysqli_close($conectar);
        ?>
            </div>
            <div class="pie"><a href="ayuda.html" style="color: #BBE1FA;">Ayuda</a>
                <div class="cerrar"><a href="../Usuario/usuario.html" style="color: #BBE1FA;">Anterior</a></div>
        </div>
    </main>
</body>