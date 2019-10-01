<?php

class SocioInsertable  {

    public $noValido = [];
    
    public $nombre;
    public $apellido;
    public $apellido2;
    public $fecha_nacimiento;
    public $id_tipo_documento;
    public $numero_documento;

    //FUNCION COMPROBACION NOMBRE
    private function nombreExiste($socio){
        if ($socio->nombre == NULL){
            $mensaje = 'No hay nombre';
            array_push($this->noValido, $mensaje);
            // echo($socio->nombre);
            // $this->noValido = 1; 
        }
    }

    private function nombrePatron($socio){
        if( !preg_match('/[a-z- ]{2,20}/', $socio->nombre)){
                        $mensaje = 'Nombre Incorrecto';
                        array_push($this->noValido, $mensaje); 
                     }
    }

    private function apellidoExiste($socio){
        if ($socio->apellido == NULL){
            $mensaje = 'No hay primer apellido';
            array_push($this->noValido, $mensaje);
            // $this->noValido = 1;  
            // echo('introduce un apellido');
        }
    }

    private function apellidoPatron($socio){
        if( !preg_match('/[a-z- ]{2,20}/', $socio->apellido)){
                        $mensaje = 'Primer apellido Incorrecto';
                        array_push($this->noValido, $mensaje); 
                     }
    }

    private function apellido2Existe($socio){
        if ($socio->apellido2 == NULL){
            $mensaje = 'No hay segundo apellido';
            array_push($this->noValido, $mensaje);
            // $this->noValido = 1;  
            // echo('introduce un apellido');
        }
    }

    private function apellido2Patron($socio){
        if( !preg_match('/[a-z- ]{2,20}/', $socio->apellido2)){
                        $mensaje = 'Segundo apellido Incorrecto';
                        array_push($this->noValido, $mensaje); 
                     }
    }


    private function tipoDocumentoExiste($socio){
        if ($socio->id_tipo_documento == NULL){
            $mensaje = 'No hay tipo de documento';
            array_push($this->noValido, $mensaje);
            // $this->noValido = 1;  
            // echo('selecciona un documento');
        }
    }

    private function numeroDocumentoExiste($socio){
        if ($socio->numero_documento == NULL){
            $mensaje = 'No hay número de documento';
            array_push($this->noValido, $mensaje);
            // $this->noValido = 1;  
            // echo('introduce un numero de documento');
        }
    }

    private function numeroDocumentoPatron($socio){
        if( !preg_match('/[a-z0-9]+/', $socio->numero_documento)){
                        $mensaje = 'Número documento incorrecto';
                        array_push($this->noValido, $mensaje); 
                     }
    }

    private function fechaNacimientoExiste($socio){
        if ($socio->fecha_nacimiento == NULL){
            $mensaje = 'No hay fecha de nacimiento';
            array_push($this->noValido, $mensaje);
            // $this->noValido = 1;
            // echo('introduce una fecha de nacimiento');  
        }
    }

    private function menorDeEdad($socio){
        if($socio->fecha_nacimiento != NULL){
            list($Y, $m, $d) = explode('-', $socio ->fecha_nacimiento);
            $mesDiaActual = date('md');
            $anyoActual = date('Y');

            if($mesDiaActual<$m.$d){
                $edadUsuario= ($anyoActual - $Y -1);
            }else {
                $edadUsuario=  (date('Y')- $Y);
            } 
            if($edadUsuario<18){
                $mensaje = 'Menor de edad';
                array_push($this->noValido, $mensaje);
                // echo('<h2 style="color:red">'.'Menor de edad'.'</h2>');
                // $this->noValido = 1;
            }
        }
    }

    public function comprobacionConjunta($socio){
        // var_dump($socio);
        $this->nombreExiste($socio);
        $this->nombrePatron($socio);
        $this->apellidoExiste($socio);
        $this->apellidoPatron($socio);
        $this->apellido2Existe($socio);
        $this->apellido2Patron($socio);
        $this->numeroDocumentoExiste($socio);
        $this->numeroDocumentoPatron($socio);
        $this->fechaNacimientoExiste($socio);
        $this->tipoDocumentoExiste($socio);
        $this->menorDeEdad($socio);
        
        return $this->noValido;
    }


}
