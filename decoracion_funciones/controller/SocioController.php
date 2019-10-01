<?php
require_once 'models/Bdmysqli.php';
require_once 'models/Socio.php';

class SocioController {

    //funcion de insertar en la base de datos
    public function insertar($socio){
        //var_dump($socio);
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();
        // echo ('hola');
        echo($socio->nombre);

        $stmt = $bdmysql->conexion->prepare("INSERT INTO socio (nombre, apellido,apellido2, id_tipo_documento,numero_documento, fecha_nacimiento) VALUES (?, ? ,?, ?, ?, ?)");

        $stmt->bind_param("sssiss", $socio->nombre,$socio->apellido, $socio->apellido2 ,$socio->id_tipo_documento, $socio->numero_documento , $socio->fecha_nacimiento);

        $stmt->execute();
        $stmt->close();
        
        // $query = $bdmysql->query('
        //     INSERT INTO socio (nombre, apellido,apellido2, id_tipo_documento,numero_documento, fecha_nacimiento)  
        //     VALUES ("'.$socio->nombre.'", "'.$socio->apellido.'" ,  "'.$socio->apellido2.'" ,'.$socio->id_tipo_documento.', "'.$socio->numero_documento.'" , "'.$socio->fecha_nacimiento.'"  )
        //     ' );
    
        $bdmysql->cierreBD();

        return True;
        }

        //funcion sacar la id del socio recién insertado
    public function idUltimoRegistro(){

        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();

        $ultimoRegistro = $bdmysql->query("SELECT socio.id_socio
        FROM socio 
        LEFT JOIN pago
        ON pago.id_socio = socio.id_socio
        ORDER BY socio.id_socio DESC
        LIMIT 1
        "); 

        foreach ($ultimoRegistro as $valor){
            $id = $valor['id_socio'];
        }
        return $id;
    }

    //insertar pago en el socio recien creado
    public function insertarPagoUltimoSocio($id){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();

        $hoy = date("Y-m-d");
            
        $insertar = $bdmysql->query('
            INSERT INTO pago (id_socio, fecha_pago )  
            VALUES ('.$id.', "'.$hoy.'"  )
        ' );
    }

    //FUNCION TRAER DATOS DE LA BD
    public function buscarSocio($socioID){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();

        $selectedSocio = $bdmysql->query('
            SELECT * from socio WHERE id_socio ='.$socioID.'
        ');
  
        // foreach ($selectSocio as $valor){
        //     echo($valor['nombre']);
        //     echo ('<br>');
            // echo($valor['precio']);
            // echo('<hr>');          
        // }
        $bdmysql->cierreBD();

        return($selectedSocio);
    
    }
      
    //FUNCION MODIFICAR SOCIO
    public function modificarSocio($socio){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();
        echo($socio->id_socio);
        // echo('Esto es un echo');

        print_r($socio);
        $stmt = $bdmysql->conexion->prepare("UPDATE socio SET nombre = ?, apellido = ?, apellido2 = ?, fecha_nacimiento = ?, id_tipo_documento = ?, numero_documento = ? WHERE id_socio = ?");

        $stmt->bind_param("ssssisi", 
        $socio->nombre, 
        $socio->apellido, 
        $socio->apellido2, 
        $socio->fecha_nacimiento,
        $socio->id_tipo_documento,
        $socio->numero_documento,
        $socio->id_socio);
        
        // UPDATE socio SET nombre = 0, apellido = 1  WHERE id_socio = 4


        $stmt->execute();
        $stmt->close();

        // $cambios = $bdmysql->query(' 
        //     UPDATE socio SET 
        //     nombre ="'.$socio->nombre.'",
        //     apellido ="'.$socio->apellido.'",
        //     apellido2 ="'.$socio->apellido2.'",
        //     fecha_nacimiento ="'.$socio->fecha_nacimiento.'",
        //     id_tipo_documento ='.$socio->id_tipo_documento.',
        //     numero_documento ="'.$socio->numero_documento.'"
      
        //     WHERE id_socio = '.$socio->id_socio.'
        // ');

        return True;
    }
    
    //CONSULTA DE SOCIOS
    public function consultarSocios(){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();

        $leer = $bdmysql->query("SELECT * FROM socio 
        WHERE activo = 1
        ORDER BY apellido ASC, nombre ASC
        ");

        return $leer;
    }


    //BORRAR SOCIO
    public function borrarSocio($id_socio){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();

        $today=date('Y-m-d');

            $stmt = $bdmysql->conexion->prepare('UPDATE socio SET activo = 0 , fecha_baja = "'.$today.'" WHERE id_socio = ?');
            $stmt->bind_param("s", $id_socio);
            $stmt->execute();
            $stmt->close();

        return True;
    }

};

