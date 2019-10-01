<?php
require_once('functions/funciones.php');
require_once('controller/SocioController.php');


if (isset($_POST['borrar'])) {
    $id = $_POST['borrar'];
    $controller = new SocioController();
    $borrar = $controller->borrarSocio($id);

    if (isset($borrar)){
        echo('<form name ="autosubmit" action="listado_socios.php" method = "post">');
        //echo('Hola');
        echo('<input type="hidden" class = "borrado" id= "borrado" value="borrado" name= "borrado">');
        echo('</form>');
        
        echo('<script type="text/javascript">document.autosubmit.submit();</script>');


    }
    
    // header('Location: listado_socios.php');
};




// SI VENGO DE MODIFICAR UN SOCIO SE EJECUTA ESTP
if (isset($_POST['exito'])){
    echo('<script>window.alert("Socio cambiado")</script>');
        }

$controller = new SocioController();
$leer = $controller->consultarSocios();
// var_dump($leer);


encabezado();
?>

<!-- todo esto está medido en un contenedor con class contenido -->
<div id="listado_socios" class= "container">    
    <div class = "row tabla">
        <!-- TABLA -->
        
       
        <div class = "col-12 pt-5 tabla">
            
            <table >
                
                <tr class = "nombres_columnas">
                    <th class ="nombre">Socio</th>
                    <th class = "numero_documento">Nº documento</th> 
                    <th class ="tipo_documento">Tipo documento</th>
                    <th class ="fecha_nacimiento">Fecha Nacimiento</th>
                    <th class = "editar">Editar</th> 
                    <th class = "borrar">Borrar</th>
                </tr>
               <!-- ################################ -->

               <?php
                foreach ($leer as $valor){
    
                    $nombre = $valor['nombre'];
                    $apellido = $valor['apellido'];
                    $apellido2 = $valor['apellido2'];
                    $fecha_nacimiento= $valor['fecha_nacimiento'];
                    $id_tipo_documento = $valor['id_tipo_documento'];
                    $numero_documento = $valor['numero_documento'];
                    $id = $valor['id_socio'];
                               
                    $socio = new Socio ($nombre, $apellido, $apellido2, $fecha_nacimiento, $id_tipo_documento, $numero_documento);
                    $socio->id_socio = $id;
                    // var_dump($socio);
               
                    echo('<tr>');
                    echo('<td class ="nombre">'.$socio->apellido.'   '.$socio->apellido2.',  '.$socio->nombre.'</td>');
                    echo('<td class = "numero_documento">'.$socio->numero_documento.'</td>');
                    echo('<td class ="tipo_documento">');
                        switch ($socio->id_tipo_documento){
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
                        }
                       
                    echo('</td>');
                    echo('<td class ="fecha_nacimiento">'.$socio->fecha_nacimiento.'</td>');

                    echo('<form action="modificar.php" method="POST">');
                    echo('<td class = "editar">');
                    echo('<button name="modificar" type="submit" value="'.$socio->id_socio.'">');
                    echo('<i class="fas fa-edit"></i>');
                    echo('</button>');
                    echo('</td>');
                    echo('</form>');

                    echo('<form action="" method="POST">');
                    echo('<td class = "borrar">');
                    echo('<button name="borrar" type="submit" value="'.$socio->id_socio.'">');
                    echo('<i class="fas fa-trash-alt"></i>');
                    echo('</button>');
                    echo('</td>');
                    echo('</form>');
                 
                    echo('</tr>');
                }
                ?>
        <!-- ##################################################### -->


                <!-- <tr>
                    <td class ="nombre"></td>
                    <td class = "numero_documento"></td>
                    <td class ="tipo_documento"></td>
                    <td class ="fecha_nacimiento"></td>
                    <td class = "editar"></td>
                    <td class = "borrar"> -->
                        <!-- <nav aria-label="Page navigation example">
                            <ul class="pagination"> -->
                                <!-- <li class="page-item"> -->
                                <!-- <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                                </li> -->
                                <!-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                                </li>
                            </ul>
                        </nav> -->
                    <!-- </td>
                </tr> -->
         
            </table>
            </form>
        </div>
        
    </div>

    <div class = "row botones ">
        <!-- boton de volver -->
        <div class = "col-3 offset-1 d-flex align-items-center ">
            <a href="index.php" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">VOLVER</a>
        </div>
        
    </div>

</div>

                


<!-- todo esto está medido en un contenedor con class contenido -->
<?php
pie();


// SI VENGO DE BORRAR UN SOCIO SE EJECUTA ESTP
if (isset($_POST['borrado'])){
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