<?php
header('Accept: aplication/json');
header('Content-type: aplication/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: accept, content-type');

require_once '../Negocio/NAlumno.php';
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$walumno = new NAlumno();
$opcion = $data['opcion'];
if($opcion == 'listar'){
    $alumnos = $walumno->obtenerAlumnosN();
    echo json_encode(array(
        "response" => 1,
        "data" => $alumnos,
        "opcion" => $opcion
    ));
}else if($opcion == "registrar"){
   $nombre = $data['nombre'];
   $apellido = $data['apellido'];
   $ci = $data['ci'];
   $telefono = $data['telefono'];
   $estado = '1';
   $resultado = $walumno->registrarAlumnoN($nombre, $apellido, $ci, $telefono, $estado);
   echo json_encode(array(
        "response" => $resultado,
        "opcion" => $opcion
    ));
}else if($opcion == 'eliminar'){
    $id = $data['idalumno'];
    $resultado = $walumno->eliminarAlumnoN($id);
    echo json_encode(array(
        "response" => $resultado,
        "opcion" => $opcion
    ));
}
