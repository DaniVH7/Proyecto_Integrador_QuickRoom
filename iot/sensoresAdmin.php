<!DOCTYPE html>
<html>
 <meta charset="utf-8">
    <title>Cuartos Express
    </title>
    <link rel="stylesheet" type="text/css" href="../sources/css/administrador/sensores.css">
    <link rel="icon" href="../sources/images/white_logo_transparent_background.png" type="image/png">
    <body>
    <div class="container">
        <div class="letras"><h1 style="margin-top: 1%; text-align:center;">Sensores Registrados</h1></div><br>
        <div class="sesnores">
            <!DOCTYPE html>
<html lang="en">
<head>
    <title>Widget</title>
</head>
<body>
    <table id="sensores">
        <thead>
            <th>Sensor</th>
            <th>Valor</th>
        </thead>
        <tbody>
            <tr>
                <td>Sensor 1</td>
                <td><input type="text" name="sensor1" id="sensor1" value="0"></td>
            </tr>
            <tr>
                <td>Sensor 2</td>
                <td><input type="text" name="sensor1" id="sensor1" value="0"></td>
            </tr>
        </tbody>
    </table>


<script>
        var sensores = new EventSource("https://iot-ti51-default-rtdb.firebaseio.com/test.json");
    sensores.addEventListener('put', function (e) {
        var json = JSON.parse(e.data);
        console.log(json);
        if (json.path == "/"){
            tbody = document.getElementById("tbody_sensores");
            for (var key in json.data) {
                console.log(key);
                console.log(json.data[key].temperatura);
                document.getElementById(key).value = json.data[key].humedad ;
            }
        }else{
            s = json.path.split("/");
            console.log(s[1]);
            console.log(json.data);
            document.getElementById(s[1]).value = json.data;
        }
    });
</script>

</body>



</html>

            <footer><div class="ayuda"><a href="ayudaadmin.html" style="color: #BBE1FA;">Ayuda
                <div class="antes"><a href="../Admin/admin.html" style="color:#BBE1FA; float: right;" >Regresar</a></footer>
        </div>
        
    </div>
</body>