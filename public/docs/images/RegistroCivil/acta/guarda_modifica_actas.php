<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
body { background:#f2f2f2; width:100%;}

.up { text-transform:uppercase;}

#cuadro {
	width: 100%;
	height:auto;
	margin-right:auto;
	margin-left: auto;
	border-style: dotted; border-width: 1px;
}

table, td, th {    
    border: 1px solid #ddd;
	background-color: #666;  
}

table {
    border-collapse: collapse;
    
}

th, td {
    padding: 15px;
}


.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 14px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #F00;
  background-color: #CCC;
  border: none;
  border-radius: 15px;
  box-shadow: 0 3px 3px #000;
}

.button:hover {background-color: #FFF}

.button:active {
  background-color: #333;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Guardar Cambio</title>
</head>

<body>

<?php
include ("conexion.php");

$con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);	


$folio = htmlspecialchars(isset($_POST['folio']) ? $_POST['folio'] : null);
$fecha = htmlspecialchars(isset($_POST['fecha']) ? $_POST['fecha'] : null);
$solicitud = htmlspecialchars(isset($_POST['solicitud']) ? $_POST['solicitud'] : null);
$cantidad = htmlspecialchars(isset($_POST['cantidad']) ? $_POST['cantidad'] : null);
$identificacion = htmlspecialchars(isset($_POST['identificacion']) ? $_POST['identificacion'] : null);
$curp = htmlspecialchars(isset($_POST['curp']) ? $_POST['curp'] : null);
$nombre = htmlspecialchars(isset($_POST['nombre']) ? $_POST['nombre'] : null);
$sexo = htmlspecialchars(isset($_POST['sexo']) ? $_POST['sexo'] : null);
$estado = htmlspecialchars(isset($_POST['estado']) ? $_POST['estado'] : null);
$pais = htmlspecialchars(isset($_POST['pais']) ? $_POST['pais'] : null);
$provincia = htmlspecialchars(isset($_POST['provincia']) ? $_POST['provincia'] : null);
$fechanacimiento = htmlspecialchars(isset($_POST['fechanacimiento']) ? $_POST['fechanacimiento'] : null);
$padre = htmlspecialchars(isset($_POST['padre']) ? $_POST['padre'] : null);
$madre = htmlspecialchars(isset($_POST['madre']) ? $_POST['madre'] : null);
$domicilio = htmlspecialchars(isset($_POST['domicilio']) ? $_POST['domicilio'] : null);
$telefono = htmlspecialchars(isset($_POST['telefono']) ? $_POST['telefono'] : null);
$email = htmlspecialchars(isset($_POST['email']) ? $_POST['email'] : null);
$pspi = htmlspecialchars(isset($_POST['pspi']) ? $_POST['pspi'] : null);
$sem = htmlspecialchars(isset($_POST['sem']) ? $_POST['sem'] : null);
$observaciones = htmlspecialchars(isset($_POST['observaciones']) ? $_POST['observaciones'] : null);




/*echo "$folio <br>";
echo "$fecha<br>"; 
echo "$solicitud<br>";
echo "$cantidad<br>";
echo "$identificacion<br>";
echo "$curp<br>";
echo "$nombre<br>";
echo "$sexo<br>";
echo "$estado<br>";
echo "$pais<br>"; 
echo "$provincia<br>"; 
echo "$fechanacimiento<br>"; 
echo "$padre<br>"; 
echo "$madre<br>"; 
echo "$domicilio<br>"; 
echo "$telefono<br>"; 
echo "$email<br>";
echo "$pspi<br>"; 
echo "$sem<br>"; 
echo "$observaciones<br>";*/


	

$parts = explode('/', $fecha); 

/**
 *   $parts[0]: the day
 *   $parts[1]: the month
 *   $parts[2]: the year
*/
 
$Date = "{$parts[2]}-{$parts[1]}-{$parts[0]}"; // YYYY-MM-DD

$parts = explode('/', $fechanacimiento); 

/**
 *   $parts[0]: the day
 *   $parts[1]: the month
 *   $parts[2]: the year
*/
 
$Datenac = "{$parts[2]}-{$parts[1]}-{$parts[0]}"; // YYYY-MM-DD
	
	
	



$sql= "UPDATE solicitud SET fecha='$Date',solicitud='$solicitud',cantidad='$cantidad',identificacion='$identificacion',curp='$curp',nombre='$nombre',sexo='$sexo',estado='$estado',pais='$pais',provincia='$provincia',fechanacimiento='$Datenac',padre='$padre',madre='$madre',domicilio='$domicilio',telefono='$telefono',email='$email',pspi='$pspi',sem='$sem',observaciones='$observaciones' WHERE folio='$folio'"; 
$rsql = mysqli_query ($con,$sql);

		
		
echo '<p align="center"><span style="color:#F00; font-size:22px">SE ACTUALIZO LA INFORMACION CORRECTAMENTE</span></p>';		


	



?>		


<p align="center"><input  class="button" type="button" value="Modificar otro registro" onClick="window.location = 'http://192.168.39.31/intranet/index.php/solicitud-actas-de-nacimiento/modificar-solicitud';"></p>


</body>
</html>