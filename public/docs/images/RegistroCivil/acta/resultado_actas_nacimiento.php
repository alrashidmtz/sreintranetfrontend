<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resultados Busqueda Actas de nacimiento</title>
<style type="text/css">
#cuadro {
	width: 100%;
	height:auto;
	margin-right:auto;
	margin-left: auto;
	border-style: dotted; border-width: 1px;
}

table, td, th {    
    border: 1px solid #ddd;
	background-color: #f2f2f2;  
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
}
</style>
</head>

<body>
<div align="center" id="cuadro">
  
<?php
$busca="";
 
$busca = (isset($_GET['busca']) ? $_GET['busca'] : null); 
$folio = (isset($_GET['folio']) ? $_GET['folio'] : null);
$fecha = (isset($_GET['fecha']) ? $_GET['fecha'] : null);
$solicitud = (isset($_GET['solicitud']) ? $_GET['solicitud'] : null);
$cantidad = (isset($_GET['cantidad']) ? $_GET['cantidad'] : null);
$identificacion = (isset($_GET['identificacion']) ? $_GET['identificacion'] : null);
$curp = (isset($_GET['curp']) ? $_GET['curp'] : null);
$nombre = (isset($_GET['nombre']) ? $_GET['nombre'] : null);
$sexo = (isset($_GET['sexo']) ? $_GET['sexo'] : null);
$estado = (isset($_GET['estado']) ? $_GET['estado'] : null);
$pais = (isset($_GET['pais']) ? $_GET['pais'] : null);
$provincia = (isset($_GET['provincia']) ? $_GET['provincia'] : null);
$fechanacimiento = (isset($_GET['fechanacimiento']) ? $_GET['fechanacimiento'] : null);
$padre = (isset($_GET['padre']) ? $_GET['padre'] : null);
$madre = (isset($_GET['madre']) ? $_GET['madre'] : null);
$domicilio = (isset($_GET['domicilio']) ? $_GET['domicilio'] : null);
$telefono = (isset($_GET['telefono']) ? $_GET['telefono'] : null);
$email = (isset($_GET['email']) ? $_GET['email'] : null);
$pspi = (isset($_GET['pspi']) ? $_GET['pspi'] : null);
$sem = (isset($_GET['sem']) ? $_GET['sem'] : null);
$observaciones = (isset($_GET['observaciones']) ? $_GET['observaciones'] : null);


if (isset($_GET['busca']) and empty($_GET['busca'])){
echo "Debes escribir una palabra para realizar la busqueda";
}

?>


<?php
if ($busca and $folio){
	
          $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "registrocivil";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
          $busqueda = "SELECT * FROM solicitud WHERE Folio LIKE '%".$busca."%' ";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);	
		  
		  	
	
?>
<table width="100%" border="1" align="center" >
   <tr>
     <td align="center"><b>Folio</b></td> 
     <td align="center"><b>Fecha</b></td>   
     <td align="center"><b>No. de Solicitud</b></td>            
     <td align="center"><b>Cantidad</b></td>
     <td align="center"><b>Identificaci??n</b></td>
     <td align="center"><b>CURP</b></td>
     <td align="center"><b>Nombre</b></td>     
     <td align="center"><b>Sexo</b></td>
     <td align="center"><b>Estado de Registro</b></td>      
     <td align="center"><b>Estado de Nacimiento</b></td>
     <td align="center"><b>Municipio</b></td> 
     <td align="center"><b>Fecha de Nacimiento</b></td>       
     <td align="center"><b>Nombres de los padres</b></td>
     <td align="center"><b>Domicilio</b></td>
     <td align="center"><b>Tel??fono</b></td>     
     <td align="center"><b>Email</b></td>
     <td align="center"><b>PSPI</b></td> 
     <td align="center"><b>SEM</b></td>   
     <td align="center"><b>Observaciones</b></td> 
   </tr>
 
<?php

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
	$f['pais'] = "CIUDAD DE M??XICO";		
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
	$f['pais'] = "M??XICO";		
}
if ($f['pais'] == 16){	
	$f['pais'] = "MICHOAC??N";		
}
if ($f['pais'] == 17){	
	$f['pais'] = "MORELOS";		
}
if ($f['pais'] == 18){	
	$f['pais'] = "NAYARIT";		
}
if ($f['pais'] == 19){	
	$f['pais'] = "NUEVO LE??N";		
}
if ($f['pais'] == 20){	
	$f['pais'] = "OAXACA";		
}
if ($f['pais'] == 21){	
	$f['pais'] = "PUEBLA";		
} 
if ($f['pais'] == 22){	
	$f['pais'] = "QUER??TARO";		
}
if ($f['pais'] == 23){	
	$f['pais'] = "QUINTANA ROO";		
}
if ($f['pais'] == 24){	
	$f['pais'] = "SAN LUIS POTOS??";		
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
	$f['pais'] = "YUCAT??N";		
}
if ($f['pais'] == 32){	
	$f['pais'] = "ZACATECAS";		
}	
	
echo '<tr>';
echo '<td>'.$f['folio'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['solicitud'].'</td>';
echo '<td>'.$f['cantidad'].'</td>';
echo '<td>'.$f['identificacion'].'</td>';
echo '<td>'.$f['curp'].'</td>';
echo '<td>'.$f['nombre'].'</td>';
echo '<td>'.$f['sexo'].'</td>';
echo '<td>'.$f['estado'].'</td>';
echo '<td>'.$f['pais'].'</td>';
echo '<td>'.$f['provincia'].'</td>';
echo '<td>'.$Dateb.'</td>';
echo '<td>'.$f['padre']. '&cedil; &nbsp;' .$f['madre'].'</td>';
echo '<td>'.$f['domicilio'].'</td>';
echo '<td>'.$f['telefono'].'</td>';
echo '<td>'.$f['email'].'</td>';
echo '<td>'.$f['pspi'].'</td>';
echo '<td>'.$f['sem'].'</td>';
echo '<td>'.$f['observaciones'].'</td>';
echo '</tr>';


}

echo '<tr>';
echo '<td colspan="10">N??mero de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

}// if busca and folio

?>
</table>








<?php

if ($busca and $fecha){
	
		    
    $parts = explode('/', $busca); 

/**
 *   $parts[0]: the day
 *   $parts[1]: the month
 *   $parts[2]: the year
*/
 
$newDate = "{$parts[2]}-{$parts[1]}-{$parts[0]}"; // YYYY-MM-DD
 
	      $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "registrocivil";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
          $busqueda = "SELECT * FROM solicitud WHERE fecha LIKE '%".$newDate."%' ";
          $rbusqueda = mysqli_query($con,$busqueda); 
		  $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);
          

?>
<table width="100%" border="1" align="center" >
   <tr>
     <td align="center"><b>Folio</b></td> 
     <td align="center"><b>Fecha</b></td>   
     <td align="center"><b>No. de Solicitud</b></td>            
     <td align="center"><b>Cantidad</b></td>
     <td align="center"><b>Identificaci??n</b></td>
     <td align="center"><b>CURP</b></td>
     <td align="center"><b>Nombre</b></td>     
     <td align="center"><b>Sexo</b></td>
     <td align="center"><b>Estado de Registro</b></td>      
     <td align="center"><b>Estado de Nacimiento</b></td> 
     <td align="center"><b>Municipio</b></td> 
     <td align="center"><b>Fecha de Nacimiento</b></td>       
     <td align="center"><b>Nombres de los padres</b></td>
     <td align="center"><b>Domicilio</b></td>
     <td align="center"><b>Tel??fono</b></td>     
     <td align="center"><b>Email</b></td>
     <td align="center"><b>PSPI</b></td>
     <td align="center"><b>SEM</b></td> 
     <td align="center"><b>Observaciones</b></td>
   </tr>
 
<?php
$excel="";
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
	$f['pais'] = "CIUDAD DE M??XICO";		
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
	$f['pais'] = "M??XICO";		
}
if ($f['pais'] == 16){	
	$f['pais'] = "MICHOAC??N";		
}
if ($f['pais'] == 17){	
	$f['pais'] = "MORELOS";		
}
if ($f['pais'] == 18){	
	$f['pais'] = "NAYARIT";		
}
if ($f['pais'] == 19){	
	$f['pais'] = "NUEVO LE??N";		
}
if ($f['pais'] == 20){	
	$f['pais'] = "OAXACA";		
}
if ($f['pais'] == 21){	
	$f['pais'] = "PUEBLA";		
} 
if ($f['pais'] == 22){	
	$f['pais'] = "QUER??TARO";		
}
if ($f['pais'] == 23){	
	$f['pais'] = "QUINTANA ROO";		
}
if ($f['pais'] == 24){	
	$f['pais'] = "SAN LUIS POTOS??";		
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
	$f['pais'] = "YUCAT??N";		
}
if ($f['pais'] == 32){	
	$f['pais'] = "ZACATECAS";		
}	

	
echo '<tr>';
echo '<td>'.$f['folio'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['solicitud'].'</td>';
echo '<td>'.$f['cantidad'].'</td>';
echo '<td>'.$f['identificacion'].'</td>';
echo '<td>'.$f['curp'].'</td>';
echo '<td>'.$f['nombre'].'</td>';
echo '<td>'.$f['sexo'].'</td>';
echo '<td>'.$f['estado'].'</td>';
echo '<td>'.$f['pais'].'</td>';
echo '<td>'.$f['provincia'].'</td>';
echo '<td>'.$Dateb.'</td>';
echo '<td>'.$f['padre']. '&cedil; &nbsp;' .$f['madre'].'</td>';
echo '<td>'.$f['domicilio'].'</td>';
echo '<td>'.$f['telefono'].'</td>';
echo '<td>'.$f['email'].'</td>';
echo '<td>'.$f['pspi'].'</td>';
echo '<td>'.$f['sem'].'</td>';
echo '<td>'.$f['observaciones'].'</td>';
echo '</tr>';


}

echo '<tr>';
echo '<td colspan="10">N??mero de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

if ($fecha!="" and $total==0){	
echo "Capture la fecha en el siguiente formato dd/mm/YYYY</br>en caso de de que el d??a o el mes sea de un solo digito, coloque un cero &quot;0&quot; a la izquierda Ejemplo: &quot;01&quot;";	
}

}// if busca and fecha


?>
</table>




<?php
if ($busca and $nombre){
	
 $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "registrocivil";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
          $busqueda = "SELECT * FROM solicitud WHERE nombre LIKE '%".$busca."%'";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);	
	
	
?>
<table width="100%" border="1" align="center" >
   <tr>
    <td align="center"><b>Folio</b></td> 
     <td align="center"><b>Fecha</b></td>   
     <td align="center"><b>No. de Solicitud</b></td>            
     <td align="center"><b>Cantidad</b></td>
     <td align="center"><b>Identificaci??n</b></td>
     <td align="center"><b>CURP</b></td>
     <td align="center"><b>Nombre</b></td>     
     <td align="center"><b>Sexo</b></td>
     <td align="center"><b>Estado de Registro</b></td>      
     <td align="center"><b>Estado de Nacimiento</b></td> 
     <td align="center"><b>Municipio</b></td> 
     <td align="center"><b>Fecha de Nacimiento</b></td>       
     <td align="center"><b>Nombres de los padres</b></td>
     <td align="center"><b>Domicilio</b></td>
     <td align="center"><b>Tel??fono</b></td>     
     <td align="center"><b>Email</b></td>
     <td align="center"><b>PSPI</b></td>
     <td align="center"><b>SEM</b></td>
     <td align="center"><b>Observaciones</b></td>    
   </tr>
 
<?php

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
	$f['pais'] = "CIUDAD DE M??XICO";		
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
	$f['pais'] = "M??XICO";		
}
if ($f['pais'] == 16){	
	$f['pais'] = "MICHOAC??N";		
}
if ($f['pais'] == 17){	
	$f['pais'] = "MORELOS";		
}
if ($f['pais'] == 18){	
	$f['pais'] = "NAYARIT";		
}
if ($f['pais'] == 19){	
	$f['pais'] = "NUEVO LE??N";		
}
if ($f['pais'] == 20){	
	$f['pais'] = "OAXACA";		
}
if ($f['pais'] == 21){	
	$f['pais'] = "PUEBLA";		
} 
if ($f['pais'] == 22){	
	$f['pais'] = "QUER??TARO";		
}
if ($f['pais'] == 23){	
	$f['pais'] = "QUINTANA ROO";		
}
if ($f['pais'] == 24){	
	$f['pais'] = "SAN LUIS POTOS??";		
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
	$f['pais'] = "YUCAT??N";		
}
if ($f['pais'] == 32){	
	$f['pais'] = "ZACATECAS";		
}	

	
echo '<tr>';
echo '<td>'.$f['folio'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['solicitud'].'</td>';
echo '<td>'.$f['cantidad'].'</td>';
echo '<td>'.$f['identificacion'].'</td>';
echo '<td>'.$f['curp'].'</td>';
echo '<td>'.$f['nombre'].'</td>';
echo '<td>'.$f['sexo'].'</td>';
echo '<td>'.$f['estado'].'</td>';
echo '<td>'.$f['pais'].'</td>';
echo '<td>'.$f['provincia'].'</td>';
echo '<td>'.$Dateb.'</td>';
echo '<td>'.$f['padre']. '&cedil; &nbsp;' .$f['madre'].'</td>';
echo '<td>'.$f['domicilio'].'</td>';
echo '<td>'.$f['telefono'].'</td>';
echo '<td>'.$f['email'].'</td>';
echo '<td>'.$f['pspi'].'</td>';
echo '<td>'.$f['sem'].'</td>';
echo '<td>'.$f['observaciones'].'</td>';
echo '</tr>';


}

echo '<tr>';
echo '<td colspan="10">N??mero de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

}// if busca and asunto

?>
</table>



<?php



if ($busca == "*"){
	
          $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "registrocivil";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
		  $url = "http://192.168.39.31/intranet/images/RegistroCivil/acta/resultado_actas_nacimiento.php";
		  
		  $query = "SELECT count(*) from solicitud";
          $result = mysqli_query($con,$query);
          $row=mysqli_fetch_array($result);
          
   $totrecords = $row[0];
   	
	 if (!isset ($_GET['page']))
  
  $thispage = 1;
   
       else
  
       $thispage = $_GET['page'];
   
       $recordsperpage = 5;
   
       $offset = ($thispage -1) * $recordsperpage;
	   
	   $totpages = ceil($totrecords / $recordsperpage);  
	   

          $busqueda = "SELECT * FROM solicitud ORDER BY Folio ASC LIMIT $offset,$recordsperpage";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);	
	
	
?>
<table width="100%" border="1" align="center" >
   <tr>
     <td align="center"><b>Folio</b></td> 
     <td align="center"><b>Fecha</b></td>   
     <td align="center"><b>No. de Solicitud</b></td>            
     <td align="center"><b>Cantidad</b></td>
     <td align="center"><b>Identificaci??n</b></td>
     <td align="center"><b>CURP</b></td>
     <td align="center"><b>Nombre</b></td>     
     <td align="center"><b>Sexo</b></td>
     <td align="center"><b>Estado de Registro</b></td>      
     <td align="center"><b>Estado de Nacimiento</b></td>
     <td align="center"><b>Municipio</b></td>  
     <td align="center"><b>Fecha de Nacimiento</b></td>       
     <td align="center"><b>Nombres de los padres</b></td>
     <td align="center"><b>Domicilio</b></td>
     <td align="center"><b>Tel??fono</b></td>     
     <td align="center"><b>Email</b></td>
     <td align="center"><b>PSPI</b></td>
     <td align="center"><b>SEM</b></td>
     <td align="center"><b>Observaciones</b></td>      
     
     
   </tr>
 
<?php

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
	$f['pais'] = "CIUDAD DE M??XICO";		
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
	$f['pais'] = "M??XICO";		
}
if ($f['pais'] == 16){	
	$f['pais'] = "MICHOAC??N";		
}
if ($f['pais'] == 17){	
	$f['pais'] = "MORELOS";		
}
if ($f['pais'] == 18){	
	$f['pais'] = "NAYARIT";		
}
if ($f['pais'] == 19){	
	$f['pais'] = "NUEVO LE??N";		
}
if ($f['pais'] == 20){	
	$f['pais'] = "OAXACA";		
}
if ($f['pais'] == 21){	
	$f['pais'] = "PUEBLA";		
} 
if ($f['pais'] == 22){	
	$f['pais'] = "QUER??TARO";		
}
if ($f['pais'] == 23){	
	$f['pais'] = "QUINTANA ROO";		
}
if ($f['pais'] == 24){	
	$f['pais'] = "SAN LUIS POTOS??";		
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
	$f['pais'] = "YUCAT??N";		
}
if ($f['pais'] == 32){	
	$f['pais'] = "ZACATECAS";		
}	

echo '<tr>';
echo '<td>'.$f['folio'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['solicitud'].'</td>';
echo '<td>'.$f['cantidad'].'</td>';
echo '<td>'.$f['identificacion'].'</td>';
echo '<td>'.$f['curp'].'</td>';
echo '<td>'.$f['nombre'].'</td>';
echo '<td>'.$f['sexo'].'</td>';
echo '<td>'.$f['estado'].'</td>';
echo '<td>'.$f['pais'].'</td>';
echo '<td>'.$f['provincia'].'</td>';
echo '<td>'.$Dateb.'</td>';
echo '<td>'.$f['padre']. '&cedil; &nbsp;' .$f['madre'].'</td>';
echo '<td>'.$f['domicilio'].'</td>';
echo '<td>'.$f['telefono'].'</td>';
echo '<td>'.$f['email'].'</td>';
echo '<td>'.$f['pspi'].'</td>';
echo '<td>'.$f['sem'].'</td>';
echo '<td>'.$f['observaciones'].'</td>';
echo '</tr>';
}

echo '<tr>';
echo '<td colspan="2">N??mero de elementos encontrados por p??gina: <b>'.$total.'</b></td>';
echo '<td colspan="2">N??mero total de elementos encontrados:<b> '.$totrecords.'</b></td>';
echo '<td colspan="1">P??gina<b> '.$thispage.' de ' .$totpages.' </b></td>';




echo '<td colspan="3">';

	if ($totpages > 1) {
		if ($thispage != 1)
			echo '<a href="'.$url.'?page='.($thispage-1).'"></a>';
		for ($i=1;$i<=$totpages;$i++) {
			if ($thispage == $i)
				echo $thispage;
			else
				echo '  <a href="'.$url.'?page='.$i. "&busca=".$busca.'">'.$i.'</a>  ';
		}
		if ($thispage != $totpages)
			echo '<a href="'.$url.'?page='.($thispage+1).'"></a>';
	}
	echo '</td>';


echo '</tr>';

}// if busca *


 



?>
</table>



<table align="right">
<tr>
<td colspan="18" align="right">
<input type="button" value="Regresar a Solicitud de Actas" onClick="window.location = 'http://192.168.39.31/intranet/index.php/solicitud-actas-de-nacimiento';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input align="right" type="button" value="Regresar a busqueda de actas" onClick="window.location = 'http://192.168.39.31/intranet/index.php/solicitud-actas-de-nacimiento/busqueda-de-solicitud-de-acta';"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type="button" name="imprimir" value="Imprimir" onclick="window.print();">


</td>
</tr>
</table>




</div>
</body>
</html>