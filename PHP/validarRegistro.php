<?php include "persona.php";
include "Cliente.php";?>
<!DOCTYPE html>
<html lang="es"> 
    <head>
        <meta charset="UTF-8">
        <!--<meta name= "viewport" content="width=device-width, initial-scale-1.0">       esta cosa da error en consola-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Orientador vocacional</title>
        <!--Scripts-->
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
    // Todas las variables que se reciben del formulario.
    $nombre = limpiarVariable($_POST["nombre"]);
    $apeP = limpiarVariable($_POST["apellidoP"]);
    $apeM = limpiarVariable($_POST["apellidoM"]);
    $sexo = limpiarVariable($_POST['sexo']);
    $correo = limpiarVariable($_POST['correo']);
    $pass = limpiarVariable($_POST['pass']);
    $fecha = date('Y-m-d', strtotime($_POST['fecha']));
    $estado = $_POST['estado'];
    $municipio = '0001';    //pendientes
    $colonia = '10085';     //pendientes

    // Creacion del objeto persona
    $persona = new Persona();
    $persona->setNombre($nombre);
    $persona->setApellidoP($apeP);
    $persona->setApellidoM($apeM);
    $persona->setCorreo($correo);
    $persona->setPass($pass); //
    $persona->setSexo($sexo);
    $persona->setfechaNacimiento($fecha);
    $persona->setidEstado($estado);
    $persona->setidMunicipio($municipio);
    $persona->setidColonia($colonia);

    $json = json_encode($persona);
    $url = 'http://localhost:52899/Persona';

    $response = callAPI("POST",$url,$json);
    if($response)
    {
        if($response->status)
        {
            echo $id_sesesion; //asdasd
        }   
    }
    else
    {
        echo "Ocurrio un error: ";
    }
    

    // Funcion que "limpia" las variables.
    function limpiarVariable($varSucia){
        $varLimpia;
        $variable = array(
            '@<script[^>]*?>.*?</script>@si',   // Elimina javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Elimina las etiquetas HTML
            '@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Elimina los comentarios multi-línea
        );
        $varLimpia = preg_replace($variable, '', $varSucia);
        return $varLimpia;
    }

    function sanitizar($varSucia){
        if (is_array($varSucia)) {
            foreach($varSucia as $var=>$val) {
                $varLimpia[$var] = sanitizar($val);
            }
        }
        else {
            if (get_magic_quotes_gpc()) {
                $varSucia = stripslashes($varSucia);
            }
            $varSucia  = cleanInput($varSucia);
            $varLimpia = mysql_real_escape_string($varSucia);
        }
        return $varLimpia;
    }
       
   
?>
<script src="Javascript/sweetAlert.js"></script>
</body>
</html>