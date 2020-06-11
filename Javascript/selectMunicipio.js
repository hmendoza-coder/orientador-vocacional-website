/*function getIDMunicipio(){
    var idEstado = $("#selectEstado").val();
    var direccion = "https://localhost:44373/Municipio/" + idEstado;
    var datos = {direccion : direccion};
    console.log(direccion);
    $.ajax({
        type: "POST",
        url: "PHP/conexion.php",
        data: datos,
        beforeSend: function(objeto){
            console.log("Espere procesando...");
            console.log(datos);
        },
        success: function(data){    
            $.get("PHP/conexion.php", function(datos){
                   $("#juan").html(datos);
            });
        }
    })
}*/


function getIDEstado() {
        var idEstado = document.getElementById("selectEstado").value;
        var direccion = "http://localhost:52899/Municipio/" + idEstado;
        console.log(direccion);
}