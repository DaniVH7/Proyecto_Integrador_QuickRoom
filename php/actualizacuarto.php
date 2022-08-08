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
            $codigo = (int)$_POST["txtCodigo"];
            $precio = (int)$_POST["precio"];
            $amueblado = htmlspecialchars($_POST["amueblado"]);
            $agua = htmlspecialchars($_POST["agua"]);
            $luz = htmlspecialchars($_POST["luz"]);
            $internet = htmlspecialchars($_POST["internet"]);
            $vigilancia = htmlspecialchars($_POST["vigilancia"]);
            $cocina = htmlspecialchars($_POST["cocina"]);
            $b_compartido = htmlspecialchars($_POST["baño"]);
            $cuarto_comp = htmlspecialchars($_POST["cuarto"]);
            $t_renta = htmlspecialchars($_POST["renta"]);
            $t_condominio = htmlspecialchars($_POST["condominio"]);
            $calle = htmlspecialchars($_POST["calle"]);
            $estado = htmlspecialchars($_POST["txtEstado"]);
            $municipio = htmlspecialchars($_POST["municipio"]);
            $disponible = htmlspecialchars($_POST["txtDisponible"]);
            $imgFil = fopen($_FILES['fileFoto']['tmp_name'], 'rb');
            $imgSiz = $_FILES['fileFoto']['size'];
            $imgEnd = fread($imgFil,$imgSiz);
            fclose($imgFil);
            $imagen = base64_encode($imgEnd);
            
            #
            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass,$bd_name, 3306);
            #
            if (mysqli_connect_errno())
            {
            #
            printf("ERROR: %u - %s", mysqli_connect_errno,

            mysqli_connect_error());
            exit();
            }
            #
            mysqli_set_charset($conectar, "utf8");
            $actualizar = "UPDATE cuartos SET precio = '$precio', amueblado='$amueblado', agua ='$agua',
            luz='$luz', internet='$internet', vigilancia='$vigilancia',cocina='$cocina', baño_compartido='$b_compartido',
            cuarto_compartido='$cuarto_comp',tiempo_renta='$t_renta',tipo_condominio='$t_condominio',
            calle='$calle',estado='$estado', municipio='$municipio', disponibilidad='$disponible', fotografias='$imagen'  WHERE id_cuarto = '$codigo'";
            #
            if ($resultado = mysqli_query($conectar, $actualizar))
            {
            #
            if (mysqli_affected_rows($conectar) == 0)
            {
                header("Location:../Admin/noexiste.html");
            }
            else
            {
                header("Location:../Admin/cuartoactualizado.html",
            
            mysqli_affected_rows($conectar));

            }
            }
            else
            {
            printf("ERROR  al actualizar su Cuarto<br> Intentalo de Nuevo");
            }
            #
            mysqli_close($conectar);
        ?>
</body>
</html>