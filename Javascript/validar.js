function validarSesion(){
    var txtCorreo = document.getElementById('correo').value;
    var txtPass = document.getElementById('pass').value;

    if(txtCorreo == null || txtCorreo.length == 0 || /^\s+$/.test(txtCorreo)){
        Swal.fire(
            'Correo es campo obligatorio.',
            'Este campo es obligatorio NO debe ir vacio o solo con espacios,',
            'question'
        )
        return false;
    }
    else{
        validarEmail(txtCorreo);
    }
    if(txtPass == null || txtPass.length == 0 || /^\s+$/.test(txtPass)){
        Swal.fire(
            'La contraseña es campo obligatorio.',
            'Este campo es obligatorio NO debe ir vacio o solo con espacios,',
            'question'
        )
        return false;
    }

    return true;
}

function validarEmail(valor) {
    if( !(/^\w+([\.-]?\w+)*@(?:|hotmail|outlook|yahoo|live|gmail)\.(?:|com|es)+$/.test(valor)) ) {
        Swal.fire(
            'El correo ingresado no es valido.',
            'El correo no cuenta con la estructura correcta nombre usuario + @ + servidor + dominio',
            'error'
        )
        return false;
    }
  }

