function getIDEstado() {
    var idEstado = document.getElementById("selectEstado").value;
    var direccion = "https://localhost:44373/Municipio/" + idEstado;
    console.log(direccion);

    
}