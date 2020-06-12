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
    isset($_POST["Opcion"]){
        $opcion = $_POST["preg1"];
    }
    isset($_POST["idSesion"]){
        $sesion = $_POST["idSesion"];
    }
    echo "La opcion respondida es".$opcion;
    $url = 'http://localhost:52899/Persona';
    echo $json;
    $response = callAPI("POST",$url,$json);
    if($response)
    {
        echo $response;
    }
    else
    {
        echo "Ocurrio un error: ";
    }
    
   
?>
</body>
</html>