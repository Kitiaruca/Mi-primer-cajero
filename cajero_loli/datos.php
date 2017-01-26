<?php
function probando(){
	echo 'funcion de prueba';
}


function open_database_connection(){
	$servername = "localhost";
	$username = "root";
	$password = "2388a";
	$dbname = "cajero";
	
	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		//return 'error';
    	die("Connection failed: " . $conn->connect_error);
	}else{
		//return 'estas mu loca';
		return $conn;
	}
}

function close_database_connection($conn){
	$conn->close();
}

/*function obtener_datos($usu_ID){

$conn = open_database_connection();

$sql = "SELECT apellidos, nombre , saldo 
		FROM usuario LEFT JOIN movimiento 
		ON usuario.usu_ID=movimiento.usu_ID 
		WHERE usuario.usu_ID = $usu_ID ";

$result = $conn->query($sql);

if ($result->num_rows > 0 ){ 
	echo "<table border = '1'> \n"; 
    echo "<tr><td>Apellidos</td><td>Nombre</td><td>Saldo</td></tr> \n"; 
   do { 
      echo "<tr><td>".$row["apellidos"]."</td><td>".$row["nombre"]."</td><td>".$row["saldo"]."</td></tr> \n"; 
   } while ($row = $result->fetch_assoc()); 
   echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
}
close_database_connection($conn);
}
*/

function obtener_todos_datos(){

$conn = open_database_connection();

// Imprime botón radio
$sql = "SELECT * FROM usuario";
$result = $conn->query($sql);
	print "<table class='responstable'> \n"; 
	print "<thead> \n";
     print "<tr><th data-th='Table Details'><span>Modificar</span></th><th>Usuario</th><th>Apellidos</th><th>Nombre</th><th>Saldo</th></tr> \n";
         print "</thead> \n";
    print "<tbody> \n"; 
foreach ($result as $valor) {
    
	print "<tr>";
    print "        <td class=\"centrado\"><input type=\"radio\" name=\"id\" value=\"$valor[usu_ID]\" /></td>\n";
    print "        <td>$valor[usu_name]</td>\n";
    print "        <td>$valor[apellidos]</td>\n";
    print "        <td>$valor[nombre]</td>\n";
      print "        <td>$valor[saldo]</td>\n";
    print "</tr>";
}
print "</tbody> \n";
print "</table> \n";

  

  close_database_connection($conn);
}

function obtener_detalle_usuario ($usu_ID){

$conn = open_database_connection();

$sql = "SELECT *
		FROM usuario   
		WHERE usu_ID = $usu_ID ";

$result = $conn->query($sql);

if ($result->num_rows > 0 ){ 
	echo "<table class='singletable'> \n";
	    
    echo "<tr><th data-th='Table Details'>Admin</th><th>ID</th><th>Usuario</th><th>Clave</th><th>Apellidos</th><th>Nombre</th><th>Saldo Actual</th></tr> \n"; 
   while ($row = $result->fetch_assoc()) { 
   	if($row["super_usu"] > 0){
   		echo "<tr><td>Si</td><td>".$row["usu_ID"]."</td><td>".$row["usu_name"]."</td><td>".sha1($row["clave"])."</td><td>".$row["apellidos"]."</td><td>".$row["nombre"]."</td><td>".$row["saldo"]."</td></tr> \n";
   	}else{
   		echo "<tr><td>No</td><td>".$row["usu_ID"]."</td><td>".$row["usu_name"]."</td><td>".sha1($row["clave"])."</td><td>".$row["apellidos"]."</td><td>".$row["nombre"]."</td><td>".$row["saldo"]."</td></tr> \n";
   	} 	
   	
   } 

   echo "</table> \n"; 
} else { 
echo "<p> &iexcl; No se ha encontrado ning&uacute;n movimiento &#33;</p>"; 
}
close_database_connection($conn);
}


function obtener_datos_movimiento($usu_ID){

$conn = open_database_connection();

$sql = "SELECT movimiento_ID, fecha , tipo, cantidad, saldo 
		FROM movimiento 
		WHERE usu_ID = $usu_ID ";

$result = $conn->query($sql);

if ($result->num_rows > 0 ){ 
	echo "<div class='tabla'>";
	echo "<table class ='responstable'> \n"; 
	 echo "<thead> \n"; 
    echo "<tr><th>ID</th><th>Fecha</th><th>Tipo</th><th>Cantidad</th><th>Saldo</th></tr> \n";
    echo "</thead> \n";
    echo "<tbody> \n"; 
   while ($row = $result->fetch_assoc()) { 
      echo "<tr><td>".$row["movimiento_ID"]."</td><td>".$row["fecha"]."</td><td>".$row["tipo"]."</td><td>".$row["cantidad"]."</td><td>".$row["saldo"]."</td></tr> \n"; 
   }  
   echo "</tbody> \n";
   echo "</table> \n"; 
   echo "</div>";
} else { 
echo "<p> &iexcl; No se ha encontrado ning&uacute;n movimiento &#33;</p>"; 
}
close_database_connection($conn);
}


function obtener_nombre($usu_ID){

$conn = open_database_connection();

$sql = "SELECT nombre  
		FROM usuario  
		WHERE usuario.usu_ID = $usu_ID ";

$result = $conn->query($sql);

if ($result->num_rows > 0 ){ 
	
	while ($row = $result->fetch_assoc()){
		$nombre = $row["nombre"];
	}

	return $nombre;
} else { 
echo "<p> &iexcl; No se ha encontrado ning&uacute;n registro &#33;</p>"; 
}
close_database_connection($conn);
}

function obtener_apellidos($usu_ID){

$conn = open_database_connection();

$sql = "SELECT apellidos  
		FROM usuario  
		WHERE usuario.usu_ID = $usu_ID ";

$result = $conn->query($sql);

if ($result->num_rows > 0 ){ 
	
	while ($row = $result->fetch_assoc()){
		$apellidos = $row["apellidos"];
	}

	return $apellidos;
} else { 
echo "<p> &iexcl; No se ha encontrado ning&uacute;n registro &#33;</p>"; 
}
close_database_connection($conn);
}

function obtener_saldo($usu_ID){

$conn = open_database_connection();

$sql = "SELECT saldo  
		FROM movimiento  
		WHERE movimiento.usu_ID = $usu_ID ";

$result = $conn->query($sql);

if ($result->num_rows > 0 ){ 
	
	while ($row = $result->fetch_assoc()){
		$saldo = $row["saldo"];
	}

	return $saldo;
} else { 
//echo "<p> &iexcl; No se ha encontrado ning&uacute;n registro &#33;</p>"; 
}
close_database_connection($conn);
}

function usuarioR_existe($usuarioR){

	$conn = open_database_connection();

	$sql = "SELECT usu_name FROM usuario WHERE usu_name='$usuarioR' "; 
	$result = $conn->query($sql);


	if ($result->num_rows > 0){
		//El nombre de usuario ya existe

    return true;
	}else {
		return false;
	}

close_database_connection($conn);


}

function ingresar($saldo){

$cantidadI = htmlspecialchars($_POST["cantidadI"]);

$saldoF = $saldo + $cantidadI;
return $saldoF;

}

function ingresar_10($saldo){

$saldoF = $saldo + 10;
return $saldoF;


}

function transferir($saldo){

$cantidadT = htmlspecialchars($_POST["cantidadT"]);

$saldoF = $saldo - $cantidadT;
return $saldoF;

}

function transferir_10($saldo){

$saldoF = $saldo - 10;
return $saldoF;

}

function aniadir_movimiento($saldoF,$tipo, $cantidad, $usu_ID){


$conn = open_database_connection();

$sql = "INSERT INTO movimiento (tipo, cantidad, saldo, usu_ID) ".
     "VALUES ('$tipo', '$cantidad', '$saldoF', '$usu_ID')";

$sql2 = "UPDATE usuario
		SET saldo = '$saldoF'
		WHERE usu_ID = '$usu_ID' ";

if ($conn->query($sql) === TRUE) {
    if($conn->query($sql2)===TRUE){

    echo "New record created successfully<br>";

    echo "<a href='index.php'>VOLVER</a>";
    }
    
    //header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

close_database_connection($conn);
}

function borrar_usuario($usu_ID){
	$conn = open_database_connection();

	$sql = "DELETE FROM usuario WHERE usu_ID = $usu_ID ";
	$sql2 = "DELETE FROM movimiento WHERE usu_ID = $usu_ID ";
	
	if ($conn->query($sql) === TRUE) {
		if($conn->query($sql2)===TRUE){
			
			echo "Record deleted successfully";
		}    
} else {
    echo "Error deleting record: " . $conn->error;
}


close_database_connection($conn);

}

function formulario_modificar_usuario($usu_ID){
$conn = open_database_connection();

$sql = "SELECT *
		FROM usuario   
		WHERE usu_ID = $usu_ID ";

$result = $conn->query($sql);

if ($result->num_rows > 0 ){ 
	echo "<table class = 'singletable'> \n"; 
    echo "<tr><th>Admin</th><th>ID</th><th>Usuario</th><th>Apellidos</th><th>Nombre</th></tr> \n"; 
   while ($row = $result->fetch_assoc()) { 
   	if($row["super_usu"] > 0){
   		echo " <tr>
   					<td>Si</td>
   					<td>".$row["usu_ID"]." </td>
   					<td><input  maxlength='11' name='usuarioM' type='text' id='usuarioM' value=' ".$row["usu_name"]." '/ ></td>
					<td><input maxlength='50' name='apellidoM' type='text' id='apellidoM' value=' ".$row["apellidos"]." '/ ></td>
					<td><input maxlength='20' name='nombreM' type='text' id='nombreM' value=' ".$row["nombre"]." '/ ></td>
   				</tr> \n";
   	}else{
   		echo "<tr>
   					<td>No</td>
   					<td><input class='inputid' maxlength='9' name='usu_ID' type='text' id='usu_ID' value=' ".$row["usu_ID"]." ' readonly/ > </td>
   					<td><input maxlength='11' name='usuarioM' type='text' id='usuarioM' value=' ".$row["usu_name"]." '/ ></td>
					<td><input maxlength='50' name='apellidoM' type='text' id='apellidoM' value=' ".$row["apellidos"]." '/ ></td>
					<td><input maxlength='20' name='nombreM' type='text' id='nombreM' value=' ".$row["nombre"]." '/ ></td>
   			</tr> \n";
   	} 	
   	
   } 
   echo "</table> \n"; 
} else { 
echo "<p> &iexcl; No se ha encontrado ning&uacute;n movimiento &#33;</p>"; 
}
close_database_connection($conn);
}


function formulario_modificar_clave($usu_ID){
$conn = open_database_connection();

$sql = "SELECT *
		FROM usuario   
		WHERE usu_ID = $usu_ID ";

$result = $conn->query($sql);

if ($result->num_rows > 0 ){ 
	echo "<table class = 'singletable'> \n"; 
    echo "<tr><th>Admin</th><th>ID</th><th>Usuario</th><th>Clave</th><th>Apellidos</th><th>Nombre</th></tr> \n"; 
   while ($row = $result->fetch_assoc()) { 
    if($row["super_usu"] > 0){
      echo " <tr>
            <td>Si</td>
            <td>".$row["usu_ID"]." </td>
            <td><input  maxlength='11' name='usuarioM' type='text' id='usuarioM' value=' ".$row["usu_name"]." '/ ></td>
           <td><input  maxlength='50' name='claveM' type='text' id='claveM' required='' /></td>
          <td><input maxlength='40' name='apellidoM' type='text' id='apellidoM' value=' ".$row["apellidos"]." '/ ></td>
          <td><input maxlength='20' name='nombreM' type='text' id='nombreM' value=' ".$row["nombre"]." '/ ></td>
          </tr> \n";
    }else{
      echo "<tr>
            <td>No</td>
            <td><input class='inputid' maxlength='9' name='usu_ID' type='text' id='usu_ID' value=' ".$row["usu_ID"]." ' readonly/ > </td>
            <td><input maxlength='11' name='usuarioM' type='text' id='usuarioM' value=' ".$row["usu_name"]." '/ ></td>
            <td><input  maxlength='40' name='claveM' type='text' id='claveM' required '' / ></td>
          <td><input maxlength='50' name='apellidoM' type='text' id='apellidoM' value=' ".$row["apellidos"]." '/ ></td>
          <td><input maxlength='20' name='nombreM' type='text' id='nombreM' value=' ".$row["nombre"]." '/ ></td>
        </tr> \n";
    }   
    
   } 
   echo "</table> \n"; 
} else { 
echo "<p> &iexcl; No se ha encontrado ning&uacute;n movimiento &#33;</p>"; 
}
close_database_connection($conn);
}

function modificar_cliente(){
$conn = open_database_connection();
	$usu_ID = $_POST['usu_ID'];
	$usuario = $_POST['usuarioM'];
	$apellidos = $_POST['apellidoM'];
	$nombre = $_POST['nombreM'];

$sql = "UPDATE usuario
		SET  usu_name = '$usuario', nombre = '$nombre', apellidos = '$apellidos' 
		WHERE usu_ID = '$usu_ID' ";

if ($conn->query($sql) === TRUE) {
	

     echo "New record created successfully<br>";
    echo "<a href='panel.php'>VOLVER</a>";
    
    
    //header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

close_database_connection($conn);
}

function modificar_clave(){
$conn = open_database_connection();
	$usu_ID = $_POST['usu_ID'];
	$clave = $_POST['claveM'];
	$claveC = sha1($clave);


$sql = "UPDATE usuario
		SET  clave = '$claveC' 
		WHERE usu_ID = '$usu_ID' ";

if ($conn->query($sql) === TRUE) {
	

	header("Location:panel.php?pwmodi=si");
    
    
    //header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

close_database_connection($conn);
}

function buscar_cliente($busqueda){

$conn = open_database_connection();

$sql = "SELECT usu_ID
		FROM usuario   
		WHERE nombre LIKE '%$busqueda%'
		OR apellidos LIKE '%$busqueda%' ";

$result = $conn->query($sql);

if ($result->num_rows > 0 ){ 
	 
   while ($row = $result->fetch_assoc()) { 
   	$usu_ID = $row['usu_ID'];  	
   } 
} else {
$usu_ID = 0; 
return $usu_ID; 
}
return $usu_ID;
close_database_connection($conn);

}
?>