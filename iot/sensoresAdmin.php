<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../sources/css/administrador/sensores.css">
    <title>Control de Acceso RFID</title>
    <link rel="icon" href="../sources/images/white_logo_transparent_background.png" type="image/png">
    <style>
      h1 {color:#BBE1FA;
            text-Align:center;}
      table, th, td {
        border: 1px solid white;
        border-collapse: collapse;
      }
      th, td {
        padding: 5px;
        text-align: left;
      }
    </style>
  </head>
  <body>
    <h1>Control de Acceso RFID</h1>
    <table>
      <thead>
  <tr>
    <th>ID de Tarjeta</th>
    <th>Último Acceso</th>
    <th>Estado</th> 
  </tr>
</thead>
<tbody id="card-table-body">
  <tr>
    <td colspan="3" align="center">Cargando...</td>
  </tr>
</tbody>
    </table>
    <script>
      var cardDataRef = new EventSource("https://quickroom-8f067-default-rtdb.firebaseio.com/rfid-access-control/cards.json");

cardDataRef.addEventListener('put', function (e) {
  var json = JSON.parse(e.data);
  console.log(json);

  if (json.path == "/") {
    // Clear table body
    document.getElementById("card-table-body").innerHTML = "";

    for (var key in json.data) {
      console.log(key);
      console.log(json.data[key].time);
      console.log(json.data[key].status);

      var cardRow = document.createElement("tr");
      var cardIdCell = document.createElement("td");
      cardIdCell.innerHTML = key;
      var cardTimeCell = document.createElement("td");
      cardTimeCell.setAttribute("id", key + "-last-access");
      var cardTimeString = (json.data[key].time).toLocaleString();
      cardTimeCell.innerHTML = cardTimeString;

      var cardStatusCell = document.createElement("td");
      cardStatusCell.setAttribute("id", key + "-status");
      cardStatusCell.innerHTML = json.data[key].status;

      cardRow.appendChild(cardIdCell);
      cardRow.appendChild(cardTimeCell);
      cardRow.appendChild(cardStatusCell);
      document.getElementById("card-table-body").appendChild(cardRow);
    }
  } else {
    var s = json.path.split("/");
    console.log(s[1]);
    console.log(json.data.time);
    console.log(json.data.status);

    var cardTimeCell = document.getElementById(s[1] + "-last-access");
    var cardTimeString = new Date(json.data.time).toLocaleString();
    cardTimeCell.innerHTML = cardTimeString;

    var cardStatusCell = document.getElementById(s[1] + "-status");
    cardStatusCell.innerHTML = json.data.status;
  }
});

    </script>
  </body>
</html>
