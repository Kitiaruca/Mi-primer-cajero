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
       
 

<h4>Buscar Cliente</h4>
       <!-- <form action="paneladmin.php" method="post"> -->


                   <form method="get" action="paneladmin.php" id="buscadorexpandible">
<input  name="buscar" type="text" size="40" placeholder="Buscar..." /></form>
<!-- <a href="panel.php"><input class ="boton" type="button" value ="Mostrar todo"/></a> -->




       <!-- <input type="submit" name="operacion" value="Detalle" class="boton"/>
        <input type="submit" name="operacion" value="Modificar" class="boton" />
        <input type="submit" name="operacion" value="Borrar" class="boton"/>
        <input type="submit" name="operacion" value="Agregar" class="boton"/>
        </form> -->
        <p></p>
     <p id="menu"> <a href = "
    <?php if ($_SESSION['super_usu'] > 0){
    ?>panel.php" <?php 
    }else{?>
        aplicacion.php" ?>
    <?php }?>


    "> Volver </p></a></p>
  
    

         <!-- FIN AÑADIR CLIENTE  -->

   

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