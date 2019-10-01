<?php
require_once 'models/Bdmysqli.php';
require_once 'models/Socio.php';
require_once 'controller/SocioController.php';
require_once 'models/SocioInsertable.php';
require_once('functions/funciones.php');

// $bdmysqli = new Bdmysqli ('localhost' , 'root', '', 'mrtorgue');

//comprobacion de la conex
// $bdmysqli->abrirBD();

$boton = 'REGISTRAR';
session_start();

if (isset($_SESSION['modificar']) ){
    
    //esto para traer la variable
    $id = $_SESSION['modificar'];

    
    echo $id;
    $boton = 'MODIFICAR';
    // echo $boton;
    // $socio = new Socio ('Nacho', 'Briones', '2010-02-02', 1, 77777777);
    
    $controller = new SocioController();
    $selectSocio = $controller->buscarSocio($id);

    foreach ($selectSocio as $valor){

        $nombre = $valor['nombre'];
        $apellido = $valor['apellido'];
        $fecha_nacimiento = $valor['fecha_nacimiento'];
        $id_tipo_documento = $valor['id_tipo_documento'];
        $numero_documento = $valor['numero_documento'];    
    }
    echo('Su nombre es'.$nombre);

    //esto son los valores del socio que se crea
    $socio = new Socio ($nombre, $apellido, $fecha_nacimiento, $id_tipo_documento, $numero_documento);
    $socio->id_socio = $id;

} 

// if (isset($_SESSION['socio']) ){
//     $socio = $_SESSION['socio'];
//     print_r($socio);
// }

if(isset($_POST['nombre'])){
    
    //creo el objeto Socio con los datos que me han dado
    $nombre = $_POST['nombre'];
    // echo($nombre);
    $apellido = $_POST['apellido'];
    // echo $apellido;
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $numero_documento = $_POST['numero_documento'];
    $id_tipo_documento = $_POST['tipo_documento'];

    $socio = new Socio ($nombre, $apellido, $fecha_nacimiento, $id_tipo_documento, $numero_documento );

    //compruebo que sea insertable el objeto que hemos creado
    $socioInsertable = new SocioInsertable();
    // $socioInsertable->ver();
    $validacion = $socioInsertable->comprobacionConjunta($socio); #si es un 1 no es valido, 0 es valido
    echo($validacion);
    if ($validacion == 0){
        echo('valido para insertar');
        //lo insertamos en la BD
        $controller = new SocioController();
        $exito = $controller->insertar($socio);
        echo($exito);

        if (isset($exito)){
          echo('<script>window.alert("Socio guardado")</script>');
        //    echo('SOCIO INSERTADO');
        }

    } else if ($validacion == 1) {
        echo('Datos no válidos');
    };

    
    
}   else{
         echo('fatal');
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
                    <input type="text" name= "nombre" class="form-control" id="nombre" 

                    <?php
                    if (isset($_SESSION['modificar'])){
                        echo('value="'.$socio->nombre.'"');
                    }
                    ?> 

                    >
                </div>

                <div class="form-group">
                    <label for="numero_documento">Nº de Documento</label>
                    <input type="text"  name = "numero_documento" class="form-control" id="numero_documento" 

                    <?php
                    if (isset($_SESSION['modificar'])){
                        echo('value="'.$socio->numero_documento.'"');
                    }
                    ?> 

                    >
                </div>

                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <div class="input-group">
                    <input type="date" name ="fecha_nacimiento" class="form-control" id = "fecha_nacimiento" 

                    <?php
                    if (isset($_SESSION['modificar'])){
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
            <!-- COLUMNA DOS DEL FORMULARIO -->
        <div class = "col-3 offset-2 d-flex flex-column justify-content-start pt-5 mt-5
        ">
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" id="apellido" 
                <?php
                    if (isset($_SESSION['modificar'])){
                        echo('value="'.$socio->apellido.'"');
                    }
                    ?> 

                    >
            </div>

            <div class="form-group">
                <label for="tipo_documento">Tipo de documento</label>

                <select class="custom-select" name = "tipo_documento">
                    <option value = ""

                    <?php 
                        if (isset($_SESSION['modificar'])){
                            if ($socio->id_tipo_documento == '') 
                            echo "selected='selected'";
                        }
                        ?>
                    >Elige un documento</option>

                    <option value="1" 
                        <?php 
                        if (isset($_SESSION['modificar'])){
                            if ($socio->id_tipo_documento == 1) 
                            echo "selected='selected'";
                        }
                        ?>
                        >DNI</option>

                    <option value="2"
                    <?php 
                        if (isset($_SESSION['modificar'])){
                            if ($socio->id_tipo_documento == 2)
                             echo "selected='selected'";
                        }
                        ?>
                    
                    >NIE</option>
                    <option value="3"
                    <?php 
                        if (isset($_SESSION['modificar'])){
                            if ($socio->id_tipo_documento == 3) 
                            echo "selected='selected'";
                        }
                        ?>
                    
                    
                    >Carnet de biblioteca</option>
                </select> 
            </div>   

    
        </div>
        
    </div>

    <input type="hidden" id="id_socio" name="id_socio" value="
    <?php 
                        if (isset($_SESSION['modificar'])){
                             echo $id;
                        }
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
                    <?php 
                    echo $boton;
                    ?>
                </button> </form> 
            </div>
        </div>
        
    </div>
</div>



<!-- ----------------------------------------------------------- -->

<!-- todo esto está medido en un contenedor con class contenido -->

<script> function popup(){alert("Insertado correctamente");} </script>



<?php
// session_destroy();
pie();
?>


