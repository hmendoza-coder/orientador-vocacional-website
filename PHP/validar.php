<?php include "persona.php"?>
<?php include "../cliente.php"?>
<?php include "consumir.php"?>
<!DOCTYPE html>
<html lang="es"> 
<head>
        <meta charset="UTF-8">
        <!--<meta name= "viewport" content="width=device-width, initial-scale-1.0">       esta cosa da error en consola-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Orientador vocacional</title>
        <!--Scripts-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <!--Estilos-->
        <link rel="stylesheet" href="../estiloslogin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	    <!--Titulos-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 
        <link href='http://fonts.googleapis.com/css?family=Neucha' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
    </head>
<body>
<?php

    $credencial = array(
        "Correo" => limpiarVariable($_POST["correo"]),
        "Password" => limpiarVariable($_POST["pass"])
        );

    $response = json_decode(callAPI('GET', "http://localhost:52899/Sesion/login",$credencial));

    if($response)
    {
        if($response->status)
        {
            $id_sesesion = $response->datos->idSesion;
            $_SESSION['correo'] = limpiarVariable($_POST["correo"]);
            $_SESSION['pass'] = limpiarVariable($_POST["pass"]);
            $_SESSION['idSesion'] = $id_sesesion;
            $_SESSION['nombres'] = callPersonas($_SESSION['correo']);
            // en teoria abria que cargar el nombre del usuario en una variable de sesion...
            header("Location: ../index.php");
        }   
    }
    else
    {
        ?>
        <script type="text/javascript">
           Swal.fire({
                title: 'Usuario no identificado.',
				text: 'El correo y la contraseña introducidos no son correctos.',
                icon: 'error'
           }).then(function() {
                window.location = "../login.html"; //cambiar si se mueve el log
            });
       </script>
        <?php
    }

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
          
   
?>
    
    <form action="PHP/validar.php" class="form-box" method="POST">
        
        <!--hola que hacen?-->
        <img class="avatar" src="imagenes/birrete.jpg" alt="logo del orientador">
        <h1 class="form-title">Sign In</h1>
        <input type ="text" placeholder="Correo electrónico" id="correo" name = "correo" autocomplete="off" required>
        <input type="password" placeholder="Contraseña" id="pass" name = "pass" autocomplete="off" required>
            <button type="submit" onclick="return validarSesion();">
                  
                Iniciar sesión
                
            </button>
        <!--AQUI ESTA EL ENLACE PARA LA PAGINA DE REGISTRO-->
        <footer>
            <!--<a href="#">¿Olvidaste tu contraseña?</a>-->
            <u><a href="registro.php">¿Eres nuevo? Registrate aqui</a></u>
        </footer>
    </form>

</body>
</html>