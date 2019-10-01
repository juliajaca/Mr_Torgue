<?php
require_once('functions/funciones.php');
require_once('controller/PagoController.php');


if (isset($_POST['tipo_documento']) AND isset($_POST['numero_documento'])){
    $id_tipo_documento = $_POST['tipo_documento'];
    $numero_documento = strtolower($_POST['numero_documento']);

    $pagoController = new PagoController();
    $seguridad = $pagoController->comprobarDocumentoSocio($id_tipo_documento, $numero_documento);
}

encabezado();
?>

<!-- todo esto está medido en un contenedor con class contenido -->
<div id="busqueda_pago" class= "container">
    <div class = "row formulario">
        <!-- COLUMNA UNA DEL FORMULARIO  -->
        <div class = "col-3 offset-4 d-flex align-items-start pt-5 mt-5 justify-content-center">
            <form action="" method="post">
                <div class="form-group">
                    <label for="tipo_documento">Tipo de documento</label>

                    <select class="custom-select" name="tipo_documento">
                        <option selected>Elige un documento</option>
                        <option value="1">DNI</option>
                        <option value="2">NIE</option>
                        <option value="3">Carnet de biblioteca</option>
                        <option value="4">Pasaporte</option>
                    </select> 
                </div>   
                <div class="form-group">
                    <label for="numero_documento">Nº de Documento</label>
                    <input type="text" class="form-control" id="numero_documento" name ="numero_documento">
                </div>
                
        </div>
        
    </div>

    <div class = "row botones ">
        <!-- boton de volver -->
        <div class = "col-3 offset-1 d-flex align-items-center ">
            <a href="index.php" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">VOLVER</a>
        </div>
        
        <!-- boton de enviar -->
        <div class = "col-3 offset-5 d-flex align-items-center justify-content-center"> 
            <div class="form-group ">
                <button type="submit"  class="btn boton-registrar btn-lg" 
                > BUSCAR PAGO</button> </form> 
            
            </div>
        </div>
        
    </div>
</div>

<!-- ----------------------------------------------------------- -->

<!-- todo esto está medido en un contenedor con class contenido -->
<?php
pie();


if (isset($_POST['tipo_documento']) AND isset($_POST['numero_documento'])){
    

    if($seguridad == False){
        echo('<div class="modal fade" id="modalPrueba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">');
        echo('<div class="modal-dialog" role="document">');
            echo('<div class="modal-content">');
                echo('<div class="modal-header">');
                    echo('<h5 class="modal-title" id="exampleModalLabel">DATOS INCORRECTOS</h5>');
                echo(' </div>');
                echo('<div class="modal-footer">');
                    echo('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>');
                echo('</div>');
            echo('</div>');
        echo('</div>');
    echo('</div>');

    // echo('<script type="text/javascript"> $(window).on("load",function(){ $("#modalPrueba").modal("show"); }); </script>');   

    }
}

?>