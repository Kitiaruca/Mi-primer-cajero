<html>
	<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
		<title> Detalle de usuario</title>
	</head>
	<body>
		<?php require 'datos.php' ?>

		<?php 
		session_start();
		//Obtener las variables para mostrar
		$usu_ID = $_SESSION['ID'];
        $usu_detalle = $_GET['usu'];
        $_SESSION['usuDetalle'] = $usu_detalle;
		$nombre = obtener_nombre($usu_ID);
		$apellidos = obtener_apellidos($usu_ID);
		$saldo = obtener_saldo($usu_ID);
	
		?>

		      <?php       
        if (isset($_SESSION['super_usu'])){
         ?>

         <?php  
         if(isset($_SESSION['usuarioL'])){
         
         ?>

		<div id="header">
			<p id="name">Administracion de usuarios</p>
			<a href="index.php"><p id="email">Cerrar Sesion</p></a>
		</div>
		<div class="left">

		</div>
        <div class="right">
        
        <?php if($_GET['operacion'] == detalle){ ?>

        
        <!-- INICIO DETALLES DEL CLIENTE O MODIFICAR -->
        
            <h4>Detalles del Cliente</h4>
        
            <p><?php echo obtener_detalle_usuario($usu_detalle); ?></p>

        <h4>Movimientos del Cliente</h4>
            <p><?php echo obtener_datos_movimiento($usu_detalle);?> </p>

            <?php } ?>
             <!-- FIN DETALLES DEL CLIENTE  -->
    <!-- INICIO MODIFICAR -->
       <?php 
        if($_GET['operacion'] == modificar && $_GET['pw'] == 1){ ?>

        <h4>Detalles del Cliente</h4>
        
        <p><?php echo obtener_detalle_usuario($usu_detalle); ?></p>
        
        <h4>Modificar Cliente</h4>

        <form action="paneladmin.php" method="post">
        <p> <?php echo formulario_modificar_clave($usu_detalle)?></p>
        <input type="submit" name="clave" value="Actualizar" class="boton"/>
         
        </form>
       <?php } else if($_GET['operacion'] == modificar && $_GET['pw'] != 1){ ?> <!-- Modificar Cliente NO CONTRASEÑA -->

        <h4>Detalles del Cliente</h4>
        
        <p><?php echo obtener_detalle_usuario($usu_detalle); ?></p>
        
        <h4>Modificar Cliente</h4>

        <form action="paneladmin.php" method="post">
        <p> <?php echo formulario_modificar_usuario($usu_detalle)?></p>
        <input type="submit" name="operacion" value="Actualizar" class="boton"/>
         <input type="submit" name="operacion" value="Cambiar Clave" class="boton"/>
        </form>

        <?php } ?>

        <!-- FIN MODIFICAR DEL CLIENTE  -->
      
        <!-- FIN DETALLES DEL CLIENTE  -->
         <!-- INICIO BORRAR CLIENTE  -->
    <?php if($_GET['operacion'] == borrar){ ?>
       <h4> Informacion <h4>
       <p> <?php borrar_usuario($usu_detalle);?> </p>
    


        

      <?php   } ?>
         <!-- FIN BORRAR CLIENTE  -->
         <!-- INICIO BUSCAR CLIENTE  -->
 <?php if(isset($_GET['buscar'])){ 
       
       $busqueda = $_GET['buscar'];
       $usuario = buscar_cliente($busqueda); 
      
      
         if($usuario > 0){ 
          echo "  <h4> Usuario encontrado <h4>";
           obtener_detalle_usuario($usuario);
         obtener_datos_movimiento($usuario);
        }else{ 
           echo "<h4>Ningun usuario encontrado</h4>";
         } 
    echo "<a href='detalle.php?usu=".$usuario."&operacion=modificar'><input class ='boton' type='button' value ='Modificar'/></a>";
    echo "<a href='#'><input class ='boton' type='button' value ='Borrar'/></a>";
        

       } ?>
         <!-- FIN BUSCAR CLIENTE  -->
   
    <h4 id="menu"> <a href = "
    <?php if ($_SESSION['super_usu'] > 0){
    ?>panel.php" <?php 
    }else{?>
        aplicacion.php" ?>
    <?php }?>


    "> Volver </h4></a>

		</div>
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

    <?php } else { ?>
    <h4> NO TIENES PERMISOS PARA ACCEDER A ESTA PAGINA </h4>
    <?php header ("Location: aplicacion.php");
 }  ?>

	</body>
</html>