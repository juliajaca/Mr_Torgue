<?php
require_once 'models/Bdmysqli.php';
require_once('controller/PagoController.php');


if (isset($_POST['actualizar'])){
    $nuevoPago = new PagoController;
    $adicion = $nuevoPago->adicionPagosMes();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit = no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Mr Torgue</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.min.css">
</head>
<body>
    <div class = "index">
        <div class = "index_lateral">
            <?php
            for($i=0; $i<135; $i++){
                        echo('<div style="border:solid 1px" class = "index_cuadro '.$i.'"></div>');
                    }
            ?>
        </div>
        <div class = "index_contenido">
            <div class = "index_contenido_titulo">

                       <div class = "mr">
                            MR
                       </div>
                       <div class = "index_contenido_titulo_logo_contenedor">
                        <img src="_assets/img/logo.svg" alt="logo Torgue" class = "index_contenido_titulo_logo">
                       </div>

                       <div class = "muscle">
                            MUSCLE LICEUM
                       </div> 
            </div>
            <div class = "index_contenido_menu">
                
                <div class = "index_contenido_menu_contSocios">
                   
                    <div class = "index_contenido_menu_contSocios_titulo">
                        SOCIOS
                        <hr>
                    </div>
                    <div class = "index_contenido_menu_contSocios_botones">
                        <a href="registro.php" class="btn btn-secondary btn-lg btn-index" role="button" aria-pressed="true">REGISTRAR SOCIO</a>
                        <a href="listado_socios.php" class="btn btn-secondary btn-lg btn-index" role="button" aria-pressed="true">VER SOCIOS</a>
                    </div>
                </div>
                <div class = "index_contenido_menu_contPagos">
                    
                    <div class = "index_contenido_menu_contPagos_titulo">
                        PAGOS
                        <hr>
                    </div>
                    <div class = "index_contenido_menu_contPagos_botones">
                        <a href="historico_pagosNUEVANUEVA.php" class="btn btn-secondary btn-lg btn-index" role="button" aria-pressed="true">HISTÓRICO DE PAGOS</a>
                        <a href="busqueda_pagos.php" class="btn btn-secondary btn-lg btn-index" role="button" aria-pressed="true">BÚSQUEDA DE PAGOS</a>
                    </div>
                </div>

                <div class="index_contenido_menu_actualizar">
                
                    <?php
                        $nuevoPago = new PagoController;

                        $nuevoPago->boton();

                    ?>
                </div>
            </div>

        </div>

    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php

if (isset($_POST['actualizar'])){
    
   if (isset($adicion)){

    echo('<div class="modal fade" id="modalPrueba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">');
            echo('<div class="modal-dialog" role="document">');
                echo('<div class="modal-content">');
                    echo('<div class="modal-header">');
                        echo('<h5 class="modal-title" id="exampleModalLabel">PAGOS AÑADIDOS</h5>');
                    echo(' </div>');
                    echo('<div class="modal-footer">');
                        echo('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>');
                    echo('</div>');
                echo('</div>');
            echo('</div>');
        echo('</div>');

        echo('<script type="text/javascript"> $(window).on("load",function(){ $("#modalPrueba").modal("show"); }); </script>');
   }

}
?>
</body>
</html>