<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
		<title>Transferencias</title>
	</head>
	<body>
		<?php require 'datos.php' ?>

		<?php 
		session_start();
		//Obtener las variables para mostrar
		$usu_ID = $_SESSION['ID'];
		$tipo = "Transferencia";
		$nombre = obtener_nombre($usu_ID);
		$apellidos = obtener_apellidos($usu_ID);
		$saldo = obtener_saldo($usu_ID);
		?>
		
		<?php
		
		 if(isset($_SESSION['usuarioL'])){
		 ?>

		<div id="header">
			<p id="name">Transferir Dinero</p>
			<a href="index.php"><p id="email">Cerrar Sesion</p></a>
		</div>
		<div class="left">
			



		</div>
		<div class="right">
			<h4>Datos del Cliente</h4>
			<p><?php echo $apellidos; ?>, <?php echo $nombre; ?></p>
			<h4>&Uacute;ltimos Movimientos</h4>
			
			<p>
				<!-- <li></li> -->
				<?php
				obtener_datos_movimiento($usu_ID);

				?>
			</p>
			<h4>Saldo Actual</h4>
			<p><?php 
			if(is_null($saldo)){
				echo 0;?> &euro; 
				<?php
			}else{

		echo $saldo; ?> &euro;
			<?php }?>
			</p>
			
			<h4>

				<form action="actionTI.php?tipo=<?php echo $tipo;?>" method="post">
				<label for="cantidadT">Cantidad a Transferir:</label></h4>
						<p><input min="1" max="9999" name="cantidadT" type="number" id="cantidadT" class="nombre" placeholder="Introduce cantidad" autofocus="" required=""/ >
						<input name="submit" type="submit" id="boton" value="Transferir" class="boton"/></p>

						<p> 

			
<p id="menu"> <a href = "
	<?php if ($_SESSION['super_usu'] > 0){
	?>admin.php"> <?php 
	}else{?>
		aplicacion.php"> 
	<?php }?> 


	 Volver </p></a></p>
				

				</form>

		</div>
			<?php } else { ?>

			<h4> NO HAS INICIADO SESION </h4>
			<p><a href= "index.php"> Inicia Sesion Aqui </a></p>
		<?php }  ?>
	</body>
</html>

