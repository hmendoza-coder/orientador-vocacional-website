function validarRespuesta(){
    var bool = document.getElementById("radioB").checked;
    var radios = document.getElementsByName('preg1');
    var valor;
    for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
        valor =radios[i].value;
        return true;
    }
    }
    if(!bool){
        Swal.fire(
            'No has seleccionado respuesta.',
            'Para poder continuar debes responder todas las preguntas',
            'error'
        )
        return false;
    }
    return true;
}