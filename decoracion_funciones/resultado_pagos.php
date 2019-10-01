<?php
require_once('functions/funciones.php');
require_once('controller/PagoController.php');

if (isset($_GET['id'])){
    $id = $_GET['id'];
    // echo($id);

    $pagoController = new PagoController;
    $ultimoPago = $pagoController->buscarUltimoPago($id);

    // print_r($ultimoPago);

    foreach($ultimoPago as $valor){
        $nombre = ucfirst($valor['nombre']);
        $apellido = ucfirst($valor['apellido']);
        $apellido2 = ucfirst($valor['apellido2']);
        $id_pago = $valor['id_pago'];
        $pagado = $valor['pagado'];

    }
}

encabezado();
?>

<!-- todo esto está medido en un contenedor con class contenido -->
<div id="listado_socios" class= "container">    
    <div class = "row tabla">
        <!-- TABLA -->
        <div class = "col-12 pt-5 tabla">
            <table >
                
                <tr class = "nombres_columnas resultado_pago">
                    <th class ="nombre_pago">Socio</th>
                    <th class = "n_pago">Nº Pago</th> 
                    <th class ="pagado_pago">Mes</th>
           
                </tr>
               
                <tr class = "subrayado resultado_pago">
                    <td class ="nombre_pago ">
                    <?php
                        echo($apellido. ' '.$apellido2.', '.$nombre);
                    ?>

                    </td>
                    <td class = "n_pago">

                    <?php
                        echo($id_pago);
                    ?>
                    </td>
                    <td class ="pagado_pago">
                    <?php
                        if($pagado == 1){
                      echo(' <i class="far fa-check-circle fa-sm"></i>');
                    }else{
                        echo(' <i class="far fa-times-circle fa-sm"></i>');
                    }
                    ?>  

                </td>
                </tr>
            </table>
        </div>
    </div>

    <div class = "row botones ">
        <!-- boton de volver -->
        <div class = "col-3 offset-1 d-flex align-items-center ">
            <a href="index.php" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">VOLVER</a>
        </div>
        
        <!-- boton de BUSCAR OTRO -->
        <div class = "col-3 offset-5 d-flex align-items-center justify-content-center"> 
            <div class="form-group ">
                <a href="busqueda_pagos.php" class="btn boton-registrar btn-lg" role="button" aria-pressed="true">BUSCAR OTRO PAGO</a>

            </div>
        </div>
        
    </div>

</div>
   
                


<!-- todo esto está medido en un contenedor con class contenido -->
<?php
pie();
?>