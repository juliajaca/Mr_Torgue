<?php
require_once 'models/Bdmysqli.php';
require_once 'models/Socio.php';
require_once 'controller/SocioController.php';
require_once 'models/SocioInsertable.php';
require_once('functions/funciones.php');

if (isset($_POST['modificar'])){
    $id = $_POST['modificar'];
    // echo($id);

// $socio = new Socio ('Nacho', 'Briones', '2010-02-02', 1, 77777777);
    
$controller = new SocioController();
$selectedSocio = $controller->buscarSocio($id);
// print_r($selectedSocio);
foreach ($selectedSocio as $valor){
    $nombre = ucfirst($valor['nombre']);
    $apellido = ucfirst($valor['apellido']);
    $apellido2 = ucfirst($valor['apellido2']);
    $fecha_nacimiento = $valor['fecha_nacimiento'];
    $id_tipo_documento = $valor['id_tipo_documento'];
    $numero_documento = strtoupper($valor['numero_documento']);    
}

//     //esto son los valores del socio que se crea
    $socio = new Socio ($nombre, $apellido, $apellido2, $fecha_nacimiento, $id_tipo_documento, $numero_documento);
    $socio->id_socio = $id;
}

else

{
    $id = $_POST['id'];
    $nombre = strtolower($_POST['nombre']);
    $apellido = strtolower($_POST['apellido']);
    $apellido2 = strtolower($_POST['apellido2']);
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $id_tipo_documento = $_POST['tipo_documento'];
    $numero_documento = strtolower($_POST['numero_documento']); 
    
    // echo($nombre);
    $socio = new Socio ($nombre, $apellido, $apellido2, $fecha_nacimiento, $id_tipo_documento, $numero_documento);
    $socio->id_socio = $id;
    // print_r($socio);

    //compruebo que sea insertable el objeto que hemos creado
    $socioInsertable = new SocioInsertable();
    // $socioInsertable->ver();
    $validacion = $socioInsertable->comprobacionConjunta($socio); #si es un 1 no es valido, 0 es valido
    // echo($validacion);
    if ($validacion == 0){

            // echo('valido para insertar');
            //lo insertamos en la BD
            $controller = new SocioController();
            $exito = $controller->modificarSocio($socio);
            // echo($exito);

            if (isset($exito)){
                // echo('<form name ="autosubmit" action="listado_socios.php" method = "post">');
                // // echo('Hola');
                // echo('<input type="hidden" class = "exito" id= "exito" value="exito" name= "exito">');
                // echo('</form>');
                
                // echo('<script type="text/javascript">document.autosubmit.submit();</script>');
    

    } else if ($validacion == 1) {
        // echo('<script>window.alert("Datos no válidos")</script>');
        
    };
}
}

encabezado();

?>

<!-- todo esto está medido en un contenedor con class contenido -->

<div id="registro" class= "container">
    <div class = "row formulario">
        <!-- COLUMNA UNA DEL FORMULARIO  -->
        <div class = "col-3 offset-2 d-flex align-items-start pt-5 mt-5">
            <form method = "POST" action ="" >

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input required pattern="[A-Za-z- ]{2,20}"  type="text" name= "nombre" class="form-control" id="nombre"  pattern="[A-Za-z]{2,20}"

                    <?php
                    if (isset($_POST['modificar'])){
                        echo('value="'.$socio->nombre.'"');
                    }
                    ?> 

                    >
                </div>

                <div class="form-group">
                <label for="apellido">Primer Apellido</label>
                <input type="text" name="apellido" class="form-control" id="apellido" required pattern="[A-Za-z- ]{2,20}" 
                <?php
                    if (isset($_POST['modificar'])){
                        echo('value="'.$socio->apellido.'"');
                    }
                    ?> 

                    >
            </div>
        
            <div class="form-group">
                <label for="apellido">Segundo Apellido</label>
                <input type="text" name="apellido2" class="form-control" id="apellido"  required pattern="[A-Za-z- ]{2,20}" 
                <?php
                    if (isset($_POST['modificar'])){
                        echo('value="'.$socio->apellido2.'"');
                    }
                    ?> 

                    >
            </div>
             
        </div>
            <!-- COLUMNA DOS DEL FORMULARIO -->
        <div class = "col-3 offset-2 d-flex flex-column justify-content-start pt-5 mt-5
        ">
            

            <div class="form-group">
                    <label for="numero_documento">Nº de Documento</label>
                    <input type="text"  name = "numero_documento" class="form-control" id="numero_documento" 
                    required pattern = "[A-Z0-9]+"
                    <?php
                    if (isset($_POST['modificar'])){
                        echo('value="'.$socio->numero_documento.'"');
                    }
                    ?> 

                    >
                </div>
            
            <div class="form-group">
                <label for="tipo_documento">Tipo de documento</label>

                <select class="custom-select" name = "tipo_documento" required>
                    <option value = ""

                    <?php 
                        if (isset($_POST['modificar'])){
                            if ($socio->id_tipo_documento == '') 
                            echo "selected='selected'";
                        }
                        ?>
                    >Elige un documento</option>

                    <option value="1" 
                        <?php 
                        if (isset($_POST['modificar'])){
                            if ($socio->id_tipo_documento == 1) 
                            echo "selected='selected'";
                        }
                        ?>
                        >DNI</option>

                    <option value="2"
                    <?php 
                        if (isset($_POST['modificar'])){
                            if ($socio->id_tipo_documento == 2)
                             echo "selected='selected'";
                        }
                        ?>
                    
                    >NIE</option>
                    <option value="3"
                    <?php 
                        if (isset($_POST['modificar'])){
                            if ($socio->id_tipo_documento == 3) 
                            echo "selected='selected'";
                        }
                        ?>
                    
                    
                    >Carnet de biblioteca</option>
                </select> 
            </div>   

            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <div class="input-group">
                    <input type="date" name ="fecha_nacimiento" required class="form-control" id = "fecha_nacimiento" 

                    <?php
                    if (isset($_POST['modificar'])){
                        echo('value="'.$socio->fecha_nacimiento.'"');
                    }
                    ?> 

                    >
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="far fa-calendar-alt fa-lg"></i>
                        </span>
                    </div>
                </div>

    
        </div>
        
    </div>
 
    <input type="hidden" id="id" name="id" value="
    <?php
        echo($id);
    ?>
    ">                   


    <div class = "row botones ">
        <!-- boton de volver -->
        <div class = "col-3 offset-1 d-flex align-items-center ">
            <a href="index.php" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">VOLVER</a>
        </div>
        
        <!-- boton de enviar con el modal-->
        <div class = "col-3 offset-5 d-flex align-items-center justify-content-center"> 
            <div class="form-group ">
 
                <button type="submit" class="btn boton-registrar btn-lg" >          
                  MODIFICAR
                </button> </form> 
            </div>
        </div>
        
    </div>
</div>



<!-- ----------------------------------------------------------- -->

<!-- todo esto está medido en un contenedor con class contenido -->

<?php

pie();


if (isset($_POST['modificar'])){

 }

else

{

    if (empty($validacion)){

         
            $controller = new SocioController();
            $exito = $controller->modificarSocio($socio);
           

            if (isset($exito)){
                echo('<div class="modal fade" id="modalPrueba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">');
                echo('<div class="modal-dialog" role="document">');
                    echo('<div class="modal-content">');
                        echo('<div class="modal-header">');
                            echo('<h5 class="modal-title" id="exampleModalLabel">SOCIO MODIFICADO</h5>');
                        echo(' </div>');
                        echo('<div class="modal-footer">');
                        echo('<a class="btn btn-primary" href="listado_socios.php">Volver</a>');
                        echo('</div>');
                    echo('</div>');
                echo('</div>');
            echo('</div>');
    
            echo('<script type="text/javascript"> $(window).on("load",function(){ $("#modalPrueba").modal("show"); }); </script>');
    

    } else  if (!empty($validacion)) {
        echo('<div class="modal fade" id="modalPrueba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">');
            echo('<div class="modal-dialog" role="document">');
                echo('<div class="modal-content">');
                    echo('<div class="modal-header">');
                        echo('<h5 class="modal-title" id="exampleModalLabel">Datos no validos</h5>');
                    echo(' </div>');
                    echo('<div class="modal-footer">');
                        echo('<a class="btn btn-primary" href="listado_socios.php">Volver</a>');
                    echo('</div>');
                echo('</div>');
            echo('</div>');
        echo('</div>');

        echo('<script type="text/javascript"> $(window).on("load",function(){ $("#modalPrueba").modal("show"); }); </script>');
        
    };

}
}

?>


