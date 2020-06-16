<?php
    include "Cliente.php";
    include "PHP/consumir.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orientador vocacional</title>
    <link rel="stylesheet" href="estiloResultado.css">
    <link rel="stylesheet" href="Estilos/3wschools.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
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
    <h1>¡Estos son tus resultados!</h1>
    <form action="" class="box-res">
        <label>Los resultados del test vocacional indican que eres un excelente candidato para desarrollarte como: </label>
        <!--Para el grafico de barras-->
        <div class="w3-row">
            <?php
                $response = callRespuestas($_SESSION['idSesion']);
                $cont = 1;
                foreach($response as $value){?>
                    <div class="w3-col s4 w3-center">
                    <b><label id="carrera<?php echo $cont?>"> <?php if(isset($value['carrera'])) echo $value['carrera']; ?></label></b>
                    <input type="hidden" id="valor<?php echo $cont?>" value="<?php if(isset($value['afinidad'])) echo $value['afinidad']; ?>"></input>
                    </div><?php   
                    $cont++;    
                }
           ?>
        </div>
        <div class="w3-row">
            <canvas id="myChart"></canvas>
        </div>
        
        <div class="w3-row">
            <div class="w3-col s12 w3-center">
            <label id="footer" onclick="return alertaSalida();">
                <b>Ahora puedes tomar una decisión
                <a href="test.html">
                 o realizar nuevamente el test dando click aqui mismo</u></b>
                </a>
            </label>
            </div>
        </div>
    </form>
    <script src="Javascript/validarTest.js"></script>
    <script src="Javascript/Localizacion.js"></script>
</body>
</html>