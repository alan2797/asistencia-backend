<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Conexion.php';
class DDocente {
    private $id;
    private $nombre;
    private $apellido;
    private $ci;
    private $telefono;
    private $estado;
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getCi() {
        return $this->ci;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setCi($ci) {
        $this->ci = $ci;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    function obtenerDocentesD(){
        $sql = "select * from docente where estado ='1'";
        $stmt = Conexion::conectar()->prepare($sql);
        if($stmt->execute()){
           return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }else{
           return []; 
        }
    }
    function registrarDocenteD(){
         $sql = "INSERT INTO docente(nombre, apellido, ci, telefono, estado)
                VALUES(?, ?, ?, ?, ?);";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->getNombre());
        $stmt->bindParam(2, $this->getApellido());
        $stmt->bindParam(3, $this->getCi());
        $stmt->bindParam(4, $this->getTelefono());
        $stmt->bindParam(5, $this->getEstado());
        
        return $stmt->execute();
    }
    function eliminarDocenteD(){
        $sql = "update docente set estado = '0' where id = ?;";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->getId());
        if($stmt->execute()){
            return 1;
        }else{
            return -1;
        }
    }

}