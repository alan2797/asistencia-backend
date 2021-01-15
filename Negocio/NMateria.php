<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../Datos/DMateria.php';
class NMateria {
    public $DMateria;
    
    public function __construct() {
        $this->DMateria = new DMateria();
    }
    function obtenerMateriasN(){
        return $this->DMateria->obtenerMateriasD();
    }
    function registrarMateriaN($descripcion,$sigla,$nivel,$estado,$iddocente){
        $this->DMateria->setDescripcion($descripcion);
        $this->DMateria->setSigla($sigla);
        $this->DMateria->setNivel($nivel);
        $this->DMateria->setEstado($estado);
        $this->DMateria->setIddocente($iddocente);
        return $this->DMateria->registrarMateriaD();
    }
    function eliminarMateriaN($id){
        $this->DMateria->setId($id);
        return $this->DMateria->eliminarMateriaD();
    }
    
}