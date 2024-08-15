<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of dbConexion
 *
 * @author armen
 */
class dbConexion {
    protected $conexion;
    public function conectar(){
        $this->conexion=new mysqli();
        $this->conexion->connect("localhost","root","","aulas");
        if(mysqli_connect_errno()){
            return mysqli_connect_errno();
        }
    }
    public function desconectar() {
        $this->conexion->close();
    }
}
