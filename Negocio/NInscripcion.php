<?php

require_once '../Datos/DInsripcion.php';
class NInscripcion {
    public $DInscripcion;
    
    public function __construct() {
        $this->DInscripcion = new DInscripcion();
    }
    function obtenerInscripcionN(){
        return $this->DInscripcion->obtenerInscripcionD();
    }
    function registrarInscripcionN($fecha,$cantidad,$estado,$idalumno){
        $this->DInscripcion->setFecha($fecha);
        $this->DInscripcion->setCantidad($cantidad);
        $this->DInscripcion->setEstado($estado);
        $this->DInscripcion->setIdalumno($idalumno);
        return $this->DInscripcion->registrarInscripcionD();
    }
    function eliminarInscripcionN($id){
        $this->DInscripcion->setId($id);
        return $this->DInscripcion->eliminarInscripcionD();
    }
    function obtenerUltimoIdN(){
        return $this->DInscripcion->obtenerUltimoIdD();
    }
}
