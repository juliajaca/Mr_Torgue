<?php

include_once ('../decoracion_funciones/models/Bdmysqli.php');
require_once 'SocioPago.php';

class SocioPagoController{

    public function getAñosFromSocio($socio){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();

        $getAñosFromSocio = $bdmysql->query('
        SELECT year(fecha_pago) as year FROM pago WHERE id_socio ='.$socio->id_socio.'
        ORDER BY 
        fecha_pago ASC
        ');

        // print_r($getAñosFromSocio);
        $arrayDeObjetosAños =[];

        $año_anterior= NULL;

        foreach($getAñosFromSocio as $valor){
            // echo('hola');
            $año = $valor['year'];
            // $pagado = $valor['pagado'];
            
            $añopago = new AñoPago();
            $añopago->año=$año;
            
            if ($año != $año_anterior){
                array_push($arrayDeObjetosAños, $añopago);
            }

            $año_anterior= $año;
        }
            // echo('array de objetos años');
            // echo('<pre>');
            // // print_r($arrayDeObjetosAños);
            // echo('</pre>');

        $socio->añoPago = $arrayDeObjetosAños;
        return ($socio);
    }


    public function sacarIds(){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();
    
        $leer = $bdmysql->query("SELECT *
        FROM socio 
        ORDER BY apellido ASC, apellido2 ASC, nombre ASC
        ");   
    
        return $leer;
    }

    public function SacarInfoSocio($id){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();
        
        $socio = $bdmysql->query('
        SELECT nombre, apellido ,apellido2, id_socio from socio WHERE id_socio ='.$id.'
        '); 

        $stmt = $bdmysql->conexion->prepare('
        SELECT nombre, apellido ,apellido2, id_socio from socio WHERE id_socio = ?
        ');

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        return $socio;
    }
}

class PagoMesController{
    public function getMesFromSocioYAño($socio){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();

        // echo('el año pago de los socios');
        // echo('<pre>');
        // // print_r($socio->añoPago);
        // echo('</pre>');

        $arrayObjetosAños = $socio->añoPago;

        $mes_anterior= NULL;
        $arrayDeObjetos =[];
        
        foreach($arrayObjetosAños as $año ){
      
            foreach( $año as $key => $valor){

                if ($key == 'año'){

                    $año = $valor;

                    $getMesesFromAño = $bdmysql->query('
                    SELECT month(pago.fecha_pago) as mes ,pago.pagado , pago.fecha_pago, pago.id_pago, pago.fecha_confirmacion_pago
                    FROM pago 
                    JOIN socio
                    ON pago.id_socio = socio.id_socio
                    WHERE year(pago.fecha_pago) ='.$año.' 
                    AND
                    socio.id_socio ='.$socio->id_socio.'
                    ORDER BY pago.fecha_pago ASC
                    ');
                    
                    // echo($año);
                    // echo('<pre>');
                    // echo('Meses de año');
                    // print_r($getMesesFromAño);
                    // echo('</pre>'); 

                    $arrayMeses= [];

                    //COMPROBACION DE LA MOROSIDAD POR AÑO
                    $pagado = 1;
                    foreach($getMesesFromAño as $valor){
                        // echo('Meses del año segunda parte');
                        // echo('<pre>');
                        // print_r($valor);
                        // echo('</pre>');

                        $mespago = new MesPago();

                        $mes = $valor['mes'];
                        $fecha_pago = $valor['fecha_pago'];
                        $pagado= $valor['pagado'];
                        $fecha_confirmacion_pago = $valor['fecha_confirmacion_pago'];
                        $n_pago = $valor['id_pago'];

                        $mespago->mes=$mes;
                        $mespago->pagado=$pagado;
                        $mespago->fecha_pago=$fecha_pago;  
                        $mespago->fecha_confirmacion_pago=$fecha_confirmacion_pago;
                        $mespago->n_pago=$n_pago;   
                        array_push($arrayMeses, $mespago);

                        if($valor['pagado'] == 0){
                            $pagado = 0;
                        }
                    }

                    // echo('<pre>');
                    // print_r($arrayMeses);
                    // echo('</pre>');

                    $añopago = new AñoPago();
                    $añopago->año=$año;
                    $añopago->mesPago = $arrayMeses; 
                    $añopago->pagado = $pagado;
                    
                    array_push($arrayDeObjetos, $añopago);
                }
            }            
        }
       
        
        //COMPROBACION DE LA MOROSIDAD TOTAL
        $añopagado = 1;
        foreach($arrayDeObjetos as $año){
   
            foreach($año as $key => $valor){
               
                if ($key == 'pagado' AND $valor == 0){
                    $añopagado = 0;
                    // echo('AQUI HAY UN MOROSo');
                }
            }
        }

        $sociopago = new SocioPago ($socio->id_socio, $socio->nombre, $socio->apellido, $socio->pagado);
        $socio->añoPago = $arrayDeObjetos;
        $socio->pagado = $añopagado;

        // echo('<pre>');
        // // print_r($socio);
        // echo('</pre>');

        return($socio);

    }


}
