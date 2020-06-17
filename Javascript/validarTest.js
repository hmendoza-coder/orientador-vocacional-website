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


function alertaSalida(){
    Swal.fire({
        title: 'Quieres salir del cuestionario?',
        text: "Una vez fuera tendras que volver a iniciar sesión para entrar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Salir'
      }).then((result) => {
        if (result.value) {
            location.href ="http://localhost/orientador-vocacional-website/index.php"; // cambiar la redireccion si se mueve la ruta
            return true;
        }
      })
      return false;
}