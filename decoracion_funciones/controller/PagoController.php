<?php

require_once 'models/Bdmysqli.php';
require_once 'models/Pago.php';


class PagoController{

    public function sacarPagos(){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();

        $leer = $bdmysql->query("SELECT *
        FROM pago 
        JOIN socio
        ON pago.id_socio = socio.id_socio
        ORDER BY socio.apellido ASC, 
        socio.nombre ASC,
        pago.fecha_pago ASC
        ");   

        return $leer;
    }

    public function objetoAArray($objetoMysqli){
        $array = [];
        foreach($objetoMysqli as $valor){
            $variable = (array) $valor;
            array_push($array, $variable);
        }
        return $array;
    }
    
    #Esto es el listado de los pagos primera versión
    public function mostrarPagos($objetoMysqli){
        $id_anterior = 0;

        foreach ($objetoMysqli as $valor){
            
            $nombre = $valor['nombre'];
            $apellido = $valor['apellido'];
            $id = $valor['id_socio'];
            $id_pago = $valor['id_pago'];
            $fecha_pago = $valor['fecha_pago'];
            $pagado = $valor['pagado'];
            $fecha_det= explode('-', $fecha_pago);
            //echo $fecha_det[0]; // imprimiría el mes 
            $mes = $fecha_det[1];//imprime el mes
            
            $listaMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
            $mes_letra = $listaMeses[$mes-1];
 
           
            if($id != $id_anterior){
                echo('<tr class = "subrayado">');
                    echo('<td class ="nombre ">'.$nombre.' '.$apellido.'</td>');
                    echo('<td class = "numero_documento"></td>');
                    echo('<td class ="tipo_documento"></td>');
                    echo('<td class ="fecha_nacimiento"></td>');
                    echo('<td class = "editar"></td>');
                    echo('<td class = "borrar"></td>');
                echo('</tr>');
            }

            $id_anterior = $id;

            if($id == $id_anterior) {
                echo('<tr>');

                    if ($pagado == 0){
                        echo('<td class ="nombre"></td>');
                        echo('<td class = "numero_documento">'.$id_pago.'</td>');
                        echo('<td class ="tipo_documento"
                         style = "color: red;"
                        >'.$mes_letra.'</td>');
                        echo('<td class ="fecha_nacimiento" style = "color: red;">'.$fecha_det[0].'</td>');

                        echo('<td class = "editar"><i class="far fa-times-circle fa-lg"></i></td>');
                        echo('<form action="" method="POST">');
                            echo('<td class = "pagar">');
                                echo('<button name="pagar" type="submit" value="'.$id_pago.'">');
                                    echo('<i class="fas fa-euro-sign fa-lg"></i>');
                                echo('</button>');
                            echo('</td>');
                        echo('</form>');
                    }

                    else {
                        echo('<td class ="nombre"></td>');
                        echo('<td class = "numero_documento">'.$id_pago.'</td>');
                        echo('<td class ="tipo_documento">'.$mes_letra.'</td>');
                        echo('<td class ="fecha_nacimiento">'.$fecha_det[0].'</td>');

                        echo('<td class = "editar"><i class="far fa-check-circle fa-lg"></i></td>');

                          echo('<form action="" method="POST">');
                            echo('<td class = "pagar">');

                            echo('</td>');
                        echo('</form>');
                    }

                echo('</tr>');
            }
            
        }
}

    public function sacarDocumentoSocio(){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();

        $leer = $bdmysql->query("SELECT id_socio, id_tipo_documento, numero_documento
         FROM socio
         ");
         return $leer;
    }

    public function comprobarDocumentoSocio($id_tipo_documento, $numero_documento){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();

        $pagos = $this->sacarDocumentoSocio();

        $valido = 1;       
        foreach ($pagos as $valor){

            $id_tipo_documentoBD = $valor['id_tipo_documento'];
            $numero_documentoBD = $valor['numero_documento'];
            $id_socio = $valor['id_socio'];  
  
            if($id_tipo_documento == $id_tipo_documentoBD AND
             $numero_documento == $numero_documentoBD){
               header('location:resultado_pagos.php?id='.$id_socio.'');
            // echo('el id del oscio es :'.$id_socio);
            }else {
                $valido = 0;
            }
        }

        if($valido == 0){
            return False;
        }

    }

    public function buscarUltimoPago($id){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();

        $ultimoPago = $bdmysql->query("SELECT *
        FROM pago 
        JOIN socio
        ON pago.id_socio = socio.id_socio
        WHERE pago.id_socio = '$id'
        ORDER BY pago.fecha_pago DESC
        LIMIT 1
        ");   

        return $ultimoPago;
    }

    public function pagar($id_pago){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();

        $stmt = $bdmysql->conexion->prepare("UPDATE pago SET pagado = 1,
        fecha_confirmacion_pago = NOW() WHERE id_pago = ?");

        $stmt->bind_param("i", $id_pago);
        $stmt->execute();
        $stmt->close();
      
        return True;
    }

    public function comprobacionFechaUltimoPago(){
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();
        $leer = $bdmysql->query("SELECT * FROM pago ORDER BY fecha_pago DESC LIMIT 1");
        
            foreach ($leer as $valor){
                $ultimaOrden = $valor['fecha_pago'];
            };

            if (isset($ultimaOrden)){
                list($Y, $m, $d) = explode('-', $ultimaOrden);

                $mesActual = date('m');
                $anoActual = date('Y');

                $actualizado = ($anoActual.$mesActual)-($Y.$m);
                // echo($actualizado);
                if($actualizado > 0 ){               
                    return True;
                //esta desactualizado
                } else {               
                    return False;
            }
        }
        
    }

    public function adicionPagosMes(){

        $actualizado = $this->comprobacionFechaUltimoPago();
        echo($actualizado);
        // echo($actualizado);
        // var_dump($actualizado);
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();


        if (($actualizado)){
            
            $leer = $bdmysql->query("SELECT socio.id_socio
            FROM socio 
            LEFT JOIN pago
            ON pago.id_socio = socio.id_socio
            WHERE socio.activo = 1
            ");

            $arrayId_socios = [];

            foreach ($leer as $valor){
                $id = $valor['id_socio'];
                array_push($arrayId_socios, $id);
            };

            $arrayId_sociosLimpio = array_unique($arrayId_socios); 

            // var_dump($arrayId_socios);
            // var_dump($arrayId_sociosLimpio);

            $hoy = date("Y-m-d");
            
            foreach($arrayId_sociosLimpio as $id){
                $insertar = $bdmysql->query('
                INSERT INTO pago (id_socio, fecha_pago )  
                VALUES ('.$id.', "'.$hoy.'"  )
            ' );
            }
            
            return True;


        }else{
            return False;
        }
          }

    public function boton(){
        $actualizado = $this->comprobacionFechaUltimoPago();
        // echo($actualizado);
        // var_dump($actualizado);
        $bdmysql = new Bdmysqli('localhost' , 'root', '', 'mrtorgue');
        $bdmysql->abrirBD();

        $listaMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        $mesActual = date('m');
        $mes_letra = $listaMeses[$mesActual-1];
        
        if (($actualizado)){

            echo('<form action="" method="post">');
            echo('<button type= "submit" name="actualizar" class = " btn-actualizar"> Generar pagos '.$mes_letra.'  </button>');
            echo('</form>');

        }else {
            
            echo('<button class = " btn-actualizar" disabled="disabled"> Generar pagos '.$mes_letra.'</button>');
        }
    }
}