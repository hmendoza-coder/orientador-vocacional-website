<!DOCTYPE html>
<html lang="es"> 
<head>
        <meta charset="UTF-8">
        <!--<meta name= "viewport" content="width=device-width, initial-scale-1.0">       esta cosa da error en consola-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Orientador vocacional</title>
        <!--Scripts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
    // Todas las variables que se reciben del formulario.
    $nombre = limpiarVariable($_POST["nombre"]);
    $apeP = limpiarVariable($_POST["apellidoP"]);
    $apeM = limpiarVariable($_POST["apellidoM"]);
    $sexo = limpiarVariable($_POST['sexo']);
    $correo = limpiarVariable($_POST['correo']);
    $pass = limpiarVariable($_POST['pass']);
    $fecha = date('Y-m-d', strtotime($_POST['fecha']));
    $estado = $_POST['estado'];
    //$municipio = $_POST['municipio'];
    //$colonia = $_POST['colonia'];

    echo "Nombre:",$nombre," Apellido P",$apeP," Apellido M",$apeM," sexo",$sexo," Correo",$correo," Pass:",$pass," Fecha nacimiento",$fecha," Estado:",$estado;

    
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