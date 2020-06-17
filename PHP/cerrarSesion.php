<?php

include "../Cliente.php";

// Destruir todas las variables de sesión.
$_SESSION = array();

// Cerrar la sesion tambien en la API.
$url = "http://localhost:52899/Sesion/logout";
$response = callAPI("PATCH",$url,$_SESSION['idSesion']);
if($response){
    echo "Entro correctamente, revisa tu cosa en base";
}

// Esto destruirá la sesión, y no la información de la sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// Finalmente, destruir la sesión.
session_destroy();
//header('Location:../login.html');
?>