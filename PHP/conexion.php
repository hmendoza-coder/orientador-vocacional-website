<?php
    $server = "127.0.0.1";
    $user = "root";
    $pass = "";
    $base = "orientador_vocacional";
    $puerto = "3308";

    //Conexion
    $conexion = new mysqli($server, $user, $pass, $base, $puerto);
    if($conexion -> conect_errno){
        die($conexion -> connect_error)
    }

    //Guardar, Modificar y Eliminar
    function NonQuery($query, $conexion = null){
        if(!$conexion) global $conexion;
        $result = $conexion -> query($query);  

        return $conexion -> affect_row;
    }

    //Consulta
    function ObtenerRegistros($query, $conexion = null){
        if(!$conexion) global $conexion;
        $result = $conexion -> query($query);  
        $resultArray = array();
        foreach($result as $registros){
            $resultArray[] = $registros;
        }
        return $resultArray;
    }

    //Consumir
    function API($ruta){
        $url = ""; // Revisar la ruta del API
        $respuesta = $url . $ruta;
        return $respuesta;
    }

    //
    $direccion = API(""); // Revisar la ruta del API
    $json = file_get_contents($direccion);

    $datos = json_decode($json, true);
    print_r($datos);
?>