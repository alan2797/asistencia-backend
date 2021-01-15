<?php
header('Accept: aplication/json');
header('Content-type: aplication/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: accept, content-type');
require_once '../Negocio/NInscripcion.php';
require_once '../Negocio/NDetalleInscripcion.php';
$winscripcion = new NInscripcion();
$wdetalleinscripcion = new NDetalleInscripcion();
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$opcion = $data['opcion'];
if($opcion == 'listar'){
    $inscripcion = $winscripcion->obtenerInscripcionN();
    echo json_encode(array(
        "response" => 1,
        "data" => $inscripcion,
        "opcion" => $opcion
    ));
}else if($opcion == "registrar"){
   $fecha = $data['fecha'];
   $cantidad = $data['cantidad'];
   $idalumno = $data['idalumno'];
   $arrayMterias = $data['arrayDetalle'];
   $estado = '1';
   $resultado = $winscripcion->registrarInscripcionN($fecha, $cantidad, $estado, $idalumno);
   if($resultado){
       $idinscripcion = $winscripcion->obtenerUltimoIdN();
       $resultado2 = $wdetalleinscripcion->registrarDetalleInscripcionN($arrayMterias, $idinscripcion['id']);
   }
   echo json_encode(array(
        "response" => $resultado,
        "opcion" => $opcion
    ));
}else if($opcion == 'eliminar'){
    $id = $data['idinscripcion'];
    $resultado = $winscripcion->eliminarInscripcionN($id);
    echo json_encode(array(
        "response" => $resultado,
        "opcion" => $opcion
    ));
}else if($opcion == 'listaDetalle'){
    $idinscripcion = $data['idinscripcion'];
    $detalle = $wdetalleinscripcion->obtenerDetalleN($idinscripcion);
    echo json_encode(array(
        "response" => 1,
        "data" => $detalle,
        "opcion" => $opcion
    ));
}


