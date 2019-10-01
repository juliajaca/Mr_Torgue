<?php

require_once('models/SocioPago.php');
require_once('controller/SocioPagoController.php');
require_once('functions/funciones.php');
require_once('controller/PagoController.php');
?>

<!DOCTYPE html>
<html>

<head>
	<link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css" rel="stylesheet">
    <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="css/paginacolapsable.css">

</head>

<body>

<?php
echo('<div class= "pagina">');

        echo('<div class="encabezado">');
            echo('<div class="d1">');
                echo('<img src="_assets/img/group.svg" alt="logo Torgue" class = "logo">');
            echo('</div>');
            echo('<div class="d2">');
                
                for($i=1; $i<408; $i++){
                    echo('<div class = "cuadro cuadro'.$i.'"></div>');
                }
                  
            echo('</div>');
            echo('<div class="d3"></div>');
            echo('<div class="d4"></div>');
        echo('</div>');

        echo('<div class = "no_encabezado">');
            echo('<div class="lateral-izd">'); 
                 
                for($i=0; $i<120; $i++){
                    echo('<div style="border:solid 1px" class = "cuadro lateral'.$i.'"></div>');
                }
                 
            echo('</div>');
            echo('<div class="contenido">');
?>
    <!-- ######################################################## -->
<div class = "container" id= "listado_socios">
<div class = "row table">
<div class = "col-12  table">
	<table class = "tabla_grande">
		<thead>
			<tr class = "tabla_grande_row">
				<th style="text-align: left;" width="20%">Socio</th>
				<th style="text-align: left;" width="20%">Nº pago</th>
				<th style="text-align: left;" width="20%">Mes</th>
				<th style="text-align: left;" width="20%">Año</th>
				<th style="text-align: left;" width="10%">Pagado</th>
				<th style="text-align: left;" width="10%">Pagar</th>
			</tr>
		</thead>
		<tbody>
    <?php

$socioPagoController = new SocioPagoController;
$arrayIds = $socioPagoController->sacarIds();
foreach($arrayIds as $id){

    $id_socio = $id['id_socio'];
    $arrayInfoSocio = $socioPagoController->SacarInfoSocio($id_socio);

    foreach ($arrayInfoSocio as $valor){
        $nombre = ucfirst($valor['nombre']);
        $apellido = ucfirst($valor['apellido']);
        $apellido2 = ucfirst($valor['apellido2']);
        $id = $valor['id_socio'];
    }

    //CREO LOS SOCIOS UNO A UNO
    $socio = new SocioPago();
    $socio->setId($id);
    $socio->setNombre($nombre);
    $socio->setApellido($apellido);
    $socio->setApellido2($apellido2);

    // VOY COMPLETANDO LOS CAMPOS DE ARRAYS DE OBJETOS
    $socioPagoController = new SocioPagoController;

    $arrayObjetosAños = $socioPagoController->getAñosFromSocio($socio);

    $pagoMesController = new PagoMesController;

    $pagoMesController->getMesFromSocioYAño($socio);

			echo('<tr  class = "tabla_grande_row socio" >');
			echo('<td width="20 %" class="nombre ">'.$socio->apellido.' '.$socio->apellido2.', '.$socio->nombre.'</td>');
			echo('<td width="20 %" class="numero_documento"></td>');
			echo('<td width="20 %" class="tipo_documento"></td>');
			echo('<td width="20 %" class="fecha_nacimiento"></td>');
			echo('<td width="10 %" class="editar"></td>');
			echo('<td width="10 %" class="borrar"></td>');
			echo('</tr>');
	
    $myAños = $socio->getAños();	
    foreach($myAños as $año){
        // echo('<pre>');
        // print_r($año);
        // echo('</pre>');
			echo('<tr class="accordion-toggle tabla_grande_row año" >');
				echo('<td width="20 %" data-toggle="collapse" data-target="#collapse'.$socio->id_socio.$año->año.'"></td>');
				echo('<td width="20 %" data-toggle="collapse" data-target="#collapse'.$socio->id_socio.$año->año.'"></td>');
				echo('<td width="20 %" data-toggle="collapse" data-target="#collapse'.$socio->id_socio.$año->año.'"></td>');
                echo('<td ');

                if($año->pagado == 1){
                    echo('class = "pagado"');
                } else {
                    echo ('class = "impagado"');
                }

                echo('width="20 %" data-toggle="collapse" data-target="#collapse'.$socio->id_socio.$año->año.'">'.$año->año.'</td>');
				echo('<td width="10 %" data-toggle="collapse" data-target="#collapse'.$socio->id_socio.$año->año.'"></td>');
				echo('<td  width="10 %" data-toggle="collapse" data-target="#collapse'.$socio->id_socio.$año->año.'"></td>');
			echo('</tr>');
            
            $myMeses = $año->getMesPago();
		
			echo('<tr class="tabla_grande_row">');
				echo('<td width="100 %"colspan="12">');
					echo('<div id="collapse'.$socio->id_socio.$año->año.'" class="collapse">');
						echo('<table style="color:black; " width="100%">');

					foreach($myMeses as $mes){
                        $mes_numero = $mes->mes;
                        $listaMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
		                $mes_letras = $listaMeses[$mes_numero-1];
							echo('<tr class ="mes">');
								echo('<td width="20 %" class="nombre"></td>');
								echo('<td width="20%" class="numero_documento">'.$mes->n_pago.'</td>');
                                echo('<td ');   
                                
                                if($mes->pagado == 1){
                                    echo('class = "pagado"');
                                } else {
                                    echo ('class = "impagado"');
                                }
                                
                                echo('width="20%" class="tipo_documento">'.$mes_letras.'</td>');
                                echo('<td width="20%" class="fecha_nacimiento"></td>');
                                
                                if($mes->pagado == 0){
                                    echo('<td width="10%" class = "editar"><i class="far fa-times-circle fa-lg"></i></td>');
                                    echo('<form action="" method="POST">');
                                        echo('<td  width="10%" class = "pagar">');
                                            echo('<button name="pagar" type="submit" value="'.$mes->n_pago.'">');
                                                echo('<i class="fas fa-euro-sign fa-lg"></i>');
                                            echo('</button>');
                                        echo('</td>');
                                    echo('</form>');
                                } else {
                                    echo('<td width="10%" class = "editar"><i class="far fa-check-circle fa-lg"></i></td>');
                                    echo('<form action="" method="POST">');
                                        echo('<td width="10%" class = "pagar">');
                                        echo(' ');
                                        echo('</td>');
                                    echo('</form>');   
                                }				
							echo('</tr>');
                    }	
						// ************
							echo('</table>');
							echo('</div>');
							echo('</td>');
							echo('</tr>');					
    }
}

?>
	</tbody>
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
  <!-- cierrre del div de listado socios  -->
</div>   
    <?php

    echo('</div>');
    echo('<div class="lateral-dcho">');
         
        for($i=0; $i<120; $i++){
            echo('<div style="border:solid 1px" class = "cuadro lateral'.$i.'"></div>');
        }
        
    echo('</div>');
echo('</div>');

echo('<div class="base">');
     
        for($i=0; $i<261; $i++){
            echo('<div style="border:solid 1px" class = "cuadro lateral'.$i.'"></div>');
        }
    
echo('</div>');

echo('</div>');
?>
	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="http://getbootstrap.com/2.3.2/assets/js/jquery.js"></script>
	<script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap.js"></script> 

	<script src="http://getbootstrap.com/2.3.2/assets/js/holder/holder.js"></script>
	<script src="http://getbootstrap.com/2.3.2/assets/js/google-code-prettify/prettify.js"></script>

    <script src="http://getbootstrap.com/2.3.2/assets/js/application.js"></script>
    <script src="https://kit.fontawesome.com/7c319f7be2.js"></script>
    <?php

if (isset($_POST['pagar'])) {
    $id_pago = $_POST['pagar'];
    // echo($id_pago);
    $pago = new PagoController();
    $pagar = $pago->pagar($id_pago);

    if (isset($pagar)){
     
        echo('<div class="modal fade" id="modalPrueba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">');
            echo('<div class="modal-dialog" role="document">');
                echo('<div class="modal-content">');
                    echo('<div class="modal-header">');
                        echo('<h5 class="modal-title" id="exampleModalLabel">PAGO REALIZADO</h5>');
                    echo(' </div>');
                    echo('<div class="modal-footer">');
                    echo('<a class="btn btn-primary" href="historico_pagosNUEVANUEVA.php">Cerrar</a>');
                    echo('</div>');
                echo('</div>');
            echo('</div>');
        echo('</div>');

        echo('<script type="text/javascript"> $(window).on("load",function(){ $("#modalPrueba").modal("show"); }); </script>');
    }
};
?>
</body>

</html>

