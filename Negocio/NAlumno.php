<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../Datos/DAlumno.php';
class NAlumno {
    public $DAlumno;
    
    public function __construct() {
        $this->DAlumno = new DAlumno();
    }
    function obtenerAlumnosN(){
        return $this->DAlumno->obtenerAlumnosD();
    }
    function registrarAlumnoN($nombre,$apellido,$ci,$telefono,$estado){
        $this->DAlumno->setNombre($nombre);
        $this->DAlumno->setApellido($apellido);
        $this->DAlumno->setCi($ci);
        $this->DAlumno->setTelefono($telefono);
        $this->DAlumno->setEstado($estado);
        return $this->DAlumno->registrarAlumnoD();
    }
    function eliminarAlumnoN($id){
        $this->DAlumno->setId($id);
        return $this->DAlumno->eliminarAlumnoD();
    }
    
}