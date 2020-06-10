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
        //validarEmail(txtCorreo);  pero parece que hay algo mal con la validacion
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

