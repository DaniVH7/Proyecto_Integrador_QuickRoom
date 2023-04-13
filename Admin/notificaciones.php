<!DOCTYPE html>
<html>
  <style>
            table{margin: auto; width: 900px; border-collapse: collapse}
            table, tr, th, td { border: 1px solid gray; background-color: black;}
            td {width: 125px; color: #0099ff; text-align:center;} th{color:#BBE1FA}
            h1{color:#BBE1FA;text-align:center}
        </style>
  <head>
         <link rel="stylesheet" type="text/css" href="../sources/css/notificaciones.css">
    <meta charset="utf-8">
    <title>Notificaciones</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  </head>
  <body>
    <h1 style="color:white">Enviar mensaje</h1>
     <div class="container"><div class="formulario">
        <div class="form"><form action="../php/notifi/notificacionesadmin.php" method="post" enctype="multipart/form-data">
            <section id="../php/notifi/notificacionesadmin.php" class="contenedor">
                    <table>
                        <tr>
                            <td class="izq">
                                <label class="lbl" for="txtUsuario">Usuario:</label>
                            </td>
                            <td class="der">
                                <input name="txtUsuario" placeholder="Con el que inicia sesion">
                            </td>
                        </tr>
                        <tr>
                            <td class="izq">
                                <label class="lbl" for="txtMensaje">Mensaje:</label>
                            </td>
                            <td class="der">
                                <input name="txtMensaje" placeholder="Escriba su mensaje">
                            </td>
                        </tr>
                         <tr>
                            <td class="izq">
                                <label class="lbl" for="txtFecha">Fecha:</label>
                            </td>
                            <td class="der">
                                 <input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">                            
                                 </td>
                        </tr>
                            <td class="izq">
                            </td>
                            <td class="der">
                                <input type="submit" class="btn" id="enviar"
                                value="GUARDAR">&nbsp;
                                <input type="reset" class="btn" id="borrar"
                                value="limpiar">
                            </td>
                        </tr>
                    </table>

            </section>
        </form></div>
    </div>
    <h1>Notificaciones</h1>
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
            $sentenciaSQL = "SELECT usuario, mensaje FROM chat";
           if ($resultado = mysqli_query($conectar, $sentenciaSQL))
            {
                printf ("<table><tr><th>Usuario</th> <th>Mensaje</th>  </tr>");
                while ($fila = mysqli_fetch_row($resultado))
                {
                    printf ("<tr> <td>%s</td> <td>%s</td>  </tr>", 
                    $fila[0], $fila[1]);
                }
                printf ("</table>");

                mysqli_free_result($resultado);
            }

            mysqli_close($conectar);
            
        ?>
    
            <div class="pie"><a href="ayuda.html" style="color: #BBE1FA;">Ayuda</a>
            <div class="cerrar"><a href="admin.html" style="color: green;">Regresar</a></div>
  </body>
</html>
