
<?php

//require "functions.php";

//probandoFunctions();
//die();

//probando();



$usuarioL = htmlspecialchars($_POST["usuarioL"]);

$claveL = htmlspecialchars($_POST["claveL"]);
$claveLC = sha1($claveL); // clave cifrada con sha1


echo $usuarioL;
echo "<br/>";
echo $claveL;
echo "<br/>";
echo $claveLC;

require "datos.php";




// Create connection
$conn = open_database_connection();

$sql = "SELECT usu_ID, super_usu FROM usuario WHERE usu_name='$usuarioL' and clave='$claveLC'"; 


$result = $conn->query($sql);

if(!$result){
    echo $result;
    //return;
}

if ($result->num_rows > 0){
    //Obtener la ID del usuario

while($row = $result->fetch_assoc()) {
       $usu_ID = $row["usu_ID"];
       $super_usu = $row["super_usu"];

    }
    //Comprobar si es un admin o no
    if($super_usu > 0){
        /* Empezamos la sesión */
    session_start();
 
    /* Creamos la sesión */
    $_SESSION['ID'] = $usu_ID;
    $_SESSION['super_usu'] = $super_usu;
    $_SESSION['usuarioL'] = $_POST['usuarioL'];
    //Redireccionamos
        header ("Location: admin.php");
    /* Si no hay una sesión creada, redireccionar al index. */
    	
    }else{
    	 session_start();
 
    /* Creamos la sesión */
    $_SESSION['ID'] = $usu_ID;
    $_SESSION['usuarioL'] = $_POST['usuarioL'];
    header ("Location: aplicacion.php");
    /* Si no hay una sesión creada, redireccionar al index. */
}
    }else {
    //si no existe le mando otra vez a la portada
    header("Location: index.php?errorusuario=si");

}

close_database_connection($conn);