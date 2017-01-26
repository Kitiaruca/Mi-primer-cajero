
<?php

$nombreR = htmlspecialchars($_POST["nombreR"]);
$apellidosR = htmlspecialchars($_POST["apellidosR"]);
$usuarioR = htmlspecialchars($_POST["usuarioR"]);
$claveR = htmlspecialchars($_POST["claveR"]);
$claveR2 = htmlspecialchars($_POST["claveR2"]);

require "datos.php";
session_start();
// Comprobar que las dos claves son iguales


if(isset($_SESSION['usuarioL'])){ //si se accede desde el registro como admin


if (usuarioR_existe($usuarioR) ){
//COMPROBAR USUARIO
	 header("Location: aniadir.php?errorusuname=si&nombreR=$nombreR&apellidosR=$apellidosR");
} else {


//COMPROBAR CONTRASEÑAS
if($claveR != $claveR2){
	//Si las contraseñas no coinciden la mando de nuevo a la pagina de registro
	 header("Location: aniadir.php?errorpw=si&nombreR=$nombreR&apellidosR=$apellidosR&usuarioR=$usuarioR");

} else{




$conn = open_database_connection();

$claveRC = sha1($claveR); // clave cifrada con sha1
$sql = "INSERT INTO usuario (nombre, apellidos, usu_name, clave) ".
     "VALUES ('$nombreR', '$apellidosR', '$usuarioR', '$claveRC')";

if ($conn->query($sql) === TRUE) {

	header ("Location: panel.php?registro=si ");
    //echo "New record created successfully<br>";
	//echo "<a href='index.php'>VOLVER</a>";
    //header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

close_database_connection($conn);


}
}
} else { //si se accede como admin

	if (usuarioR_existe($usuarioR) ){
//COMPROBAR USUARIO
	 header("Location: registro.php?errorusuname=si&nombreR=$nombreR&apellidosR=$apellidosR");
} else {


//COMPROBAR CONTRASEÑAS
if($claveR != $claveR2){
	//Si las contraseñas no coinciden la mando de nuevo a la pagina de registro
	 header("Location: registro.php?errorpw=si&nombreR=$nombreR&apellidosR=$apellidosR&usuarioR=$usuarioR");

} else{




$conn = open_database_connection();

$claveRC = sha1($claveR); // clave cifrada con sha1
$sql = "INSERT INTO usuario (nombre, apellidos, usu_name, clave) ".
     "VALUES ('$nombreR', '$apellidosR', '$usuarioR', '$claveRC')";

if ($conn->query($sql) === TRUE) {

	header ("Location: index.php?registro=si ");
    //echo "New record created successfully<br>";
	//echo "<a href='index.php'>VOLVER</a>";
    //header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

close_database_connection($conn);


}
}

}