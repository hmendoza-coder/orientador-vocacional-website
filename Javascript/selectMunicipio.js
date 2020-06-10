function getIDMunicipio(){
    var idEstado = $("#selectEstado").val();
    var direccion = "https://localhost:44373/Municipio/" + idEstado;
    var datos = {direccion : direccion};
    
    $.ajax({
        type: "POST",
        url: "PHP/conexion.php",
        data: datos,
        beforeSend: function(objeto){
            console.log("Espere procesando...");
        },
        success: function(data){    
            $("#divMun").html(data);
            console.log("entro!!");
        }
    })
}


function getIDEstado() {
        var idEstado = document.getElementById("selectEstado").value;
        var direccion = "https://localhost:44373/Municipio/" + idEstado;
        console.log(direccion);
}