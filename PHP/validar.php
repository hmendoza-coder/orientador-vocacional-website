<?php
// Start the session
session_start();
?>
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
    define('SERVERNAME', 'localhost:3306');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'mrwillys');
    $user = $_POST["user"];
    $pass = $_POST["pass"];

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
    function obtenerUltimo($con){
        $query="Select NoOrden from ordenes order by NoOrden DESC;";
        if(!$result = $con->query($query)){
            echo " La conexion falló, estamos experimentando problemas.";
        }
        else{
            $usuario = $result->fetch_assoc();
            return $usuario['NoOrden'];
        }
                    
    }
    
    function validarExistencia($user, $pass){
        $con = conexionDB();
        if ($con->connect_error) {
            die("Conexion Fallida: " . $con->connect_error);
        }
        $user = limpiarVariable($user);
        $pass = limpiarVariable($pass);
        $sql="SELECT * FROM usuarios where nombreUsuario='".$user."' and clave='".$pass."';";

        if(!$result = $con->query($sql)){
            echo " La conexion falló, estamos experimentando problemas.";
        }
        else{
            $usuario = $result->fetch_assoc();
            if(strcmp($usuario['nombreUsuario'], $user) == 0){
                if(strcmp($usuario['clave'], $pass) == 0){
                    $_SESSION['usuario'] = $user;
                    $_SESSION['clave'] = $pass;
                    $_SESSION['nombre'] = $usuario['nombreCompleto'];
                    $_SESSION['tel'] = $usuario['telefono'];
                    $_SESSION['corr'] = $usuario['correo']; 
                    $_SESSION['noOrden'] = 12;
                    return true;              
                }
                else{
                    //echo "error clave";
                    return false;
                }
                
            }
            else{
                //echo "Error usuario";
                return false;
            }
        }
       
        $con->close();
    }
    if(validarExistencia($user, $pass)){
        $mensaje = "El nombre de usuario es: ".$_SESSION['usuario'];
        echo "<script>";
        echo "if(confirm('$mensaje'));";  
        echo "window.location = 'index.php';";
        echo "</script>";  
    }
    else{
        $mensaje = "Usuario  o contraseña incorrecto(s)";
        echo "<script>";
        echo "if(confirm('$mensaje'));";  
        echo "window.location = 'Sesion.php';";
        echo "</script>";  
    }
        
   
?>
</body>
</html>