<?php
header('Accept: aplication/json');
header('Content-type: aplication/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: accept, content-type');
require_once '../Negocio/NDocente.php';
$wdocente = new NDocente();
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$opcion = $data['opcion'];
if($opcion == 'listar'){
    $docentes = $wdocente->obtenerDocenteN();
    echo json_encode(array(
        "response" => 1,
        "data" => $docentes,
        "opcion" => $opcion
    ));
}else if($opcion == "registrar"){
   $nombre = $data['nombre'];
   $apellido = $data['apellido'];
   $ci = $data['ci'];
   $telefono = $data['telefono'];
   $estado = '1';
   $resultado = $wdocente->registrarDocenteN($nombre, $apellido, $ci, $telefono, $estado);
   echo json_encode(array(
        "response" => $resultado,
        "opcion" => $opcion
    ));
}else if($opcion == 'eliminar'){
    $id = $data['iddocente'];
    $resultado = $wdocente->eliminarDoceenteN($id);
    echo json_encode(array(
        "response" => $resultado,
        "opcion" => $opcion
    ));
}


