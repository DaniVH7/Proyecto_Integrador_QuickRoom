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
            td {width: 125px; color: #ffcc00; text-align:center;} th{color:white}
        </style>
    </head>
    
    <body>
        <?php
            try
            {
            #
            $conMySQL = new PDO("mysql:host=localhost; port=3306;
            dbname=quickroom", "root","");
            $conMySQL ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conMySQL ->exec("SET CHARACTER SET UTF8");
            #
            $sentenciaSQL = "SELECT * FROM cuartos";
            foreach($conMySQL->query($sentenciaSQL) as $fila)
                {
                    printf ("<div><table><tr>
                    </tr> <tr><th class='izq'>ID:</th>
                    <td class='der'>%u</td></tr> <tr><th class='izq'>Precio:</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'>Amueblado:</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'>Agua:</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'>Luz:</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'>Internet:</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'>Vigilancia:</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'>Cocina:</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'>Baño Compartido:</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'>Cuarto Compartido:</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'>Tiempo de Renta:</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'>Tipo de Condominio:</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'>Calle</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'>Estado:</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'>Municipio:</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'>Disponibilidad:</th>
                    <td class='der'>%s</td></tr> <tr><th class='izq'></th>
                    <tr><th class='izq'>Imagen:</th>
                    <td class='der'><img src='data:image/jpg;base64,". $fila[16]." 'alt='imagen acerca del Cuarto' /></td>
                    </tr></table><br></div>",
                    $fila[0], $fila[1], $fila[2], $fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9]
                    ,$fila[10],$fila[11],$fila[12],$fila[13],$fila[14], $fila[15]);
                }
            }
            
            #
            catch(PDOException $e)
            {
            print "¡ERROR!: " . $e-> getMessage() . "<br>" ;
            die();
            }
            finally

            {
            $conMySQL = null;
            }
        ?>
        <footer><div class="ayuda"><a href="../../Admin/ayudaadmin.html" style="color: #BBE1FA;">Ayuda
            <div class="antes"><a href="../../Admin/admin.html" style="color:#BBE1FA; float:right;">Regresar</a></footer>
    </body>
</html>