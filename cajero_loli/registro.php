<!DOCTYPE html>
<html>
<head>
	<title>Proyecto Cajero</title>
	<meta charset="utf-8">
	<!-- Se agrega la biblioteca de jquery y enseguida nuestro js de funciones-->
	<!--
	<script type="text/javascript" src="http://cajero.com/jquery-1.10.2.min.js" ></script>
	<script type="text/javascript" src="http://cajero.com/validares.js" ></script>  -->
	<link type="text/css" href="./css/style.css" rel="stylesheet" />
</head>

<body>
	<div id="registrar">
          	<a href="http://cajero.com/index.php"</a>Regresar</a>
    </div>
	<div id="envoltura">
		<div id="contenedor">
	
			<div id="cabecera">
				<img src="./css/images/logo.jpg" >
			</div>
	
			<div id="cuerpo">
				<form id="form-login" action="register.php" method="post" >
					
					<p><label for="nombreR">Nombre:</label></p>
						<input maxlength="20" name="nombreR" type="text" id="nombreR" class="nombre" placeholder="Pon tu nombre" autofocus="" required=""/ value="<?php if (isset($_GET['nombreR'])) echo $_GET['nombreR'];?>" /></p>
						<div id="mensaje1" class="errores"> Ingresa solo caracteres</div>
					
					<!--=============================================================================================-->
					<!-- En seguida de cada input se agregará un div con el mensaje de error-->
					<p><label for="apellidosR">Apellidos:</label></p>
						<input maxlength="50" name="apellidosR" type="text" id="apellidosR" class="apellidos" placeholder="Pon tus apellidos" required="" value="<?php if (isset($_GET['apellidosR'])) echo $_GET['apellidosR'];?>" /> </p>
					    <div id="mensaje2" class="errores"> Ingresa solo caracteres</div>
					<!--=============================================================================================-->
    				<?php
						if ($_GET["errorusuname"]=="si"){

							echo "<p style='color:red;'><img src='wrong1.png' style='width:20px;height:20px;'/>&nbsp;Ese nombre de usuario ya existe. Por favor intente otro.</p>";	
						}?>
					<p><label for="usuarioR">Nombre de Usuario:</label></p>
						<input maxlength="11" name="usuarioR" type="text" id="usuarioR" class="correo" placeholder="Elige un nombre de usuario" required="" value="<?php if (isset($_GET['usuarioR'])) echo $_GET['usuarioR'];?>" /> </p>
						<div id="mensaje3" class="errores"> Nombre de usuario no valido</div>
					<!--=============================================================================================-->
						<?php
						if ($_GET["errorpw"]=="si"){

							echo "<p style='color:red;'><img src='wrong1.png' style='width:20px;height:20px;'/>&nbspLas contrase&ntilde;as introducidas no coinciden. Por favor, compruebe de nuevo</p>";	
						}?>
						
					<p><label for="claveR">Contrase&ntilde;a:</label></p>
						<input name="claveR" type="password" id="claveR" class="pass" placeholder="Pon tu contraseña" required=""/ ></p>
					<!--=============================================================================================-->
					<p><label for="claveR2">Confirmar contrase&ntilde;a:</label></p>
						<input name="claveR2" type="password" id="claveR2" class="repass" placeholder="Repite contraseña" required="" /></p>

						<div id="mensaje4" class="errores"> Passwords incorrectos</div>
					<!--=============================================================================================-->	
					<p id="bot"><input name="submit" type="submit" id="boton" value="Registrarse" class="boton"/></p>
				</form>
			</div>
	
			<div id="pie">Sistema de Login y Registro</div>
		</div><!-- fin contenedor -->

	</div>
	
</body>

</html>
