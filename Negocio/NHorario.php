<?php

require_once '../Datos/DHorario.php';
class NHorario {
    public $DHorario;
    
    public function __construct() {
        $this->DHorario = new DHorario();
    }
    function obtenerHoariosN(){
        return $this->DHorario->obtenerHorarioD();
    }
    function registrarHorarioN($dia,$hora_ini,$hora_fin,$aula,$estado,$idmateria){
        $this->DHorario->setDia($dia);
        $this->DHorario->setHora_ini($hora_ini);
        $this->DHorario->setHora_fin($hora_fin);
        $this->DHorario->setAula($aula);
        $this->DHorario->setEstado($estado);
        $this->DHorario->setIdmateria($idmateria);
        return $this->DHorario->registrarHorarioD();
    }
    function eliminarHorarioN($id){
        $this->DHorario->setId($id);
        return $this->DHorario->eliminarHorarioD();
    }
    
}
