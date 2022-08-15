<!DOCTYPE html>
<html>
    <head>
        <title> Actualizar registros - PHP con MySQL </title>
    </head>
    <body>
        <?php
            $bd_host = "127.0.0.1";
            $bd_user = "root";
            $bd_pass = "";
            $bd_name = "quickroom";
            #
            $codigo = (int)$_POST["codigo"];
            #
            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name);
            #
            if (mysqli_connect_errno())
            {
                #
                printf("ERROR: %u -%s", mysqli_connect_errno(), mysqli_connect_errno());
            }
            #
            mysqli_set_charset($conectar, "utf8");
            $eliminar = "DELETE FROM cuartos WHERE id_cuarto = $codigo";
            
            
            
            if($resultado = mysqli_query($conectar, $eliminar))
            {
                #
                if(mysqli_affected_rows($conectar) == 0)
                {
                    printf("El codigo proporcionado no existe");
                }
                else
                {
                    header("Location:../Admin/borrado.html");
                }
            }
            else
            {
                printf("ERROR - Al eliminar del BD");
            }
            mysqli_close($conectar);
        ?>
    </body>
</html>
