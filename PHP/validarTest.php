<?php   include "persona.php";
        include "../Cliente.php"    
?>
<!DOCTYPE html>
<html lang="es"> 
    <head>
        <meta charset="UTF-8">
        <!--<meta name= "viewport" content="width=device-width, initial-scale-1.0">       esta cosa da error en consola-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Orientador vocacional</title>
        <!--Scripts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
    if(!isset($_POST["radioB"])){
            $arreglo = array(
                "idPregunta" =>(int)$_POST['pregunta'],
                "idSesion" => $_SESSION['idSesion'],
                "idOpcion" => (int)$_POST["preg1"]
            );
            $json = json_encode($arreglo);

            print_r($json);

            $url = 'http://localhost:52899/Respuesta';
            $response = callAPI("POST", $url, $json);
            if($response){
                ?>
                <script type="text/javascript">
                    Swal.fire({
                        title: 'Registro exitoso.',
                         text: 'Tu informacion se ha registrado, ya puedes iniciar sesión.',
                         icon: 'success'
                    }).then(function() {
                         //window.location = "../test.php"; //cambiar si se mueve el log
                     });
                </script>
                <?php
            }
            else{
                echo "error";
            }
    }

    
    
?>
</body>
</html>