<?php

require_once '../Datos/DDocente.php';
class NDocente {
    public $DDocente;
    
    public function __construct() {
        $this->DDocente = new DDocente();
    }
    function obtenerDocenteN(){
        return $this->DDocente->obtenerDocentesD();
    }
    function registrarDocenteN($nombre,$apellido,$ci,$telefono,$estado){
        $this->DDocente->setNombre($nombre);
        $this->DDocente->setApellido($apellido);
        $this->DDocente->setCi($ci);
        $this->DDocente->setTelefono($telefono);
        $this->DDocente->setEstado($estado);
        return $this->DDocente->registrarDocenteD();
    }
    function eliminarDoceenteN($id){
        $this->DDocente->setId($id);
        return $this->DDocente->eliminarDocenteD();
    }   
}