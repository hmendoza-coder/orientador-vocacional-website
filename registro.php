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
        <!--Estilos-->
        <link rel="stylesheet" href="estiloRegistro.css">
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
            <a href="login.html">
            SALIR
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
                                <label id="nombre" for="nombre" class="name" > Nombre </label> 
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre" autocomplete="off" required>
                                                 
                            </p>
                            <p>
                                <label id="apellidop" for="apellido" class="apmaterno">Apellido paterno </label>
                                <input type="text" name="apellido" id="apellido" placeholder="Apellido paterno" autocomplete="off" required>
                                
                                
                            </p>
                            <p>
                                <label for="apellido" class="appaterno">Apellido materno </label>
                                <input type="text" name="apellido" id="apellido" placeholder="Apellido materno" autocomplete="off" required>
                                
                                
                            </p>
                            <p>
                                <label for="pass" class="password">Contraseña</label> 
                                <input type= "password" name="password" id="password" placeholder="Contraseña" required>
                                                           
                                
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
                            
                            <label id="fecha" for="fecha" class="fecha" >Fecha de nacimiento</label>                          
                            <input type="date" name="fecha" id="fecha" autocomplete="off" required>
                            <!--<label for="fecha">fecha de nacimiento: </label>  -->
                        </p>
                        <p>
                            <label>Estado</label>
                            <select name="estado" id="selectEstado"  type="combo" onchange="getIDEstado()" required>
		                    <option value="" selected disabled hidden>Estado </option>
                            <?php include 'PHP\consumir.php';
                            iniciar("Estado"); ?>
                            </select>
                        </p>
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
                            <!-- -->
                        </p>
                        <p class="bloque" onclick = "return validarFormulario();">
                            <button type="submit">
                                Aceptar
                            </button>
                        </p>
                    </form>
                </div>
                
                <!--Este apartado es para info sobre el equipo y posibilidad de contacto con el usuario para dudas dudosas-->
                <div class="contact-info">
                    <h3>Más información y contacto</h3>
                    <ul>
                        <li>Desarrollo web Estación Friki</li>
                        <li>ruwberr@gmail.com</li>
                    </ul>
                    
                    <p class="mensaje">
                        <textarea placeholder="Asunto" name="asunto" rows="3"></textarea>
                    </p>
                    <p class="boton_mensaje">
                        <button type="submit">
                            Enviar
                        </button>
                    </p>
                    
                    <!--Esta p es para un mensaje de confianza al usuario sobre su info-->
                    <p>La información recibida aqui, no será compartida ni usada
                        por terceros.
                    </p>
                </div>
            </div>
    <script src="Javascript/selectMunicipio.js"></script>
    <script src="Javascript/validarRegistro.js"></script>
    </body>
</html>

