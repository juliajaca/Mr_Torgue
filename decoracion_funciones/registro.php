<?php
require_once 'models/Bdmysqli.php';
require_once 'models/Socio.php';
require_once 'controller/SocioController.php';
require_once 'models/SocioInsertable.php';
require_once('functions/funciones.php');


if(isset($_POST['nombre'])){
    
    //creo el objeto Socio con los datos que me han dado
    $nombre = strtolower($_POST['nombre']);
    // echo($nombre);
    $apellido = strtolower($_POST['apellido']);
    $apellido2 = strtolower($_POST['apellido2']);
    // echo $apellido;
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $numero_documento = strtolower($_POST['numero_documento']);
    $id_tipo_documento = $_POST['tipo_documento'];

    $socio = new Socio ($nombre, $apellido,$apellido2, $fecha_nacimiento, $id_tipo_documento, $numero_documento );
    // print_r($socio);
    //compruebo que sea insertable el objeto que hemos creado
    $socioInsertable = new SocioInsertable();
    // $socioInsertable->ver();
    $validacion = $socioInsertable->comprobacionConjunta($socio); #si es un 1 no es valido, 0 es valido   
}

encabezado();

?>

<!-- todo esto está medido en un contenedor con class contenido -->

<div id="registro" class="container">
    <div class="row formulario">
        <!-- COLUMNA UNA DEL FORMULARIO  -->
        <div class="col-3 offset-2 d-flex align-items-start pt-5 mt-5">
            <form method="POST" action="">

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input required pattern="[A-Za-z- ]{2,20}"  type="text" name="nombre" class="form-control" id="nombre">
                </div>

                <div class="form-group">
                    <label for="apellido">Primer Apellido</label>
                    <input required pattern="[A-Za-z- ]{2,20}" type="text" name="apellido" class="form-control" id="apellido">
                </div>

                <div class="form-group">
                    <label for="apellido">Segundo Apellido</label>
                    <input required pattern="[A-Za-z- ]{2,20}" type="text" name="apellido2" class="form-control" id="apellido">
                </div>
           

        </div>
        <!-- COLUMNA DOS DEL FORMULARIO -->
        <div class="col-3 offset-2 d-flex flex-column justify-content-start pt-5 mt-5
        ">

        <div class="form-group">
                    <label for="numero_documento">Nº de Documento</label>
                    <input required pattern = "[A-Za-z0-9]+" type="text" name="numero_documento" class="form-control" id="numero_documento">
                </div>

        <div class="form-group">
                <label for="tipo_documento">Tipo de documento</label>
                <select class="custom-select" name="tipo_documento" required>
                    <option value="">Elige un documento</option>
                    <option value="1">DNI</option>
                    <option value="2">NIE</option>
                    <option value="3">Carnet de biblioteca</option>
                    <option value="4">Pasaporte</option>
                </select>
        </div>
            

                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <div class="input-group">
                    <input required type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="far fa-calendar-alt fa-lg"></i>
                        </span>
                    </div>
                </div>

        </div>

    </div>


    <div class="row botones ">
        <!-- boton de volver -->
        <div class="col-3 offset-1 d-flex align-items-center ">
            <a href="index.php" class="btn btn-secondary btn-lg" tabindex="-1" role="button"
                aria-disabled="true">VOLVER</a>
        </div>

        <!-- boton de enviar con el modal-->
        <div class="col-3 offset-5 d-flex align-items-center justify-content-center">
            <div class="form-group ">

                <button type="submit" class="btn boton-registrar btn-lg">
                    REGISTRAR
                </button> </form>
            </div>
        </div>

    </div>
</div>

<!-- ----------------------------------------------------------- -->

<!-- todo esto está medido en un contenedor con class contenido -->

<?php

pie();

if(isset($_POST['nombre'])){
    
    if (empty($validacion)){
        // echo('valido para insertar');
        //lo insertamos en la BD
        $controller = new SocioController();
        $exito = $controller->insertar($socio);
        // echo($exito);

        if (isset($exito)){

            echo('<div class="modal fade" id="modalPrueba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">');
                echo('<div class="modal-dialog" role="document">');
                    echo('<div class="modal-content">');
                        echo('<div class="modal-header">');
                            echo('<h5 class="modal-title" id="exampleModalLabel">SOCIO INSERTADO</h5>');
                        echo(' </div>');
                        echo('<div class="modal-footer">');
                            echo('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>');
                        echo('</div>');
                    echo('</div>');
                echo('</div>');
            echo('</div>');

            echo('<script type="text/javascript"> $(window).on("load",function(){ $("#modalPrueba").modal("show"); }); </script>');
        }

        $id = $controller->idUltimoRegistro();
        echo($id);
        $controller->insertarPagoUltimoSocio($id);

    } else if (!empty($validacion)) {
            echo('<div class="modal fade" id="modalPrueba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">');
                echo('<div class="modal-dialog" role="document">');
                    echo('<div class="modal-content">');
                        echo('<div class="modal-header">');
                            echo('<h5 class="modal-title" id="exampleModalLabel">DATOS NO VÁLIDOS. PRUEBE OTRA VEZ</h5>');
                        echo(' </div>');
                        echo('<div class="modal-body">');
                        echo('<p>');
                        foreach($validacion as $valor){
                            print($valor);
                            echo('<br>');
                        }
                        echo('</p>');
                      echo('</div>');
                        echo('<div class="modal-footer">');
                            echo('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>');
                        echo('</div>');
                    echo('</div>');
                echo('</div>');
            echo('</div>');

            echo('<script type="text/javascript"> $(window).on("load",function(){ $("#modalPrueba").modal("show"); }); </script>');
    };
}
?>