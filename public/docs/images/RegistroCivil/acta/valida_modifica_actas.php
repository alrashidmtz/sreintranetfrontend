<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">

body { background:#f2f2f2; width:100%; text-transform: uppercase;}

.up { text-transform:uppercase;}


table {
width: 80%;
text-align: center;
border: solid 1px;
}

 

th { 
padding: 8px; 
background: #CCC; 
border-top: 4px solid #fff;
border-bottom: 1px solid #fff; color: #000; }


.th { 
padding: 8px; 
background: #fff; 
border-top: 4px solid #fff;
border-bottom: 1px solid #fff; color: #000; }

 

td { 
padding: 8px; 
background: #CCC; 
border-bottom: 1px solid #fff; 
color: #000; 
border-top: 4px solid #fff; color: #000; }

 

tr:hover td { 
background: #666; 
color: #fff; }

 

.editar {
color: red; 
cursor:pointer;}

 

#contenedorForm {
margin-left: 45px;}

 

.boton {
color: black; 
padding: 5px; 
margin: 10px;
background-color: #b9c9fe; }

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
<script type="text/javascript" src="http://192.168.39.31/intranet/images/RegistroCivil/acta/funciones.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar Solicitud de Actas</title>
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
		  
$folio="";		  
$folio = (isset($_POST['folio']) ? $_POST['folio'] : null);


if (isset($_POST['folio']) and empty($_POST['folio'])){
echo '<p align="center" style="color:#09F; font-size:24px">Debes escribir una palabra para realizar la búsqueda<br>

<a class="button" href="http://192.168.39.31/intranet/index.php/solicitud-actas-de-nacimiento/modificar-solicitud">Regresar</a></p>';
}


else{

   $busqueda = "SELECT * FROM solicitud WHERE Folio LIKE '".$folio."' ";
   $rbusqueda = mysqli_query($con,$busqueda);
   $total = mysqli_num_rows($rbusqueda);
   
  $f = mysqli_fetch_array($rbusqueda);
  
  
  if ($f == 0){ 
echo "<p align='center' style='color:#F00; font-size:24px'>No se encontro el folio<br><br>
<a class='button' href='http://192.168.39.31/intranet/index.php/solicitud-actas-de-nacimiento/modificar-solicitud'>Regresar</a></p>"; 
} 


 	else{

   $busqueda = "SELECT * FROM solicitud WHERE Folio LIKE ".$folio."";
   $rbusqueda = mysqli_query($con,$busqueda);
   

while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['fecha']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY	

$partsb = explode('-', $f['fechanacimiento']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Dateb = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY

if ($f['pais'] == 1){	
	$f['pais'] = "AGUASCALIENTES";		
} 
if ($f['pais'] == 2){	
	$f['pais'] = "BAJA CALIFORNIA";		
}
if ($f['pais'] == 3){	
	$f['pais'] = "BAJA CALIFORNIA SUR";		
}
if ($f['pais'] == 4){	
	$f['pais'] = "CAMPECHE";		
}
if ($f['pais'] == 5){	
	$f['pais'] = "COAHUILA";		
}
if ($f['pais'] == 6){	
	$f['pais'] = "COLIMA";		
}
if ($f['pais'] == 7){	
	$f['pais'] = "CHIAPAS";		
}
if ($f['pais'] == 8){	
	$f['pais'] = "CHIHUAHUA";		
}
if ($f['pais'] == 9){	
	$f['pais'] = "CIUDAD DE MÉXICO";		
}
if ($f['pais'] == 10){	
	$f['pais'] = "DURANGO";		
}
if ($f['pais'] == 11){	
	$f['pais'] = "GUANAJUATO";		
}
if ($f['pais'] == 12){	
	$f['pais'] = "GUERRERO";		
}
if ($f['pais'] == 13){	
	$f['pais'] = "HIDALGO";		
}
if ($f['pais'] == 14){	
	$f['pais'] = "JALISCO";		
}
if ($f['pais'] == 15){	
	$f['pais'] = "MÉXICO";		
}
if ($f['pais'] == 16){	
	$f['pais'] = "MICHOACÁN";		
}
if ($f['pais'] == 17){	
	$f['pais'] = "MORELOS";		
}
if ($f['pais'] == 18){	
	$f['pais'] = "NAYARIT";		
}
if ($f['pais'] == 19){	
	$f['pais'] = "NUEVO LEÓN";		
}
if ($f['pais'] == 20){	
	$f['pais'] = "OAXACA";		
}
if ($f['pais'] == 21){	
	$f['pais'] = "PUEBLA";		
} 
if ($f['pais'] == 22){	
	$f['pais'] = "QUERÉTARO";		
}
if ($f['pais'] == 23){	
	$f['pais'] = "QUINTANA ROO";		
}
if ($f['pais'] == 24){	
	$f['pais'] = "SAN LUIS POTOSÍ";		
}
if ($f['pais'] == 25){	
	$f['pais'] = "SINALOA";		
}
if ($f['pais'] == 26){	
	$f['pais'] = "SONORA";		
}
if ($f['pais'] == 27){	
	$f['pais'] = "TABASCO";		
}
if ($f['pais'] == 28){	
	$f['pais'] = "TAMAULIPAS";		
}
if ($f['pais'] == 29){	
	$f['pais'] = "TLAXCALA";		
}
if ($f['pais'] == 30){	
	$f['pais'] = "VERACRUZ";		
}
if ($f['pais'] == 31){	
	$f['pais'] = "YUCATÁN";		
}
if ($f['pais'] == 32){	
	$f['pais'] = "ZACATECAS";		
}	
	

echo '<table align="center">';
 
    echo'<tr> <th align="center"><b>Folio</b></th> ';
	echo '<td>'.$f['folio'].'</td></tr>';
    echo'<tr> <th align="center"><b>Fecha</b></h>'; 
	echo '<td>'.$Date.'</td></tr>'; 
    echo'<tr> <th align="center"><b>No. de Solicitud</b></th> '; 
	echo '<td>'.$f['solicitud'].'</td></tr>';         
    echo'<tr> <th align="center"><b>Cantidad</b></th>';
	echo '<td>'.$f['cantidad'].'</td></tr>';
    echo'<tr> <th align="center"><b>Identificación</b></th>';
	echo '<td>'.$f['identificacion'].'</td></tr>';
    echo'<tr> <th align="center"><b>CURP</b></th>';
	echo '<td>'.$f['curp'].'</td></tr>';
    echo'<tr> <th align="center"><b>Nombre</b></th> '; 
	echo '<td>'.$f['nombre'].'</td></tr>';  
    echo'<tr> <th align="center"><b>Sexo</b></th>';
	echo '<td>'.$f['sexo'].'</td></tr>';
    echo' <tr><th align="center"><b>Estado de Registro</b></th>'; 
	echo '<td>'.$f['estado'].'</td></tr>';    
    echo'<tr> <th align="center"><b>Estado de Nacimiento</b></th> ';
	echo '<td>'.$f['pais'].'</td></tr>';
    echo' <tr> <th align="center"><b>Municipio</b></th>'; 
	echo '<td>'.$f['provincia'].'</td></tr>';
    echo'<tr>  <th align="center"><b>Fecha de Nacimiento</b></th>';  
    echo '<td>'.$Dateb.'</td></tr>';    
    echo' <tr> <th align="center"><b>Nombres del padre</b></th>';
	echo '<td>'.$f['padre'].'</td></tr>';
	echo' <tr> <th align="center"><b>Nombres del padre</b></th>';
	echo '<td>'.$f['madre'].'</td></tr>';
    echo' <tr> <th align="center"><b>Domicilio</b></th>';
	echo '<td>'.$f['domicilio'].'</td></tr>';
    echo' <tr> <th align="center"><b>Teléfono</b></th>';
	echo '<td>'.$f['telefono'].'</td></tr>';    
    echo'<tr> <th align="center"><b>Email</b></th>';
	echo '<td>'.$f['email'].'</td></tr>';
    echo' <tr> <th align="center"><b>PSPI</b></th>';
	echo '<td>'.$f['pspi'].'</td></tr>';
    echo'<tr> <th align="center"><b>SEM</b></th>';  
	echo '<td>'.$f['sem'].'</td>';	
	echo '<tr><th>Observaciones</th>';
	echo '<td>'.$f['observaciones'].'</td>';	

echo '<tr><th class="th"><a class="button" href="http://192.168.39.31/intranet/index.php/solicitud-actas-de-nacimiento/modificar-solicitud";">Regresar</a></th><th class="th" onclick="transformarEnEditable(this)"><span class="button">Editar</span></th></tr>';

echo '</table>';
}
	}
}
 

?>


<div id="contenedorForm">

</div>
</body>
</html>