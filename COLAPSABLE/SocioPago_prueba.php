<?php

class SocioPago {
    
    public $id_socio;
    public $nombre;
    public $apellido;
    public $apellido2;
    public $pagado;
    public $añoPago;

   
    ///GETTERS
    public function getId(){
        return $this->id_socio;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getPagado(){
        return $this->pagado;
    } 


    public function getAños(){
        return $this->añoPago;      
    }


    //SETTERS
    public function setId($id){
        $this->id_socio = $id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setApellido2($apellido2){
        $this->apellido2 = $apellido2;
    }

    public function setPagado($pagado){
        $this->pagado = $pagado;
    }

    public function setAñoPago($añoPago){
        $this->añoPago = $añoPago;
    }


    //TO STRING
    public function toString(){
        return ('Nombre : '. $this->nombre . ' Apellido: '. $this->apellido. ' Pagado '. $this->pagado);

    }
}



class AñoPago {
    public $año;
    public $pagado;
    public $mesPago;

    //GETTERS

    public function getAño(){
       return $this->año; 
    }

    public function getPagado(){
        return $this->pagado; 
     }

     public function getMesPago(){
        return $this->mesPago; 
     }


     //SETTERS

    public function setAño($año){
        $this->año = $año;
    }

    public function setPagado($pagado){
        $this->pagado = $pagado;
    }

    public function setMesPago($mesPago){
        $this->mesPago = $mesPago;
    }

     //TO STRING
     public function toString(){
         return ('-- Año: '. $this->año . ' Pagado: '. $this->pagado); 
     }
}



class MesPago {
    public $mes;
    public $pagado;
    public $fecha_pago;
    public $fecha_confirmacion_pago;
    public $n_pago;
    

    //GETTERS
    public function getMes(){
        return $this->mes; 
     }

     public function getPagado(){
        return $this->pagado; 
     }

     public function getFecha_pago(){
        return $this->fecha_pago; 
     }

     public function getFecha_confirmacion_pago(){
        return $this->getFecha_confirmacion_pago; 
     }
     //SETTERS

     public function setMes($mes){
        $this->mes = $mes;
    }

    public function setPagado($pagado){
        $this->pagado = $pagado;
    }

    public function setFechaPago($fecha_pago){
        $this->fecha_pago = $fecha_pago;
    }

    public function setFechaConfirmacionPago($fecha_confirmacion_pago){
        $this->fecha_confirmacion_pago = $fecha_confirmacion_pago;
    }
     //TO STRING
     public function toString(){
        return ('---- Mes: '. $this->mes . ' Pagado: '. $this->pagado. ' Fecha '. $this->fecha_pago);   
    }

}