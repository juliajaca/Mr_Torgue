<?php
 
class Bdmysqli {

    public $conexion;

    public function __construct($servidor, $usuario, $password, $bd){
        $this->conexion = new \mysqli($servidor, $usuario, $password, $bd);  
    }


    //////////////////////////////////////////
    public function abrirBD(){
        if($this->conexion->connect_error){
            die('Conexion fallida'. $this->conexion->connect_error);
            return FALSE;
        }else{
            // echo('CONEXION ESTABLECIDA ');
            return TRUE;
        }
    }

    public function cierreBD(){
        $cierre = $this->conexion->close();
        if($cierre == 1){
            // echo 'SE HA CERRADO LA CONEXIÓN';
            return TRUE;
        }else{
            echo 'No se ha cerrado la conexión ';
            return FALSE;

        }
    }

    //FUNCION DE HACER QUERYS
    public function query($query)
        {
        return $this->conexion->query($query);
        }
    ////////////////////////////////////////////////////////
}
 


