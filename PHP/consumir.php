<?php
	// Inicia la sesion
	session_start();
?>
<!DOCTYPE html>
<html lang="es"> 
	<head>
        <meta charset="UTF-8">
        <meta name= "viewport" content="width=device-width, initial-scale-1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Orientador vocacional</title>
        <!--Estilos-->
        <link rel="stylesheet" href="estiloLogin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	    <!--Titulos-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 
        <link href='http://fonts.googleapis.com/css?family=Neucha' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
    </head>
	<body>
	<?php
	//Codificacion
	function Consumir($url){

		//Parte que hay que agregar para que funcione el file_get_contents
		$arrContextOptions=array(
			"ssl"=>array(
				"verify_peer"=>false,
				"verify_peer_name"=>false,
			),
		);  

		// Aqui deberia recibir una $ruta y concatenarse con la url para poder crear una direccion nueva.
		$json = file_get_contents($url, false, stream_context_create($arrContextOptions));
		$datos = json_decode($json, true);
		$contador = 0;
		foreach($datos as $valor){
			if($contador == 2){
				$array = $valor;
			}
			$contador++;
		}
		//Aqui va el return final teoricamente aqui se deberia mandar a llamar una funcion que genere combobox.
		selectAPI($array);
	}

	function API($ruta){

		//Ruta raiz de la API
		$url = "https://localhost:44373/";
		$direccion = $url . $ruta;
		return $direccion;
	}

	$direccionAPi = API("Estado");
	Consumir($direccionAPi);

	function selectAPI($datos){
		?>     
		<select name="estado" id="estado"  placeholder="Estado">
		<?php
		foreach ($datos as $value) {
			?><option value="<?php echo $value['idEstado']?>"><?php echo $value['nombre']?></option><?php
		}
	}
	?></select>
	
</body>
</html>