<?php

class Pago {
    public $id_pago;
    public $id_socio;
    public $fecha_pago;
    public $pagado;
    public $nombre;
    public $apellido;

    public function __construct($id_pago, $id_socio, $fecha_pago, $pagado){
        $this->id_pago = $id_pago;
        $this->id_socio = $id_socio;
        $this->fecha_pago = $fecha_pago;
        $this->pagado = $pagado;
    }

    //setters

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
         $this->apellido = $apellido;
    }


    //getters
    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getId_Pago(){
        return $this->id_pago;
    }

    public function getId_Socio(){
        return $this->id_socio;
    }

    public function getFecha_Pago(){
        return $this->fecha_pago;
    }

    public function getPagado(){
        return $this->pagado;
    }
    

}