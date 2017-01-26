<!DOCTYPE html>
<html>
	<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
		<title>MOVIMIENTOS</title>
	</head>
	<body>
		<?php require 'datos.php' ?>

		<?php 
		session_start();
		//Obtener las variables para mostrar
		$usu_ID = $_SESSION['ID'];
		$nombre = obtener_nombre($usu_ID);
		$apellidos = obtener_apellidos($usu_ID);
		$saldo = obtener_saldo($usu_ID);
		?>
		
		<?php
		
		 if(isset($_SESSION['usuarioL'])){
		 ?>

		<div id="header">
			<p id="name">Movimientos</p>
			<a href="index.php"><p id="email">Cerrar Sesion</p></a>
		</div>
		<div class="left">
			
		<ul class="navmenu">
        <li class="item1"><a href="#"><p id="menu"> Ingresar Dinero </p> </a>
            <ul>
                <li class="subitem1"><a href="ingresar.php">Ingreso normal </a></li>
                <li class="subitem2"><a href="actionTI.php?tipo=Ingreso&amp;cantidad=10">Ingresar 10&euro; </a></li>
            </ul>
        </li>
        <li class="item2"><a href="#"> Transferir Dinero  </a>
            <ul>
                <li class="subitem1"><a href="Transferir.php">Transferencia normal </a></li>
                <li class="subitem2"><a href="actionTI.php?tipo=transferencia&amp;cantidad=10">Transferir 10&euro; </a></li>
            </ul>
        </li>
        
        
    </ul>
 



		</div>
		<div class="right">
		<h4>	<?php
						if ($_GET["mov"]=="si"){

							echo "<p style='color:#414a50;''font-size:30px;'> <b><img src='tick1.png' style='width:20px;height:20px;'/>&nbsp;Movimiento realizado con exito</b></p>";	
						}?> </h4>

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
			
		</div>
	<!--	<div id="footer">
			<p>123 Tu Dirección, Ciudad, Provincia, Tel.: (011) 555-5555</p>
		</div> -->

<script type="text/javascript">

$(function() {

    var menu_ul = $('.navmenu > li > ul'),
        menu_a  = $('.navmenu > li > a');
    
    menu_ul.hide();

    menu_a.click(function(e) {
        e.preventDefault();
        if(!$(this).hasClass('active')) {
            menu_a.removeClass('active');
            menu_ul.filter(':visible').slideUp('normal');
            $(this).addClass('active').next().stop(true,true).slideDown('normal');
        } else {
            $(this).removeClass('active');
            $(this).next().stop(true,true).slideUp('normal');
        }

       });

});

</script>
<?php } else { ?>

	<h4> NO HAS INICIADO SESION </h4>
	<p><a href= "index.php"> Inicia Sesion Aqui </a></p>
<?php }  ?>

	</body>
</html>

