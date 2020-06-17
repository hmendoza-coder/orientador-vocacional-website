<?php
// Inicio de sesion.
	include "Cliente.php";
?>
<!DOCTYPE html>
<html lang="es"> 
    <head>
        <!-- Declaracion del head -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Estilos/3wschools.css" type="text/css">
        <link rel="stylesheet" href="Estilos/estilo.css" type="text/css"> 
        <link rel="stylesheet" href="Estilos/slider.css">
        <link rel="stylesheet" href="estiloResultado.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Inicio - Orientador Vocacional</title>
    </head>
<body>

	<!--Header con logo y nombre de usuario-->
	<div class = "w3-row">
		<div class = "col-3"><a href="index.php"><img src="Imagenes/birrete.png" alt="Orientador Logo" style="width:50%;height:50%;"></a></div>
		<div class="col-1"></div>
		<div class="col-8 w3-animate-zoom"><img src="Imagenes/letreno.png" alt="Orientador Logo" style="width:80%;height:80%;">  <!-- Imagen fea puede quitarse y escribir texto -->
			
		</div>
	</div>


	<!--Barra de menu responsiva-->
	<div class="topnav" id="myTopnav">
            <a href="index.php" class="active" >Inicio</a>
            <?php
				if(isset($_SESSION['idSesion'])){?>
                <a href="resultado.php" onclick="return validarConexion();">Mostrar resultados</a><?php
                }
            ?>
			<?php
				if(isset($_SESSION['idSesion'])){
                    ?>
					<a href="test.php">Comenzar Test</a>
					<?php
				}
			?><?php
            if(!isset($_SESSION['idSesion'])){?>
                <a href="login.html" class="popup-link" >Iniciar Sesión</a>
                <a href="registro.php" class="popup-link" >Resgistrarse</a><?php
            }
            else{?>
                <a href="PHP/cerrarSesion.php" class="popup-link" onclick =" return alertaSalida();">Cerrar Sesión</a><?php
            }
            ?>
            
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
            </a>
            <?php
				if(isset($_SESSION['idSesion'])){?>
                <div class="col-6 w3-right-align">Bienvenido <b><?php echo $_SESSION['nombres'] ?></b></div><?php
                }
            ?>
    </div>

<!-- Slider de imagenes -->
<div class = "w3-row">
    <div class="col-1"></div>
    <div class="col-10">
<div class="container" id="container" >
	<div class="caption" id="slider-caption">
	  <div class="caption-heading">
		<h1>Lorem Ipsum</h1>
	  </div>
	  <div class="caption-subhead"><span>dolor sit amet, consectetur adipiscing elit. </span></div><a class="btn" href="#">Sit Amet</a>
	</div>
	<div class="left-col" id="left-col">
	  <div id="left-slider"></div>
	</div>
	<div class="nav">
	  <li class="slide-up"> <a href="#"></a></li>
	  <li class="slide-down"> <a id="down_button" href="#">></a></li>
    </div>
  </div>
    </div>
  <div class="col-1"></div>
</div>

<footer class="w3-container w3-gray w3-center">
	<div class="w3-row">
        <div class="col-4 w3-panel w3-leftbar w3-black">
            <div class="col-12">
            <p class="w3-xlarge w3-serif w3-animate-fading"> <i>Reunirse es el comienzo; mantenerse es el progreso; trabajar es el éxito. </i></p>
            </div>
        </div>
        <div class="col-4 w3-panel w3-leftbar w3-black">
            <div class="col-12">
                <p class="w3-xlarge w3-serif w3-animate-fading"> <i>La mejor suerte de todas es la suerte de hacer algo por decision propia. </i></p>
            </div>
        </div>
        <div class="col-4 w3-panel w3-leftbar w3-black">
            <div class="col-12">
            <p class="w3-xlarge w3-serif w3-animate-fading"> <i>Cinco minutos bastan para soñar toda una vida, así de relativo es el tiempo. </i></p>
            </div>
        </div>
    </div>
</footer>

<script>
	// Menu responsivo
	function myFunction() {
		var x = document.getElementById("myTopnav");
		if (x.className === "topnav") {
			x.className += " responsive";
		} else {
			x.className = "topnav";
		}
	}
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="Javascript/slider.js"></script>
    <script src="Javascript/validarTest.js"></script>
    <script src="Javascript/validar.js"></script>
</body>
</html>