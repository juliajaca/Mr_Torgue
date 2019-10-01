<?php

require_once('models/PagoController.php');

$listado = new PagoController;

$objetoMysqli = $listado->sacarPagos();
// $objetoMysqli = $listado->sacarIds();
// $o = $listado->sacarAnoPagoDeId(2);

echo '<pre>';
print_r($listado->objetoAArray($objetoMysqli));
echo '</pre>';

// print_r($listado->objetoAArray($o));
// print_r($o);

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

	$id_anterior = 0;
	$ano_anterior = 2017;

	$array= [];

	foreach ($objetoMysqli as $valor){
            
		$nombre = $valor['nombre'];
		$apellido = $valor['apellido'];
		$id = $valor['id_socio'];
		$id_pago = $valor['id_pago'];
		$fecha_pago = $valor['fecha_pago'];
		$pagado = $valor['pagado'];
		$fecha_det= explode('-', $fecha_pago);
		$ano = $fecha_det[0]; // imprimiría el año 
		$mes = $fecha_det[1];//imprime el mes
		
		$listaMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
		$mes_letra = $listaMeses[$mes-1];
		
		
		array_push($array, $id );
		

		
			echo('<tr class="subrayado">');
			echo('<td width="20 %" class="nombre ">'.$nombre.' '.$apellido.'</td>');
			echo('<td width="20 %" class="numero_documento">---</td>');
			echo('<td width="20 %" class="tipo_documento">--</td>');
			echo('<td width="20 %" class="fecha_nacimiento">--</td>');
			echo('<td width="10 %" class="editar">--</td>');
			echo('<td width="10 %" class="borrar">--</td>');
			echo('</tr>');
	
	
		// ECHO($mes_letra);
		// echo('id actual'.$id);
		// echo('<br>');
		// echo('id anterior'.$id_anterior);
		// echo('<br>');
		
		
			echo('<tr class="accordion-toggle">');
				echo('<td data-toggle="collapse" data-target="#collapse'.$id_pago.'"></td>');
				echo('<td data-toggle="collapse" data-target="#collapse'.$id_pago.'"></td>');
				echo('<td data-toggle="collapse" data-target="#collapse'.$id_pago.'"></td>');
				echo('<td data-toggle="collapse" data-target="#collapse'.$id_pago.'">'.$ano.'</td>');
				echo('<td data-toggle="collapse" data-target="#collapse'.$id_pago.'"></td>');
				echo('<td data-toggle="collapse" data-target="#collapse'.$id_pago.'"></td>');
			echo('</tr>');
			
		
			echo('<tr>');
				// echo('<!-- EL COLLAPsABLE -->
				echo('<td colspan="12">');
					echo('<div id="collapse'.$id_pago.'" class="collapse in" style="background-color:red ">');
						echo('<table style="color:black " width="100%">');

						// if ($ano == $ano_anterior){
						// *****
							echo('<tr>');
								echo('<td width="20 %" class="nombre"></td>');
								echo('<td width="20%" class="numero_documento">'.$id_pago.'</td>');
								echo('<td width="20%" class="tipo_documento">'.$mes_letra.'</td>');
								echo('<td width="20%" style="background-color:green " class="fecha_nacimiento">'.$ano.'</td>');
								echo('<td width="10%" style="background-color:yellow " class="editar">');
									echo('<i class="far fa-check-circle fa-lg" aria-hidden="true">');
									echo('</i>');
								echo('</td>');

								echo('<form action="" method="POST"></form>');
								echo('<td width="10%" class="pagar" style="background-color:yellow ">');
									echo('<i class="far fa-check-circle fa-lg" aria-hidden="true">');
									echo('</i>');
								echo('</td>');
							echo('</tr>');
						// }

						$ano_anterior = $ano;
						// ************
							echo('</table>');
							echo('</div>');
							echo('</td>');
							echo('</tr>');
						
	}
	echo('<pre>');
	print_r($array);
	echo('</pre>');
		?>
	

	<!--  -->

	<!-- <tr class="accordion-toggle">
		<td data-toggle="collapse" data-target="#collapseThree"></td>
		<td data-toggle="collapse" data-target="#collapseThree"></td>
		<td data-toggle="collapse" data-target="#collapseThree"></td>
		<td data-toggle="collapse" data-target="#collapseThree">2020</td>
		<td data-toggle="collapse" data-target="#collapseThree"></td>
		<td data-toggle="collapse" data-target="#collapseThree"></td>
	</tr>
  -->
	<!-- COLLAPSABLE -->
	<!-- <tr> -->
		<!-- EL COLLAPsABLE -->
		<!-- <td colspan="12">
			<div id="collapseThree" class="collapse" style="background-color:red ">
				<table style="color:black " width="100%">
					<tr>
						<td width="20 %" class="nombre"></td>
						<td width="20%" class="numero_documento">1</td>
						<td width="20%" class="tipo_documento">Agosto</td>
						<td width="20%" style="background-color:green " class="fecha_nacimiento">2019</td>
						<td width="10%" style="background-color:yellow " class="editar">
							<i class="far fa-check-circle fa-lg" aria-hidden="true">
							</i>
						</td>

						<form action="" method="POST"></form>
						<td width="10%" class="pagar" style="background-color:yellow ">
							<i class="far fa-check-circle fa-lg" aria-hidden="true">
							</i>
						</td>
					</tr> -->

					<!-- <tr>
						<td width="20 %" class="nombre"></td>
						<td width="20%" class="numero_documento">2</td>
						<td width="20%" class="tipo_documento">Septiembre</td>
						<td width="20%" style="background-color:green " class="fecha_nacimiento">2019</td>
						<td width="10%" style="background-color:yellow " class="editar">
							<i class="far fa-check-circle fa-lg" aria-hidden="true">
							</i>
						</td>

						<form action="" method="POST"></form>
						<td width="10%" class="pagar" style="background-color:yellow ">
							<i class="far fa-check-circle fa-lg" aria-hidden="true">
							</i>
						</td>
					</tr> -->

				</table>

			</div>
		</td>
	</tr>
	<!-- fin colapsable -->



	<!-- siguiente persona -->

	<!-- siguiente persona año1 -->
	<!-- siguiente persona año2 -->

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