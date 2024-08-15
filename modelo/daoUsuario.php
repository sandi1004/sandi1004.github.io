<?php

require_once 'dbConexion.php';
class daoUsuario extends dbConexion{
   
    public function busUserEmail($ema){
        $sql="select * from usuarios where usuario='$ema'";
        $ca=array();
        $this->conectar();
        $re=$this->conexion->query($sql);
        if(mysqli_num_rows($re)){
           $ca= mysqli_fetch_assoc($re);
           
        }else{$ca=null;}
        $this->desconectar();
        return $ca;
    }    
        public function nombreUser($idu){
        $sql="select nombre from usuario where idusuario=$idu";
        $ca=array();
        $this->conectar();
        $re=$this->conexion->query($sql);
        if(mysqli_num_rows($re)){
           $ca= mysqli_fetch_assoc($re);
           $nom=$ca["nombre"];
        }else{$nom="";}
        $this->desconectar();
        return $nom;
    }
    public function login($user){
        $sql="select * from usuario where email='".$user["usuario"]."' and clave='".$user["password"]."'";
        $ca=array();
        $this->conectar();
        $re=$this->conexion->query($sql);
        if(mysqli_num_rows($re)){
           $ca= mysqli_fetch_assoc($re);
        }else{$ca=null;}
        $this->desconectar();
        return $ca;    
    }
    public function listaUsuario(){
        $sql="SELECT rol.nombre nom,idusuario,usuario.nombre,tipo_documento,num_documento,direccion,telefono,email,usuario.estado esta FROM rol inner join usuario on rol.idrol=usuario.idrol;";
        $lista=array();
        $this->conectar();
        $lista=null;
        $lcas=$this->conexion->query($sql);
        if(mysqli_num_rows($lcas)){
            while($re=$lcas->fetch_assoc()){
                $lista[]=$re;
            }
        }
        $this->desconectar();
        return $lista;
    }
}
