<?php
require_once('SocioPago.php');
require_once('SocioPagoController.php');

//socio dummy
$socio = new SocioPago();
$socio->id_socio = 1;
$socio->nombre = 'Pepon';
$socio->apellido = 'Félix';

// echo('<pre>');
// print_r($socio);
// echo('</pre>');

// echo('<pre>');
// echo($socio->toString($socio));
// echo('</pre>');

//objeto de controlador de sociopago
$socioPagoController = new SocioPagoController;

$arrayObjetosAños = $socioPagoController->getAñosFromSocio($socio);


// $socioPagoController->insertarArrayObjetosAños($arrayObjetosAños, $socio);

///////////////////////////////////////////////////////
echo ('objeto controlador de pagomescontroller');
$pagoMesController = new PagoMesController;

$pagoMesController->getMesFromSocioYAño($socio);
echo('<pre>');
print_r($socio);
echo('</pre>');

// echo($socio->getId());
echo('<br>');
echo($socio->toString());
echo('<br>');
if ($socio->getAños() != NULL){

    $myAños = $socio->getAños();

    foreach($myAños as $año){
        echo('<br>');
        echo($año->toString());
        echo('<br>');

        //saco el array de objetos de meses por cada año
        $myMeses = $año->getMesPago();

                foreach($myMeses as $mes){

                    echo('<br>');
                    echo($mes->toString()); 
                    echo('<br>');                
                }

    }
}

////////////////////////////////////////////////////////////////
//AHORA LO HAGO CON TODOS LOS SOCIOS
//saco todas las ids
/////////////////////////////////////////////////////////////////
$arrayIds = $socioPagoController->sacarIds();
// print_r($arrayIds);

foreach($arrayIds as $id){
    //para cada id saco la info de la base de datos
    echo('<pre>');
    print_r($id);
    $id_socio = $id['id_socio'];
    echo($id_socio);

    $arrayInfoSocio = $socioPagoController->SacarInfoSocio($id_socio);
    print_r($arrayInfoSocio);
    // echo('</pre>');

    foreach ($arrayInfoSocio as $valor){
        $nombre = $valor['nombre'];
        $apellido = $valor['apellido'];
        $id = $valor['id_socio'];
    }
    
    //CREO LOS SOCIOS UNO A UNO
    $socio = new SocioPago();
    $socio->setId($id);
    $socio->setNombre($nombre);
    $socio->setApellido($apellido);

    print_r($socio);
    // VOY COMPLETANDO LOS CAMPOS DE ARRAYS DE OBJETOS
    $socioPagoController = new SocioPagoController;

    $arrayObjetosAños = $socioPagoController->getAñosFromSocio($socio);

    $pagoMesController = new PagoMesController;

    $pagoMesController->getMesFromSocioYAño($socio);
    echo('<pre>');
    print_r($socio);
    echo('</pre>');

    // //AHORA HAGO EL TOSTRING
    // // echo($socio->getId());
    echo('<br>');
    echo($socio->toString());
    echo('<br>');
    if ($socio->getAños() != NULL){

        $myAños = $socio->getAños();

        foreach($myAños as $año){
            echo('<br>');
            echo($año->toString());
            echo('<br>');

            //saco el array de objetos de meses por cada año
            $myMeses = $año->getMesPago();

                    foreach($myMeses as $mes){

                        echo('<br>');
                        echo($mes->toString()); 
                        echo('<br>');                
                    }

        }
    }
}