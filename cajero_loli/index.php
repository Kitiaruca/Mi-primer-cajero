<!DOCTYPE html>
<?php
 session_start(); 
 session_destroy();
 ?>

<html lang="es">
<head>
	<title>Proyecto Cajero</title>
	<meta charset="utf-8">
	<link type="text/css" href="./css/style.css" rel="stylesheet" />
</head>

<body>
	
	<div id="registrar">
          	<a href="http://cajero.com/registro.php"</a>Registrarse</a>
    </div> <!-- fin opcion-->
	<div id="tarjeta">
		
	</div>
	<div id="envoltura">

		<div id="contenedor">
	
			<div id="cabecera" >

				<img src="./css/images/logo.jpg" >
			</div>
	
			<div id="cuerpo">
				<form id="form-login" action="login3.php" method="post" autocomplete="off">
					<!--A saber, el atributo for funciona como el id.-->
					<!--ejemplo <label for="usuario">Usuario:</label>-->
					<!--required es nuevo en html5, si el campo está vacío te avisa, pero cuidado, no valida la información-->
		<?php 
						if ($_GET["registro"]=="si"){

							echo "<p style='color:#414a50;''font-size:30px;'> <b><img src='tick1.png' style='width:20px;height:20px;'/>&nbsp;Registro realizado con exito</b></p>";	
						}?>

					<?php
						if ($_GET["errorusuario"]=="si"){

							echo "<p style='color:red;'> <img src='wrong1.png' style='width:15px;height:15px;'/>&nbspDatos incorrectos</p>";	
						}?>
					<p><label >Usuario:</label></p>
						<input name="usuarioL" type="text" id="usuarioL" placeholder="Ingresa Usuario" autofocus="" required=""></p>
					
					<p><label>Contrase&ntilde;a:</label></p>
						<input name="claveL" type="password" id="claveL" placeholder="Ingresa Password" required=""></p>
					
					<p id="bot"><input type="submit" id="submit" name="submit" value="Acceder" class="boton"></p>
				</form>
			</div><!--fin cuerpo-->
	
			<div id="pie">Sistema de Login y Registro</div>
		</div><!-- fin contenedor -->

	</div><!--fin envoltura-->
	
</body>

</html>
