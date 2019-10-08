<?php
require_once('functions/funciones.php');
require_once('controller/SocioController.php');


if (isset($_POST['borrar'])) {
    $id = $_POST['borrar'];
    // echo($id);
    $controller = new SocioController();
    $borrar = $controller->borrarSocio($id);
};

///////////////////PAGINADOR
require_once 'models/Paginator.php';
 
    $conn       = new mysqli( 'localhost', 'root', '', 'mrtorgue' );
 
    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 15;
 
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
    $query      = "SELECT id_socio, nombre, apellido, apellido2, id_tipo_documento, numero_documento, fecha_nacimiento FROM socio WHERE activo = 1 ORDER BY apellido ASC, apellido2 ASC, nombre ASC";
 
    $Paginator  = new Paginator( $conn, $query );
 
    $results    = $Paginator->getData( $limit, $page );


encabezado();
?>
<!-- prueba tabla -->

<div id="listado_socios" class="container">
    <div class = "row table">
                <div class="col-12 pt-5 tabla">

                <table class="table table-striped table-condensed table-bordered table-rounded">
                        <thead class = "nombres_columnas">
                                <tr>
                                <th class = "nombre">Socio</th>
                                <th class = "numero_documento">Nº Documento</th>
                                <th class = "tipo_documento">Tipo Documento</th>
                                <th class = "fecha_nacimiento">Fecha Nacimiento</th>
                                <th class = "editar">Editar</th>
                                <th class = "borrar">Borrar</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
        <tr>
                <td class = "nombre"><?php echo ucfirst($results->data[$i]['apellido']).' '. ucfirst($results->data[$i]['apellido2']).', '. ucfirst($results->data[$i]['nombre']); ?></td>
                <td class = "numero_documento"><?php echo strtoupper($results->data[$i]['numero_documento']); ?></td>
                
                <td class = "tipo_documento"> <?php
                        switch ($results->data[$i]['id_tipo_documento']){
                            case 1: 
                                echo('DNI');
                                break;
                            case 2:
                                echo('NIE');
                                break;
                            case 3:
                                echo('Carnet biblioteca');
                                break;
                            case 4:
                                echo('Pasaporte');
                                break;
                        }  ?>    
                </td>
               
                <td class = "fecha_nacimiento"><?php echo $results->data[$i]['fecha_nacimiento']; ?></td>

                <td class = "editar">
                    <form action="modificar.php" method="POST">
                        <button name="modificar" type="submit" value="<?php
                        echo $results->data[$i]['id_socio']
                        ?>">
                            <i class="fas fa-edit"></i>
                        </button>
                    </form> 
                </td>
                
                <td class = "borrar">           
                    <form action="" method="POST">
                    
                    <button name="borrar" type="submit" value="<?php
                        echo $results->data[$i]['id_socio']
                        ?>">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    
                    </form>
                </td>

        </tr>
<?php endfor; ?>
                        </tbody>
                </table>
                <?php echo $Paginator->createLinks( $links, ' pagination pagination-sm ' ); ?> 
                </div>
        </div>
    </div>

<!-- todo esto está medido en un contenedor con class contenido -->
  
    <div class = "row botones ">
        <!-- boton de volver -->
        <div class = "col-3 offset-1 d-flex align-items-center ">
            <a href="index.php" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">VOLVER</a>
        </div>
        
    </div>

<!-- todo esto está medido en un contenedor con class contenido -->
<?php

pie();

// SI VENGO DE BORRAR UN SOCIO SE EJECUTA ESTP
if (isset($borrar)){
    echo('<div class="modal fade" id="modalPrueba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">');
            echo('<div class="modal-dialog" role="document">');
                echo('<div class="modal-content">');
                    echo('<div class="modal-header">');
                        echo('<h5 class="modal-title" id="exampleModalLabel">SOCIO BORRADO</h5>');
                    echo(' </div>');
                    echo('<div class="modal-footer">');
                        echo('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>');
                    echo('</div>');
                echo('</div>');
            echo('</div>');
        echo('</div>');

        echo('<script type="text/javascript"> $(window).on("load",function(){ $("#modalPrueba").modal("show"); }); </script>');
        }
?>