<?php
 
class Socio {
    public $id_socio;
    public $nombre;
    public $apellido;
    public $apellido2;
    public $fecha_nacimiento;
    public $id_tipo_documento;
    public $numero_documento;
    public $fecha_baja;

    public function __construct($nombre, $apellido, $apellido2, $fecha_nacimiento, $id_tipo_documento, $numero_documento){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->apellido2 = $apellido2;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->id_tipo_documento = $id_tipo_documento;
        $this->numero_documento = $numero_documento;
    }
      
};


