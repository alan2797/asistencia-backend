<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Conexion.php';
class DHorario {
    private $id;
    private $dia;
    private $hora_ini;
    private $hora_fin;
    private $aula;
    private $estado;
    private $idmateria;
    function getId() {
        return $this->id;
    }

    function getDia() {
        return $this->dia;
    }

    function getHora_ini() {
        return $this->hora_ini;
    }

    function getHora_fin() {
        return $this->hora_fin;
    }

    function getAula() {
        return $this->aula;
    }

    function getEstado() {
        return $this->estado;
    }

    function getIdmateria() {
        return $this->idmateria;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDia($dia) {
        $this->dia = $dia;
    }

    function setHora_ini($hora_ini) {
        $this->hora_ini = $hora_ini;
    }

    function setHora_fin($hora_fin) {
        $this->hora_fin = $hora_fin;
    }

    function setAula($aula) {
        $this->aula = $aula;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setIdmateria($idmateria) {
        $this->idmateria = $idmateria;
    }

    function obtenerHorarioD(){
        $sql = "select h.*,m.descripcion,m.sigla from horario h,materia m where h.estado ='1' and h.idmateria = m.id";
        $stmt = Conexion::conectar()->prepare($sql);
        if($stmt->execute()){
           return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }else{
           return -1; 
        }
    }
    function registrarHorarioD(){
         $sql = "INSERT INTO horario(dia, hora_ini, hora_fin, aula,estado, idmateria)
                VALUES(?, ?, ?, ?, ?, ?);";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->getDia());
        $stmt->bindParam(2, $this->getHora_ini());
        $stmt->bindParam(3, $this->getHora_fin());
        $stmt->bindParam(4, $this->getAula());
        $stmt->bindParam(5, $this->getEstado());
        $stmt->bindParam(6, $this->getIdmateria());
        
        return $stmt->execute();
    }
    function eliminarHorarioD(){
        $sql = "update horario set estado = '0' where id = ?;";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(1, $this->getId());
        if($stmt->execute()){
            return 1;
        }else{
            return -1;
        }
    }
}