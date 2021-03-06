<?php
    include "PHP/consumir.php";
    include "Cliente.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Orientador Vocacional</title>
        <meta>
        <meta charset="UTF-8">
        <!--<meta name= "viewport" content="width=device-width, initial-scale-1.0">       esta cosa da error en consola-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="estilosTest.css">
        <!--Favicon-->
        <link rel="icon" type="image/png" href="imagenes/icon.PNG" />
        <!--Scripts-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	    <!--Fuentes-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital@1&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital@1&family=Open+Sans&display=swap" rel="stylesheet">
	    <!--Para los textos-->
	    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">

    </head>
    <body>
        <div class="afuera">
            <!--AQUI ESTA EL BOTON DE CIERRE DE SESION QUE DEBE AVISAR A LA API QUE SE HA CERRADO SESION-->
           <button type="submit" class="cierre" onclick =" return alertaSalida();">
               <a href="PHP/cerrarSesion.php">
               SALIR
               </a>  
           </button>
        </div>  
        <h1>Orientador Vocacional</h1>              
        <h2>Test vocacional </h2>
        <label>Bienvenido(a) <b><?php echo $_SESSION['nombres']; ?></b> a nuestro orientador vocacional</label>

        <div class ="box-test">

                 <p class = "instruccion">
                    Responde que tanto te gusta cada unas de las actividades planteadas:
                </p>
                <form action="PHP/validarTest.php" method="POST" class="form-test">
                    <!--Prueba para vista de preguntas-->
                    <!--el numero de pregunta debera ser un contador ascendente-->
                    <label><?php $contenido = callPreguntas($_SESSION['idSesion']); echo $contenido->getContenido()?></label>
                    <ul>
                        <li><input type="radio" id="radioB" name="preg1" value="1" /> Mucho</li>
                        <li><input type="radio" id="radioB" name="preg1" value="3" /> Poco</li>
                        <li><input type="radio" id="radioB" name="preg1" value="2" /> Nada</li>
                        <input type="hidden" id="pregunta" name="pregunta" value="<?php echo $contenido->getidPregunta(); ?>">
                    </ul>
                    <!--BOTON PARA ENVIAR RESPUESTA A LA API-->
                    <p class="boton" onclick = "return validarRespuesta();">
                            <button type="submit" value="Opcion">
                                Enviar
                            </button>
                    </p>
                    <!--AQUI queria poner la tabla de las preguntas y luego hacer algo para que solo vaya mostrando de una
                    por una a la vez-->
                   
                </form>
        </div>
        <script src="Javascript/validarTest.js"></script>
    </body>
</html>
