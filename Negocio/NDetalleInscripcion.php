<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../Datos/DDetalleInscripcion.php';
class NDetalleInscripcion {
    public $DDetalleInscricion;
    public function __construct() {
        $this->DDetalleInscricion = new DDetalleInscripcion();
    }
    function registrarDetalleInscripcionN($arrayMterias, $idinscripcion){
        for($i = 0; $i < sizeof($arrayMterias); $i++ ){
            $this->DDetalleInscricion->setIdinscripcion($idinscripcion);
            $this->DDetalleInscricion->setIdmateria((int)$arrayMterias[$i]);
            $this->DDetalleInscricion->registrarDetalleInscripcionD();
        }
        return 1; 
    }
    function obtenerDetalleN($idinscripcion){
        $this->DDetalleInscricion->setIdinscripcion($idinscripcion);
        return $this->DDetalleInscricion->obtenerDetalleD();
    }
}