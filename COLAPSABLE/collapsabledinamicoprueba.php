<?php

require_once('SocioPago.php');
require_once('SocioPagoController.php');

?>

<!DOCTYPE html>
<html>

<head>
	<link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css" rel="stylesheet">
	<link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/7c319f7be2.js"></script>
</head>

<body>

	<!-- ######################################################## -->

	<h1>Table + collapse + buttonsaa</h1>
	<table>
		<thead>
			<tr>
				<th style="text-align: left;" width="20 %">socio</th>
				<th style="text-align: left;" width="20 %">N pago</th>
				<th style="text-align: left;" width="20 %">mes</th>
				<th style="text-align: left;" width="20 %">año</th>
				<th style="text-align: left;" width="10 %">pagado</th>
				<th style="text-align: left;" width="10 %">pagar</th>
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
        $nombre = $valor['nombre'];
        $apellido = $valor['apellido'];
        $id = $valor['id_socio'];
    }

    //CREO LOS SOCIOS UNO A UNO
    $socio = new SocioPago();
    $socio->setId($id);
    $socio->setNombre($nombre);
    $socio->setApellido($apellido);

    // VOY COMPLETANDO LOS CAMPOS DE ARRAYS DE OBJETOS
    $socioPagoController = new SocioPagoController;

    $arrayObjetosAños = $socioPagoController->getAñosFromSocio($socio);

    $pagoMesController = new PagoMesController;

    $pagoMesController->getMesFromSocioYAño($socio);

			echo('<tr class="subrayado">');
			echo('<td width="20 %" class="nombre ">'.$socio->nombre.' '.$socio->apellido.'</td>');
			echo('<td width="20 %" class="numero_documento"></td>');
			echo('<td width="20 %" class="tipo_documento"></td>');
			echo('<td width="20 %" class="fecha_nacimiento"></td>');
			echo('<td width="10 %" class="editar"></td>');
			echo('<td width="10 %" class="borrar"></td>');
			echo('</tr>');
	
    $myAños = $socio->getAños();	
    foreach($myAños as $año){

			echo('<tr class="accordion-toggle">');
				echo('<td data-toggle="collapse" data-target="#collapse'.$socio->id_socio.$año->año.'"></td>');
				echo('<td data-toggle="collapse" data-target="#collapse'.$socio->id_socio.$año->año.'"></td>');
				echo('<td data-toggle="collapse" data-target="#collapse'.$socio->id_socio.$año->año.'"></td>');
				echo('<td data-toggle="collapse" data-target="#collapse'.$socio->id_socio.$año->año.'">'.$año->año.'</td>');
				echo('<td data-toggle="collapse" data-target="#collapse'.$socio->id_socio.$año->año.'"></td>');
				echo('<td data-toggle="collapse" data-target="#collapse'.$socio->id_socio.$año->año.'"></td>');
			echo('</tr>');
            
            $myMeses = $año->getMesPago();
		
			echo('<tr>');
				echo('<td colspan="12">');
					echo('<div id="collapse'.$socio->id_socio.$año->año.'" class="collapse in" style="background-color:red ">');
						echo('<table style="color:black " width="100%">');

					foreach($myMeses as $mes){
							echo('<tr>');
								echo('<td width="20 %" class="nombre"></td>');
								echo('<td width="20%" class="numero_documento">'.$mes->n_pago.'</td>');
								echo('<td width="20%" class="tipo_documento">'.$mes->mes.'</td>');
                                echo('<td width="20%" style="background-color:green " class="fecha_nacimiento"></td>');
                                
                                if($mes->pagado == 0){
                                    echo('<td class = "editar"><i class="far fa-times-circle fa-lg"></i></td>');
                                    echo('<form action="" method="POST">');
                                        echo('<td class = "pagar">');
                                            echo('<button name="pagar" type="submit" value="'.$mes->n_pago.'">');
                                                echo('<i class="fas fa-euro-sign fa-lg"></i>');
                                            echo('</button>');
                                        echo('</td>');
                                    echo('</form>');
                                } else {
                                    echo('<td class = "editar"><i class="far fa-check-circle fa-lg"></i></td>');

                                    echo('<form action="" method="POST">');
                                        echo('<td class = "pagar">');

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

	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="http://getbootstrap.com/2.3.2/assets/js/jquery.js"></script>
	<script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap.js"></script>

	<script src="http://getbootstrap.com/2.3.2/assets/js/holder/holder.js"></script>
	<script src="http://getbootstrap.com/2.3.2/assets/js/google-code-prettify/prettify.js"></script>

	<script src="http://getbootstrap.com/2.3.2/assets/js/application.js"></script>
</body>

</html>