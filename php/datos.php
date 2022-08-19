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
            <div class="texto"><h1>Datos del Estudiante</h1></div>
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
            $consultar = "SELECT id_estudiante,nombre, apellidop, apellidom, correo, telefono FROM estudiantes where id_estudiante=1;";

            if ($resultado = mysqli_query($conectar, $consultar))
            {
                printf ("<table><tr><th>Numero de Estudiante</th> <th>Nombre</th> <th>Apellido Paterno</th> <th>Apellido Materno</th> 
                <th>Correo</th> <th>Numero de Celular</th></tr>");
                while ($fila = mysqli_fetch_row($resultado))
                {
                    printf ("<tr><td>%d</td> <td>%s</td>  <td>%s</td>   <td>%s</td>  <td>%s</td>  <td>%s</td>  
                    </tr>", 
                    $fila[0], $fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
                }
                printf ("</table>");

                mysqli_free_result($resultado);
            }

            mysqli_close($conectar);

            
        ?>
        <div class="texto"><h1>Datos de Renta</h1></div>
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
            $consultar = "SELECT estudiantes.nombre,estudiantes.apellidop,estudiantes.apellidom,estudiantes.correo, estudiantes.telefono
            ,rentas.fecha, rentas.tiempo_de_renta from estudiantes,rentas where estudiantes.id_estudiante = rentas.id_estudiante = 1; ";

            if ($resultado = mysqli_query($conectar, $consultar))
            {
                printf ("<table><tr><th>Nombre</th> <th>Apellido Paterno</th> <th>Apellido Materno</th> 
                <th>Correo</th> <th>Numero de Celular</th> <th>Inicio de Renta</th><th>Tiempo limite</th></tr>");
                while ($fila = mysqli_fetch_row($resultado))
                {
                    printf ("<tr> <td>%s</td> <td>%s</td>  <td>%s</td>   <td>%s</td>  <td>%s</td> 
                    <td>%s</td>  <td>%s</td></tr>", 
                    $fila[0], $fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6]);
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