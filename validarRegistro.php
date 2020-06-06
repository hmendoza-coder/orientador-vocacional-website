<!DOCTYPE html>
<html lang="es"> 
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="Estilos/3wschools.css" type="text/css">
<link rel="stylesheet" href="Estilos/estilo.css" type="text/css">
<title>Validación del formulario</title>
</head>
<body>
<?php

    // Todas las variables que se reciben del formulario.
    $user = $_POST["nombre"];
    $apeP = $_POST["apellidoP"];
    $apeP = $_POST["apellidoM"];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $sexo = $_POST['sexo'];
    $fecha = $_POST['fecha'];    
    $colonia = $_POST['colonia'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];

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

    function conexionDB(){
        $servername = "localhost";
        $username = "root";
        $password = "xenia";
        $dbname = "mrwillys";
        $con = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

        return $con;
    }
    function Redireccionar($boolean){
        if($boolean){
            header('Location: index.php');
        }
        else{
            header('Location: index2.html');
        }
    }
    
    function validarExistencia($user, $pass, $nombre, $tel, $correo){
        $con = conexionDB();
        if ($con->connect_error) {
            die("Conexion Fallida: " . $con->connect_error);
        }
        $user = limpiarVariable($user);
        $pass = limpiarVariable($pass);
        $nombre = limpiarVariable($nombre);
        $tel = limpiarVariable($tel);
        $correo = limpiarVariable($correo);
        $sql="SELECT * FROM usuarios where nombreUsuario='".$user."' and clave='".$pass."' and correo = '".$correo."' and telefono='".$tel."';";
        if(!$result = $con->query($sql)){
            echo "Error de conexion";
        }
        else{
            $usuario = $result->fetch_assoc();
            if(!$user = $usuario['nombreUsuario']){
                if($correo != $usuario['correo']){
                    $query = "INSERT INTO usuarios (nombreUsuario, nombreCompleto, telefono, correo, clave) values ('".$user."','".$nombre."','".$tel."','".$correo."','".$pass."');";
                    echo "Consulta: $query";
                    if ($con->query($query) === TRUE) {
                        
                        return true;
                    } else {
                        echo "Error: " . $query . "<br>" . $con->error;
                        return false;
                    }    
                }
                else{
                    
                    return false;
                }
                  
            }
            else{
                return false;
            }
            
        }
        $con->close();
    }
    if(validarExistencia($user, $pass, $nombre, $tel, $correo)){
        $mensaje = "Usuario agregado con exito";
        echo "<script>";
        echo "alert('$mensaje');";  
        echo "window.location = 'sesion.php';";
        echo "</script>";  
    }
    else{
        $mensaje = "El usuario ya existe";
        echo "<script>";
        echo "alert('$mensaje');";  
        echo "window.location = 'index.php';";
        echo "</script>";  
    }
        
   
?>
<script src="Javascript/sweetAlert.js"></script>
</body>
</html>