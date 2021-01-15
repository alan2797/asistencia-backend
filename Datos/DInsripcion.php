<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Conexion.php';
class DInscripcion {
    private $id;
    private $fecha;
    private $cantidad;
    private $idalumno;
    private $estado;
    function getId() {
        return $this->id;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getIdalumno() {
        return $this->idalumno;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setIdalumno($idalumno) {
        $this->idalumno = $idalumno;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function obtenerInscripcionD(){
        $sql = "select * from inscripcion  where estado ='1'";
        $stmt = Conexion::conectar()->prepare($sql);
        if($stmt->execute()){
           return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }else{
           return []; 
        }
    }
    function registrarInscripcionD(){
         $sql = "INSERT INTO inscripcion(fecha, cantidad, estado, idalumno)
                VALUES(?, ?, ?, ?)";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->getFecha());
        $stmt->bindParam(2, $this->getCantidad());
        $stmt->bindParam(3, $this->getEstado());
        $stmt->bindParam(4, $this->getIdalumno());
        
        return $stmt->execute();
    }
    function eliminarInscripcionD(){
        $sql = "update inscripcion set estado = '0' where id = ?;";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->getId());
        if($stmt->execute()){
            return 1;
        }else{
            return -1;
        }
    }
    function obtenerUltimoIdD(){
        $sql = "select * from inscripcion order by id desc";
        $stmt = Conexion::conectar()->prepare($sql);
        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            return [];
        }
    }
}