<?php 
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
    require("conexion.php"); // IMPORTA EL ARCHIVO CON LA CONEXION A LA DB

    $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
    $params = json_decode($json); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE

    //
    $email="1";//$params->correo;
    $pass="1";//$params->pass;


    $conexion = conexion(); // CREA LA CONEXION
    // REALIZA LA QUERY A LA D
    // REALIZA LA QUERY A LA DB
      $registros = mysqli_query($conexion, "SELECT * FROM usuario  where email=$email and contra=$pass");
       
      // RECORRE EL RESULTADO Y LO GUARDA EN UN ARRAY
      while ($resultado = mysqli_fetch_array($registros))  
      {
        $datos[] = $resultado;
      }
      
      $json = json_encode($datos); // GENERA EL JSON CON LOS DATOS OBTENIDOS
      
      echo $json; // MUESTRA EL JSON GENERADO
    
    header('Content-Type: application/json');
?>