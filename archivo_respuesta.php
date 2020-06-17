<?php
    include "PHP/consumir.php";
    include "Cliente.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Orientador vocacional</title>
    <link rel="stylesheet" href="archivo_respuesta.css">
    <!--Favicon-->
    <link rel="icon" type="image/png" href="imagenes/icon.PNG" />
	<!--Fuentes-->
    <link rel="stylesheet" href="Estilos/3wschools.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital@1&family=Open+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bitter:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <form class="form-archivo">
        <button type="submit" class="cierre" onclick =" return alertaSalida();">
            <a href="index.php">
            SALIR
            </a>
        </button>
    
        <h1>Orientador vocacional</h1>
        <label>
            Estos son tus resultados hasta ahora:
        </label>

        <div class="w3-row">
            <div class="w3-quarter  w3-container">
                
            </div>
            <div class="w3-half w3-container">
                <table class = "w3-table">
                                <tr class = "w3-blue">
                                    <th>Fecha</th>
                                    <th>Carrera</th>
                                    <th>Afinidad</th>
                                </tr>
                            <?php
                            $response = callHistorico($_SESSION["idSesion"]);
                            $cont = 1;
                                foreach($response as $value){
                                    ?><tbody><tr><?php
                                    echo "<th>".$value["fecha"]."</th>";
                                    echo "<th>".$value["carrera"]."</th>";
                                    echo "<th>".$value["afinidad"]."%</th>";
                                    ?><tr></tbody><?php
                                    $cont++;
                                }
                            ?>
                            </table>
            </div>
            <div class="w3-quarter  w3-container">
                
            </div>
        </div>
            
                            

        <label for="">
            Esperamos que este test te haya sido de ayuda <br>
        </label>
        <p>
        <label for="">¡BUENA SUERTE!</label>
        </p>
    </form>
    <script src="Javascript/validarTest.js"></script>
</body>
</html>