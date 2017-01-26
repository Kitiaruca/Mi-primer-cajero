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
        <!-- INICIO AÑADIR CLIENTE  -->
   
                <form id="form-login" action="register.php" method="post" >
                    
                    <h4><label for="nombreR">Nombre:</label></h4>
                       <p> <input class="registro" maxlength="20" name="nombreR" type="text" id="nombreR" class="nombre" placeholder="Pon tu nombre" autofocus="" required="" value="<?php if (isset($_GET['nombreR'])) echo $_GET['nombreR'];?>" /></p>
                        
                    
                    <!--=============================================================================================-->
                    <!-- En seguida de cada input se agregará un div con el mensaje de error-->
                    <h4><label for="apellidosR">Apellidos:</label></h4>
                        <p><input class="registro" maxlength="50" name="apellidosR" type="text" id="apellidosR" class="apellidos" placeholder="Pon tus apellidos" required=""  value="<?php if (isset($_GET['apellidosR'])) echo $_GET['apellidosR'];?>" /></p>
                       
                    <!--=============================================================================================-->
                    <?php
                        if ($_GET["errorusuname"]=="si"){

                            echo "<p style='color:red;'><img src='wrong1.png' style='width:20px;height:20px;'/>&nbsp;Ese nombre de usuario ya existe. Por favor intente otro.</p>"; 
                        }?>
                    <h4><label for="usuarioR">Nombre de Usuario:</label></h4>
                       <p> <input class="registro" maxlength="11" name="usuarioR" type="text" id="usuarioR" class="correo" placeholder="Elige un nombre de usuario" required=""  value="<?php if (isset($_GET['usuarioR'])) echo $_GET['usuarioR']; ?>" /> </p>
                      
                    <!--=============================================================================================-->
                        <?php
                        if ($_GET["errorpw"]=="si"){

                            echo "<p style='color:red;'><img src='wrong1.png' style='width:20px;height:20px;'/>&nbsp;Las contrase&ntilde;as introducidas no coinciden. Por favor, compruebe de nuevo</p>";   
                        }?>
                        
                    <h4><label for="claveR">Contrase&ntilde;a:</label></h4>
                       <p> <input class="registro" name="claveR" type="password" id="claveR" class="pass" placeholder="Pon tu contrase&ntilde;a" required=""/ ></p>
                    <!--=============================================================================================-->
                    <h4><label for="claveR2">Confirmar contrase&ntilde;a:</label></h4>
                        <p><input class="registro" name="claveR2" type="password" id="claveR2" class="repass" placeholder="Repite contrase&ntilde;a" required="" /></p>
                    <!--=============================================================================================-->    
                    <p><input name="submit" type="submit" id="boton" value="Agregar" class="boton"/></p>
                </form>
                <h4 id="menu"> <a href = "
    <?php if ($_SESSION['super_usu'] > 0){
    ?>panel.php" <?php 
    }else{?>
        aplicacion.php" ?>
    <?php }?>


    "> Volver </h4></a>
  
    

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