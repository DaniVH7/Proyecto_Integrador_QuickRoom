var button = document.getElementById("button");


button.addEventListener('click', function(){
notify();

});

function notify(){
// verificar que el navegador soporta  noticaciones
    if(!("Notification" in window)) {
        alert("Tu navegador no soporta notificaiones");

    }else if(Notification.permission === "granted"){
     //lanzar notificacion siya esta autorizado
         var notification = new Notification("No hay luz");

         //var notification = new Notification("Sin internet");

    
    } else if(Notification.permission !== "denied"){
        Notification.requestPermission(function(permission){
            if(Notification.permission === "granted"){
                var notification = new Notification("Sin internet");
            }

        }); 
    } 
}