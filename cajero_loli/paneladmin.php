<?php


require "datos.php";
session_start();

$usu_ID = $_REQUEST['id'];
$operacion = $_POST['operacion'];
$clave = $_POST['clave'];
$usu_detalle = $_SESSION['usuDetalle'];

if(isset($_GET['buscar'])){

$busqueda = $_GET['buscar'];
header ("Location: detalle.php?buscar=$busqueda");

}

if($clave == 'Actualizar'){
	modificar_clave();
	//header("Location:panel.php?pwmodi=si");
}else {

if($operacion == "Buscar"){
	 header ("Location: buscar.php");

}else if($operacion == "Detalle"){
	 header ("Location: detalle.php?usu='$usu_ID'&operacion=detalle");
	

}else if($operacion == "Modificar"){
	header ("Location: detalle.php?usu='$usu_ID'&operacion=modificar");

}else if($operacion == "Borrar"){
	header ("Location: detalle.php?usu='$usu_ID'&operacion=borrar");
}else if($operacion == "Actualizar"){
	modificar_cliente();

	header("Location: panel.php");

}else if($operacion == "Cambiar Clave"){
	//////////////////////////////
	header ("Location: detalle.php?usu=$usu_detalle&operacion=modificar&pw=1"); // si pw > 0 se muestra formulario para cambiar la contraseña

}else if($operacion == "Agregar"){

	header("Location: aniadir.php");
}
}
?>