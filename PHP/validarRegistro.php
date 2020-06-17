<?php include "persona.php";
include "../Cliente.php";?>
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
        <link rel="stylesheet" href="../estiloRegistro.css"> 
        <link rel="stylesheet" href="../Estilos/estilo.css" type="text/css"> <!-- Salio una pinche linea blanca si no les gusta quitar esta linea --> 
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
    $password = limpiarVariable($_POST['pass']);
    $fecha = date('Y-m-d', strtotime($_POST['fecha']));
    $estado = $_POST['selectEstado'];
    $municipio = '0001';    //pendientes
    $colonia = 10085;     //pendientes

    // Creacion del objeto persona
    $persona = new Persona();
    $persona->setNombre($nombre);
    $persona->setApellidoP($apeP);
    $persona->setApellidoM($apeM);
    $persona->setCorreo($correo);
    $persona->setPass($password); //
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
       ?>
       <script type="text/javascript">
           Swal.fire({
               title: 'Registro exitoso.',
				text: 'Tu informacion se ha registrado, ya puedes iniciar sesión.',
                icon: 'success'
           }).then(function() {
                window.location = "../login.html"; //cambiar si se mueve el log
            });
       </script>
       <?php
       
    }
    else
    {
        ?>
        <script type="text/javascript">
           Swal.fire({
               title: 'Ocurrio un error.',
				text: 'El proceso fue interrumpido, puede intentarlo mas tarde.',
                icon: 'error'
           }).then(function() {
                window.location = "registro.php";
            });
       </script>
       <?php
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
<div class="afuera">
         <!--AQUI ESTA EL BOTON DE CIERRE DE SESION QUE DEBE AVISAR A LA API QUE SE HA CERRADO SESION-->
        <button type="submit" class="cierre">
            <a href="index.php">
            Volver al inicio
            </a>
        </button>
        </div>

        <h1>Orientador Vocacional</h1>
            <!---Esta clase content-form es para acomodar los grid en el css-->
            <div class="content-form">
                <div class="contact-form">
                    <h3>Registrate</h3>
                        <form action="PHP/validarRegistro.php" method="POST" id="formulario">
                            <p>
                                <label id="lblnombre" for="nombre" class="name" > Nombre </label> 
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre" autocomplete="off" required>
                                                 
                            </p>
                            <p>
                                <label id="apellidop" for="apellido" class="apmaterno">Apellido paterno </label>
                                <input type="text" name="apellidoP" id="apellidoP" placeholder="Apellido paterno" autocomplete="off" required>
                                
                                
                            </p>
                            <p>
                                <label for="apellido" class="appaterno">Apellido materno </label>
                                <input type="text" name="apellidoM" id="apellidoM" placeholder="Apellido materno" autocomplete="off" required>
                                
                                
                            </p>
                            <p>
                                <label for="password" class="password">Contraseña</label> 
                                <input type= "password" name="pass" id="pass" placeholder="Contraseña" required>
                                                           
                                
                            </p>
                            <p>
                                <label for="sexo" class= "sexo">Sexo </label>  
                                <select name="sexo" id="sexo">
                                    <option value="" selected disabled hidden>Sexo</option>
                                    <option value="h">Masculino</option> 
                                    <option value="m">Femenino</option> 
                                </select>
                            </p>
                        <p> 
                            <label for="correo" class= "email">Correo electronico: </label>  
                            <input type="email"  name="correo" id="correo" autocomplete="off" placeholder="Correo electronico" required>
                                                     
                            
                        </p>
                        
                        <p> 
                            <label id="fechaN" for="fecha" class="fecha" >Fecha de nacimiento</label>                          
                            <input type="date" name="fecha" id="fecha" autocomplete="off" required>
                            <!--<label for="fecha">fecha de nacimiento: </label>  -->
                        </p>
                        <p>
                            <label>Estado</label>
                            <select name="selectEstado" id="selectEstado"  type="combo" onchange="getIDEstado()" required>
		                    <option value="" selected disabled hidden>Estado </option>
                            <?php include 'PHP\consumir.php';
                            iniciar("Estado"); ?>
                            </select>
                        </p>
                        <!-- <p>
                            <label>Municipio</label>
                            <select name="municipio" id="selectMunicipio"  type="combo">
                            <option value="" selected disabled hidden>Municipio </option>
                            </select>
                        </p>
                        <p>
                            <label>Colonia</label>
                            <select name="colonia" id="selectColonia"  type="combo" >
                            <option value="" selected disabled hidden>Colonia </option>
                            </select>
                        </p> -->
                        <div class="w3-row">
                            <div class="col-7"></div>
                            <div class="col-3 w3-center">
                                <p class="bloque" onclick = "return validarFormulario();">
                                    <button type="submit">
                                        Aceptar
                                    </button>
                                </p> 
                            </div>
                            <div class="col-2"></div>  
                        </div>
                        
                    </form>
                </div>
                
            </div>
<script src="Javascript/sweetAlert.js"></script>
</body>
</html>