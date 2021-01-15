<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Conexion.php';
class DMateria {
    private $id;
    private $descripcion;
    private  $sigla;
    private $nivel;
    private $estado;
    private $iddocente;
    function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getSigla() {
        return $this->sigla;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getEstado() {
        return $this->estado;
    }

    function getIddocente() {
        return $this->iddocente;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setSigla($sigla) {
        $this->sigla = $sigla;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setIddocente($iddocente) {
        $this->iddocente = $iddocente;
    }
    
    function obtenerMateriasD(){
        $sql = "select m.*,d.nombre,d.apellido from materia m,docente d where m.estado ='1' and m.iddocente=d.id";
        $stmt = Conexion::conectar()->prepare($sql);
        if($stmt->execute()){
           return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }else{
           return -1; 
        }
    }
    function registrarMateriaD(){
         $sql = "INSERT INTO materia(descripcion, sigla, nivel, estado, iddocente)
                VALUES(?, ?, ?, ?, ?);";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->getDescripcion());
        $stmt->bindParam(2, $this->getSigla());
        $stmt->bindParam(3, $this->getNivel());
        $stmt->bindParam(4, $this->getEstado());
        $stmt->bindParam(5, $this->getIddocente());
        
        return $stmt->execute();
    }
    function eliminarMateriaD(){
        $sql = "update  materia set estado = '0' where id = ?;";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->getId());
        if($stmt->execute()){
            return 1;
        }else{
            return -1;
        }
    }

}