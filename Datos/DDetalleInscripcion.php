<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Conexion.php';
class DDetalleInscripcion {
    private $id;
    private $idmateria;
    private $idinscripcion;
    function getIdinscripcion() {
        return $this->idinscripcion;
    }

    function setIdinscripcion($idinscripcion) {
        $this->idinscripcion = $idinscripcion;
    }

    function getId() {
        return $this->id;
    }

    function getIdmateria() {
        return $this->idmateria;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdmateria($idmateria) {
        $this->idmateria = $idmateria;
    }

    function registrarDetalleInscripcionD(){
        $sql = "INSERT INTO detalleinscripcion(idinscripcion,idmateria)
                VALUES(?, ?)";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->getIdinscripcion());
        $stmt->bindParam(2, $this->getIdmateria());
        
        return $stmt->execute();
    }
    function obtenerDetalleD(){
        $sql = "select * from detalleinscripcion where idinscripcion = ?";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->getIdinscripcion());
        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return [];
        }
    }
}