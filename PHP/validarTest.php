<?php   include "persona.php";
        include "../Cliente.php"    
?>
<!DOCTYPE html>
<html lang="es"> 
    <head>
    <title>Orientador Vocacional</title>
        <meta>
        <meta charset="UTF-8">
        <!--<meta name= "viewport" content="width=device-width, initial-scale-1.0">       esta cosa da error en consola-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../estilosTest.css">
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
<?php
    // Todas las variables que se reciben del formulario.
    if(!isset($_POST["radioB"])){

        if($_POST['pregunta'] == '0'){
            ?>
            <script>
                Swal.fire(
                    'Finaliza el cuestionario.',
                    'A contnuacion serás reedirigido a los resultados.',
                    'success'
                ).then(function() {
                    window.location = "../resultado.php";  // redireccionar
                });
            </script>
            <?php
        }
        else{
            $arreglo = array(
                "idPregunta" =>(int)$_POST['pregunta'],
                "idSesion" => $_SESSION['idSesion'],
                "idOpcion" => (int)$_POST["preg1"]
            );
            $json = json_encode($arreglo);

            $url = 'http://localhost:52899/Respuesta';
            $response = callAPI("POST", $url, $json);
            if($response){
                ?>
                <script type="text/javascript">
                let timerInterval
                Swal.fire({
                    background: '#fff',
                    title: 'Generando pregunta',
                    html: 'Se esta generando una pregunta en base a la respuesta.',
                    timer: 600,
                    timerProgressBar: true,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                        const content = Swal.getContent()
                        if (content) {
                            const b = content.querySelector('b')
                            if (b) {
                            b.textContent = Swal.getTimerLeft()
                            }
                        }
                        }, 100)
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
               /*  })
                     Swal.fire({
                        title: 'Registro exitoso.',
                         text: 'Tu informacion se ha registrado, ya puedes iniciar sesión.',
                         icon: 'success' */
                    }).then(function() { 
                         window.location = "../test.php"; //cambiar si se mueve el log
                      }); 
                </script>
                <?php
            }
        }


            
            
    }

?>
        <div class="afuera">
            <!--AQUI ESTA EL BOTON DE CIERRE DE SESION QUE DEBE AVISAR A LA API QUE SE HA CERRADO SESION-->
           <button type="submit" class="cierre">
               <a href="PHP/cerrarSesion.php">
               SALIR
               </a>
           </button>
        </div>  
        <h1>Orientador Vocacional</h1>              
        <h2>Test vocacional </h2>
        <label>¡Bienvenido <b><?php echo $_SESSION['nombres']; ?></b> a nuestro orientador vocacional!</label>

        <div class ="box-test">

                <p class = "instruccion">
                    Se sincero al responder pues de esto depende que el resultado sea el mas acertado.
                </p>
                <form action="PHP/validarTest.php" method="POST" class="form-test">
                    <!--Prueba para vista de preguntas-->
                    <!--el numero de pregunta debera ser un contador ascendente-->
                    <label></label>
                    <ul>
                        <li><input type="radio" id="radioB" name="preg1" value="1" /> Mucho</li>
                        <li><input type="radio" id="radioB" name="preg1" value="2" /> Poco</li>
                        <li><input type="radio" id="radioB" name="preg1" value="3" /> Nada</li>
                        <input type="hidden" id="pregunta" name="pregunta" value="">
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