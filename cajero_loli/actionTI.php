<?php
require "datos.php";

session_start();
$usu_ID = $_SESSION['ID'];
$super_usu =  $_SESSION['super_usu'];
$tipo = $_GET["tipo"];
$saldo = obtener_saldo($usu_ID);
$canti = $_GET['cantidad'];

if($tipo == "Ingreso"){
	if($canti > 0){
		$saldoF = ingresar_10($saldo);
		$cantidad = 10;
	}else{
		$saldoF = ingresar($saldo);
		$cantidad = htmlspecialchars($_POST["cantidadI"]);	
	}

	
}else{ //no es un ingreso sino transferencia
	if($canti > 0){
		$saldoF = transferir_10($saldo);
		$cantidad = 10;
	}else{
		$cantidad = htmlspecialchars($_POST["cantidadT"]);
		$saldoF = transferir($saldo);	
		}	
	
	}




aniadir_movimiento($saldoF,$tipo,$cantidad,$usu_ID);

if($super_usu > 0){
header ("Location: admin.php?mov=si ");

}else{
header ("Location: aplicacion.php?mov=si ");
}


?>