<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
		header("location: login.php");
		exit;
	}
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	$active_traspasos="active";
	$title="Traspasos";
?>
<!DOCTYPE html>
<html lang="en">
  	<head>
    	<?php include("head.php");?>
  	</head>
  	<body>
		<?php
		include("navbar.php");
		?>
		<div class="container">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="btn-group pull-right">
						<button type='button' id="modal_traspaso" class="btn btn-success" data-toggle="modal" data-target="#nuevoTraspaso">
							<span class="glyphicon glyphicon-plus" ></span>
							Nuevo Traspaso
						</button>
					</div>
					<h4><i class='glyphicon glyphicon-search'></i> Buscar Traspaso</h4>
				</div>
				<div class="panel-body">
					<?php
						include("modal/registro_traspaso.php");
						include("modal/ver_traspaso_con_productos.php");
					?>
					<form class="form-horizontal" role="form" id="datos_cotizacion">
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label"></label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Buscar traspaso por trabajador" onkeyup='load(1);'>
							</div>
							<div class="col-md-3">
								<input type="date" class="form-control" id="fecha" placeholder="Buscar traspaso por fecha" onchange='load(1);'>
							</div>	
						</div>
					</form>
					<div id="resultados"></div><!-- Carga los datos ajax -->
					<div class='outer_div'></div><!-- Carga los datos ajax -->
				</div>
			</div>		 
		</div>
		<hr>
		<?php
		include("footer.php");
		?>
		
		<script type="text/javascript" src="js/traspasos.js"></script>
  	</body>
</html>
