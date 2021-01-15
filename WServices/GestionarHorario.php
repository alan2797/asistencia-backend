<?php
header('Accept: aplication/json');
header('Content-type: aplication/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: accept, content-type');
require_once '../Negocio/NHorario.php';
$whorario = new NHorario();
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$opcion = $data['opcion'];
if($opcion == 'listar'){
    $horario = $whorario->obtenerHoariosN();
    echo json_encode(array(
        "response" => 1,
        "data" => $horario,
        "opcion" => $opcion
    ));
}else if($opcion == "registrar"){
   $dia = $data['dia'];
   $hora_ini = $data['hora_ini'];
   $hora_fin = $data['hora_fin'];
   $aula = $data['aula'];
   $idmateria = $data['idmateria'];
   $estado = '1';
   $resultado = $whorario->registrarHorarioN($dia, $hora_ini, $hora_fin, $aula,$idmateria, $estado);
   echo json_encode(array(
        "response" => $resultado,
        "opcion" => $opcion
    ));
}else if($opcion == 'eliminar'){
    $id = $data['idhorario'];
    $resultado = $whorario->eliminarHorarioN($id);
    echo json_encode(array(
        "response" => $resultado,
        "opcion" => $opcion
    ));
}


