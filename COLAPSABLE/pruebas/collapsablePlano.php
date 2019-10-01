<?php
// require_once('functions/funciones.php');
// encabezado();


?>
<!-- 
https://github.com/damienfremont/blog/tree/master/20141216-bootstrap-collapsable_table -->
<!-- todo esto está medido en un contenedor con class contenido -->

<!DOCTYPE html>
<html>

<head>
	<link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css" rel="stylesheet">
	<link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/7c319f7be2.js"></script>
</head>

<body>



		<h1>Table + collapse + buttons</h1>
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

				<tr class="subrayado">
					<td width="20 %" class="nombre ">Bo Dalsgaard</td>
					<td width="20 %" class="numero_documento"></td>
					<td width="20 %" class="tipo_documento"></td>
					<td width="20 %" class="fecha_nacimiento"></td>
					<td width="10 %" class="editar"></td>
					<td width="10 %" class="borrar"></td>
				</tr>

				<tr class="accordion-toggle">
					<td data-toggle="collapse" data-target="#collapseTwo"></td>
					<td data-toggle="collapse" data-target="#collapseTwo"></td>
					<td data-toggle="collapse" data-target="#collapseTwo"></td>
					<td data-toggle="collapse" data-target="#collapseTwo">2019</td>
					<td data-toggle="collapse" data-target="#collapseTwo"></td>
					<td data-toggle="collapse" data-target="#collapseTwo"></td>
				</tr>

				<tr>
					<!-- EL COLLAPsABLE -->
					<td colspan="12">
						<div id="collapseTwo" class="collapse" style="background-color:red ">
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
								</tr>

								<tr>
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
								</tr>

							</table>

						</div>
					</td>
				</tr>

				<tr class="accordion-toggle">
					<td data-toggle="collapse" data-target="#collapseThree"></td>
					<td data-toggle="collapse" data-target="#collapseThree"></td>
					<td data-toggle="collapse" data-target="#collapseThree"></td>
					<td data-toggle="collapse" data-target="#collapseThree">2020</td>
					<td data-toggle="collapse" data-target="#collapseThree"></td>
					<td data-toggle="collapse" data-target="#collapseThree"></td>
				</tr>

				<!-- COLLAPSABLE -->
				<tr>
					<!-- EL COLLAPsABLE -->
					<td colspan="12">
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
								</tr>

								<tr>
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
								</tr>

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
<!-- todo esto está medido en un contenedor con class contenido -->

<?php
// pie();
?>