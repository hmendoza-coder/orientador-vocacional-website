function validarFormulario(){

		//Variables del form.
		var txtNombre = document.getElementById('nombre').value;
		var txtApeP = document.getElementById('apellidoP').value;
		var txtApeM = document.getElementById('apellidoM').value;
		var txtSexo = document.getElementById('sexo').value;
		var txtCorreo = document.getElementById('correo').value;
		var txtPass = document.getElementById('pass').value;
		var txtFechaNacimiento = document.getElementById('fecha').value;
		var txtEstado;
	
		if(document.getElementById('selectEstado') != ""){
			txtEstado = document.getElementById('selectEstado');
		}else{
			console.log("No hay valores de estado")
			return false;
		}
		//Validacion de nombre
		if(txtNombre == null || txtNombre.length == 0 || /^\s+$/.test(txtNombre)){
			Swal.fire(
				'Nombre es campo obligatorio.',
				'Este campo es obligatorio NO debe ir vacio o solo con espacios,',
				'question'
			)
			return false;
		}
		if(isNaN(txtNombre) == false){
			Swal.fire(
				'Incorrecto, valores no validos.',
				'Nombre NO debe contar con caracteres no validos, como números o signos',
				'error'
			)
			return false;
		}
		//Validacion de Apellidos
		if(txtApeP == null || txtApeP.length == 0 || /^\s+$/.test(txtApeP)){
			Swal.fire(
				'Apellido paterno es campo obligatorio.',
				'Este campo es obligatorio NO debe ir vacio o solo con espacios,',
				'question'
			)
			return false;
		}
		if(isNaN(txtApeP) == false){
			Swal.fire(
				'Incorrecto, valores no validos.',
				'Apellido paterno NO debe contar con caracteres no validos, como números o signos',
				'error'
			)
			return false;
		}
		if(txtApeM == null || txtApeM.length == 0 || /^\s+$/.test(txtApeM)){
			Swal.fire(
				'Apellido Materno es campo obligatorio.',
				'Este campo es obligatorio NO debe ir vacio o solo con espacios,',
				'question'
			)
			return false;
		}
		if(isNaN(txtApeM) == false){
			Swal.fire(
				'Incorrecto, valores no validos.',
				'Apellido materno NO debe contar con caracteres no validos, como números o signos',
				'error'
			)
			return false;
		}
		if(txtSexo == null || txtSexo.length == 0 || /^\s+$/.test(txtSexo)){
			Swal.fire(
				'Elige un sexo.',
				'Este campo es obligatorio, por favor selecciona un valor.',
				'question'
			)
			return false;
		}
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

		if(txtFechaNacimiento == null || txtFechaNacimiento.length == 0){
			Swal.fire(
				'Fecha de nacimiento obligatoria.',
				'Este campo es obligatorio, por favor selecciona un valor.',
				'question'
			)
			return false;
		}
		else{
			calcularEdad(txtFechaNacimiento);
		}
		if(txtEstado == null || txtEstado.length == 0 || /^\s+$/.test(txtEstado)){
			Swal.fire(
				'Elige un estado.',
				'Este campo es obligatorio, por favor selecciona un valor.',
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
				'question'
			)
			return false;
		}
		else{
			return true;
		}
	  }

	function calcularEdad(fechaNacimiento){
		var fechaNacim = new Date(fechaNacimiento);
		var fechaActual = new Date();
		var edad = fechaActual.getFullYear() - fechaNacim.getFullYear();
		if(edad < 9 || edad > 100){
			Swal.fire(
				'Fecha de nacimiento incorrecta.',
				'La fecha de nacimiento ingresada es incorrecta verificalo',
				'question'
			)
			return false
		}
		else{
			return true;
		}
	}