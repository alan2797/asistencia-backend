<?php
header('Accept: aplication/json');
header('Content-type: aplication/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: accept, content-type');
require_once '../Negocio/NMateria.php';
$wmateria = new NMateria();
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$opcion = $data['opcion'];
if($opcion == 'listar'){
    $materia = $wmateria->obtenerMateriasN();
    echo json_encode(array(
        "response" => 1,
        "data" => $materia,
        "opcion" => $opcion
    ));
}else if($opcion == "registrar"){
   $descripcion = $data['descripcion'];
   $sigla = $data['sigla'];
   $nivel = $data['nivel'];
   $iddocente = $data['iddocente'];
   $estado = '1';
   $resultado = $wmateria->registrarMateriaN($descripcion, $sigla, $nivel, $estado, $iddocente);
   echo json_encode(array(
        "response" => $resultado,
        "opcion" => $opcion
    ));
}else if($opcion == 'eliminar'){
    $id = $data['idmateria'];
    $resultado = $wmateria->eliminarMateriaN($id);
    echo json_encode(array(
        "response" => $resultado,
        "opcion" => $opcion
    ));
}


