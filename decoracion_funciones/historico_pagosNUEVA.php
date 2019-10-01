<?php
require_once('functions/funciones.php');
require_once('controller/PagoController.php');
encabezado();


// TENGO QUE PONER EL COLLAPSABLE AQUI
$listado = new PagoController;

$pagos = $listado->sacarPagos();

//PARA GESTIONAR UN PAGO
if (isset($_POST['pagar'])) {
    $id_pago = $_POST['pagar'];

    echo($id_pago);
    $pago = new PagoController();
    $pagar = $pago->pagar($id_pago);

    if (isset($pagar)){
        echo('<form name ="autosubmit" action="" method = "post">');
        echo('Hola');
        echo('<input type="hidden" class = "pagado" id= "pagado" value="pagado" name= "pagado">');
        echo('</form>');
        
        echo('<script type="text/javascript">document.autosubmit.submit();</script>');
    }
};


// SI VENGO DE pagar una mensualidad SE EJECUTA ESTo
if (isset($_POST['pagado'])){
    echo('<script>window.alert("Pago realizado")</script>');
        }

?>

<!-- todo esto está medido en un contenedor con class contenido -->
<div id="listado_socios" class= "container">    
    <div class = "row tabla">
        <!-- TABLA -->
        <div class = "col-12 pt-5 tabla">
            <table >
                
                <tr class = "nombres_columnas">
                    <th class ="nombre">Socio</th>
                    <th class = "numero_documento">Nº pago</th> 
                    <th class ="tipo_documento">Mes</th>
                    <th class ="fecha_nacimiento">Año</th>
                    <th class = "editar">Pagado</th> 
                    <th class = "borrar">Pagar</th>
                </tr>

                <?php
                    $listado->mostrarPagos($pagos);
                ?>

                <!-- PAGINACION -->
                <tr>
                    <td class ="nombre"></td>
                    <td class = "numero_documento"></td>
                    <td class ="tipo_documento"></td>
                    <td class ="fecha_nacimiento"></td>
                    <td class = "editar"></td>
                    <td class = "borrar">
                        <!-- <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                                </li>
                            </ul>
                        </nav> -->
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
        
        <!-- boton de enviar -->
        <div class = "col-3 offset-5 d-flex align-items-center justify-content-center"> 

        </div>
        
    </div>

</div>
   
                


<!-- todo esto está medido en un contenedor con class contenido -->
<?php

pie();
?>