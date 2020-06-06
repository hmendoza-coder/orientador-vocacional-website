function validarFormulario(){
		var txtNombre = document.getElementById('nombre').value;
		var txtUsuario = document.getElementById('user').value;
		var txtPass = document.getElementById('pass').value;
		var txtTel = document.getElementById('tel').value;
		var txtCorreo = document.getElementById('correo').value;
  
		//Test campo obligatorio
		if(txtNombre == null || txtNombre.length == 0 || /^\s+$/.test(txtNombre)){
			alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
			return false;
		}
		
		if(txtUsuario == null || txtUsuario.length == 0 || /^\s+$/.test(txtUsuario)){
			alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
			return false;
		}
 
		//Test edad
		if(txtTel == null || txtTel.length == 0 || isNaN(txtTel)){
			alert('ERROR: Debe ingresar una edad');
			return false;
		}
 
		//Test correo
		if(!(/\S+@\S+\.\S+/.test(txtCorreo))){
			alert('ERROR: Debe escribir un correo válido');
			return false;
		}
 
		if(txtPass == null || txtPass.length == 0 || /^\s+$/.test(txtPass)){
			alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
			return false;
		}
		
 
		return true;
	}