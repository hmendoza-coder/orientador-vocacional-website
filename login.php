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
        <meta name= "viewport" content="width=device-width, initial-scale-1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Orientador vocacional</title>
        <!--Scripts-->
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <!--Estilos-->
        <link rel="stylesheet" href="estiloLogin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	    <!--Titulos-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 
        <link href='http://fonts.googleapis.com/css?family=Neucha' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
    </head>
    <body>
         <!--AQUI ESTA EL BOTON DE CIERRE DE SESION QUE DEBE AVISAR A LA API QUE SE HA CERRADO SESION-->
         <button type="submit" class="cierre">
            <a href="indexV2.html">
            SALIR
            </a>
        </button>
        <h1>Orientador Vocacional</h1>
            <!---Esta clase content-form es para acomodar los grid en el css-->
            <div class="content-form">
                <div class="contact-form">
                    <h3>Registrate</h3>
                    <form action="validarRegistro.php" method="POST">
                        <p>                    
                            <input type="text" placeholder="Nombre(s)" name="nombre" id="nombre" autocomplete="off" required>
                        </p>
                        <p>
                            <input type="text" placeholder="Apellido Paterno" name="apellido" id="apellido" autocomplete="off" required>
                        </p>
                        <p>
                            <input type="text" placeholder="Apellido Materno" name="apellido" id="apellido" autocomplete="off" required>
                        </p>
                        <p>
                            <select name="sexo" id="sexo"  placeholder="Sexo">
                                <option value="0">Sexo
                                <option value="masculino">Masculino</option> 
                                <option value="femenino">Femenino</option> 
                            </select>
                        </p>
                        <p>                            
                            <input type="email" placeholder="Correo electronico" name="correo" id="correo" autocomplete="off" required>
                        </p>
                        <p>                            
                            <input type="password" placeholder="Contraseña" name="pass" id="pass" required>
                        </p>
                        <p>                            
                            <input type="date" name="fecha" id="fecha" placeholder="Correo electronico" autocomplete="off" required>
                        </p>
                        <p>
                            <?php include 'C:\xampp\htdocs\PaginaWeb\PHP\consumir.php'; ?>
                        s</p>                            
                        <p>                            
                            <select name="municipio" id="municipio"  placeholder="Municipio">
                                <option value="0">Municipio
                                <option value="masculino">Masculino</option> 
                                <option value="femenino">Femenino</option> 
                            </select>
                        </p>
                        <p>
                            <select name="colonia" id="colonia"  placeholder="Colonia">
                                <option value="0">Colonia
                                <option value="masculino">Masculino</option> 
                                <option value="femenino">Femenino</option> 
                            </select>
                        </p>
                        <p class="bloque">
                            <button type="submit">
                                Aceptar
                            </button>
                        </p>
                    </form>
                </div>
                
                <!--Este apartado es para info sobre el equipo y posibilidad de contacto con el usuario para dudas-->
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

    </body>
</html>

