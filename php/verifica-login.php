<!DOCTYPE html>
<html>
    <head>
        <title></title>
</head>
    <body>
        <?php
            try
            {
                #
                $conMySQL = new PDO("mysql:host=localhost; port=3306; dbname=quickroom","root","");
                #
                $conMySQL->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conMySQL ->exec("SET CHARACTER SET UTF8");
                $sentenciaSQL = "SELECT * FROM estudiantes WHERE usuario= :login AND contra= :passw";
                $sentenciaPrep = $conMySQL->prepare($sentenciaSQL);
                $log=htmlspecialchars(addslashes($_POST["user"]));
                $pass=htmlspecialchars(addslashes($_POST["contra"]));
                $cifredpass = md5($pass);
                $sentenciaPrep->execute(array(":login"=>$log, ":passw"=>$cifredpass));
                $numRegistros = $sentenciaPrep->rowCount();
                if ($numRegistros !=0)
                {
                    header("Location:../Usuario/usuario.php");
                } 
                else
                {
                    header("Location:../Usuario/iniciodesesion.html");
                }
            }
            catch(Exception $e)
            {
                exit("Error: " . $e-> getMessage());
            }
            finally{  $conMySQL= null; }
        ?>
    </body>
</html>