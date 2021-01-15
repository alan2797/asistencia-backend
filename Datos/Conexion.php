<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Conexion {
    public function conectar(){
	$host		= "localhost";
	$dbname 	= "academica";
	$usuario 	= "root";
	$password	= "";

	$link = new PDO("mysql:host=$host;dbname=$dbname",$usuario,$password);
	return $link;
    }
}
