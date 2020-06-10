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
		<!--Scripts-->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <!--Estilos-->
        <link rel="stylesheet" href="estiloRegistro.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	    <!--Titulos-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 
        <link href='http://fonts.googleapis.com/css?family=Neucha' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
    </head>
	<body>
	<?php
	if(isset($_POST['selectEstado'])){
		$idEstado = $_POST['selectEstado'];
		console.log("El valor estado existe");
	}
	if(isset($_POST['selectMunicipio'])){
		$idMunicipio = $_POST['selectMunicipio'];
		console.log("El valor municipio existe");
	}

	//Codificacion
	function Consumir($url,$llave){

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
			// Agarrar solo los datos.
			if($contador == 2){
				$array = $valor;
			}
			$contador++;
		}
		//Aqui va el return final teoricamente aqui se deberia mandar a llamar una funcion que genere combobox.
		selectAPI($array, $llave);
	}

	function API($ruta){

		//Ruta raiz de la API
		$url = "https://localhost:44373/";
		$direccion = $url . $ruta;
		return $direccion;
	}

	function iniciar($ruta){
		if($ruta = "Estado"){
			$direccionAPi = API("Estado");
			Consumir($direccionAPi,"Estado");	
		}else{
			$direccionAPi = API("Municipio");
			Consumir($direccionAPi,"Municipio");	
		}
	}

	function selectAPI($datos, $llave){
		$variable = "idEstado";
		foreach ($datos as $value) {
			?><option value="<?php echo $value[$variable]?>"><?php echo $value['nombre']?></option><?php
		}
	}

	function selectMunicipio(){
		$variable = "idMunicipio";
		foreach ($datos as $value) {
			?><option value="<?php echo $value[$variable]?>"><?php echo $value['nombre']?></option><?php
		}
	}
	?> 
	<script src="Javascript/selectMunicipio.js"></script>
</body>
</html>