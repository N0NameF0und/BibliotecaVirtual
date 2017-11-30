var urlWs="";
$(document).ready(function(){
urlWs = "http://172.16.0.9/segundo/Biblioteca/server/"

});



function leer(){
    $.ajax({
        type:"get",
        url: urlWs +"leer",
        async:true,
        succes: function(respuesta){
            document.getElementById("respuesta").innerHTML=respuesta;

        }

    })
    }

 function borrar(){

 }

function crear(){

    }

function actualizar(){
        
    }