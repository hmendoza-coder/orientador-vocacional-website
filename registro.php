<?php
    //include 'C:\xampp\htdocs\PaginaWeb\PHP\consumir.php';
	// Inicia la sesion
	//session_start();
?>
<!--Este codigo tiene que agregarse al inicio para mantener la sesion iniciada en la web-->
<!--Esta pagina es para el registro del usuario para acceso a la pagina-->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <!--<meta name= "viewport" content="width=device-width, initial-scale-1.0">       esta cosa da error en consola-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Orientador vocacional</title>
        <!--Scripts-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <!--Favicon-->
        <link rel="icon" type="image/png" href="imagenes/icon.PNG" />
        <!--Estilos-->
        <link rel="stylesheet" href="estiloRegistro.css"> 
        <!-- <link rel="stylesheet" href="Estilos/estilo.css" type="text/css"> Salio una pinche linea blanca si no les gusta quitar esta linea --> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	    <!--Titulos-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 
        <link href='http://fonts.googleapis.com/css?family=Neucha' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">


    </head>

    <body>
        <div class="afuera">
         <!--AQUI ESTA EL BOTON DE CIERRE DE SESION QUE DEBE AVISAR A LA API QUE SE HA CERRADO SESION-->
        <button type="submit" class="cierre">
            <a href="index.php">
            Volver al inicio
            </a>
        </button>
        </div>

        
            <!---Esta clase content-form es para acomodar los grid en el css-->
            <div class="content-form">
            <h1>Orientador Vocacional</h1>
                <div class="contact-form">
                    <h3>
                        Registrate

                    </h3>
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
                            </p> <!--
                            <p>
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
                            
                                    <p class="bloque" onclick = "return validarFormulario();">
                                        <button type="submit">
                                            Aceptar
                                        </button>
                                    </p> 
                           
                        
                         </form>
                </div>
                
            </div>
    <script src="Javascript/selectMunicipio.js"></script>
    <script src="Javascript/validarRegistro.js"></script>
    </body>
</html>

