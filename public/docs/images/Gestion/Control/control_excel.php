<?php
header("Content-type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
header("Content-Disposition: attachment; filename=Resultados_minutario.xls");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resultados Busqueda Control</title>
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
$busca = (isset($_POST['busca']) ? $_POST['busca'] : null); 
$folio = (isset($_POST['folio']) ? $_POST['folio'] : null);
$tema = (isset($_POST['tema']) ? $_POST['tema'] : null);
$fecha = (isset($_POST['fechas']) ? $_POST['fechas'] : null);
$horas = (isset($_POST['horas']) ? $_POST['horas'] : null);
$fechar = (isset($_POST['fechar']) ? $_POST['fechar'] : null);
$guia = (isset($_POST['guia']) ? $_POST['guia'] : null);
$remitente = (isset($_POST['remitente2']) ? $_POST['remitente2'] : null);
$asunto = (isset($_POST['asunto']) ? $_POST['asunto'] : null);
$sicar = (isset($_POST['sicar']) ? $_POST['sicar'] : null);
$sem = (isset($_POST['sem']) ? $_POST['sem'] : null);
$local = (isset($_POST['local']) ? $_POST['local'] : null);
$sem1 = (isset($_POST['sem1']) ? $_POST['sem2'] : null);
$local1 = (isset($_POST['local1']) ? $_POST['local1'] : null);
$ID = (isset($_POST['ID']) ? $_POST['ID'] : null);





if (isset($_POST['busca']) and empty($_POST['busca']) and !isset($_POST['instrucciones'])){
echo "Debes escribir una palabra para realizar la busqueda";
}

?>

<?php
if ($busca and $folio){
	
          $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "control";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
          $busqueda = "SELECT * FROM gestion WHERE folio LIKE '%".$busca."%'";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);	
		  
		  	
	
?>
<table width="100%" border="1" align="center" >
   <tr>
     <td align="center"><b>Folio</b></td> 
     <td align="center"><b>Tipo de entrega</b></td>   
     <td align="center"><b>Fecha de recibido</b></td>            
     <td align="center"><b>Remitente</b></td>
     <td align="center"><b>Asunto</b></td>
     <td align="center"><b>Número de Referencia</b></td>     
     <td align="center"><b>SEM</b></td>
     <td align="center"><b>Local</b></td>     
     
     
   </tr>
 
<?php

while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['fechas']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY	
	
echo '<tr>';
echo '<td>'.$f['folio'].'</td>';
echo '<td>'.$f['tema'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['remitente2'].'</td>';
echo '<td>'.$f['asunto'].'</td>';
echo '<td>'.$f['guia'].'</td>';
echo '<td>'.$f['sem']. '&cedil; &nbsp;' .$f['sem1'].'</td>';
echo '<td>'.$f['local']. '&cedil; &nbsp;' .$f['local1'].'</td>';
echo '</tr>';


}

echo '<tr>';
echo '<td colspan="10">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

}// if busca and Folio

?>
</table>



<?php
if ($busca and $tema){
	
          $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "control";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
          $busqueda = "SELECT * FROM gestion WHERE tema LIKE '%".$busca."%'";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);	
	
	
?>
<table width="100%" border="1" align="center" >
   <tr>
     <td align="center"><b>Folio</b></td>  
     <td align="center"><b>Tipo de entrega</b></td>   
     <td align="center"><b>Fecha de recibido</b></td>            
     <td align="center"><b>Remitente</b></td>
     <td align="center"><b>Asunto</b></td>
     <td align="center"><b>Número de Referencia</b></td>     
     <td align="center"><b>SEM</b></td>
     <td align="center"><b>Local</b></td>     
     
     
   </tr>
 
<?php

while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['fechas']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY	
	
echo '<tr>';
echo '<td>'.$f['folio'].'</td>';
echo '<td>'.$f['tema'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['remitente2'].'</td>';
echo '<td>'.$f['asunto'].'</td>';
echo '<td>'.$f['guia'].'</td>';
echo '<td>'.$f['sem']. '&cedil; &nbsp;' .$f['sem1'].'</td>';
echo '<td>'.$f['local']. '&cedil; &nbsp;' .$f['local1'].'</td>';
echo '</tr>';


}

echo '<tr>';
echo '<td colspan="10">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

}// if busca and tema

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
          $base = "control";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
          $busqueda = "SELECT * FROM gestion WHERE fechas LIKE '%".$newDate."%'";
          $rbusqueda = mysqli_query($con,$busqueda); 
		  $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);
          

?>
<table width="100%" border="1" align="center" >
   <tr>
     <td align="center"><b>Folio</b></td>
     <td align="center"><b>Fecha de recibido</b></td>
     <td align="center"><b>Tipo de entrega</b></td>                 
     <td align="center"><b>Remitente</b></td>
     <td align="center"><b>Asunto</b></td>
     <td align="center"><b>Número de Referencia</b></td>     
     <td align="center"><b>SEM</b></td>
     <td align="center"><b>Local</b></td>
   </tr>
 
<?php
$excel="";
while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['fechas']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY	
	
echo '<tr>';
echo '<td>'.$f['folio'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['tema'].'</td>';
echo '<td>'.$f['remitente2'].'</td>';
echo '<td>'.$f['asunto'].'</td>';
echo '<td>'.$f['guia'].'</td>';
echo '<td>'.$f['sem']. '&cedil; &nbsp;' .$f['sem1'].'</td>';
echo '<td>'.$f['local']. '&cedil; &nbsp;' .$f['local1'].'</td>';
echo '</tr>';


}

echo '<tr>';
echo '<td colspan="10">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

if ($fecha!="" and $total==0){	
echo "Capture la fecha en el siguiente formato dd/mm/YYYY</br>en caso de de que el día o el mes sea de un solo digito, coloque un cero &quot;0&quot; a la izquierda Ejemplo: &quot;01&quot;";	
}

}// if busca and fecha


?>
</table>






<?php
if ($busca and $remitente){
	
$host = "localhost";
          $user = "root";
          $pw = "";
          $base = "control";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
          $busqueda = "SELECT * FROM gestion WHERE remitente2 LIKE '%".$busca."%'";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);	
	
	
?>
<table width="100%" border="1" align="center" >
   <tr>
     <td align="center"><b>Folio</b></td>
     <td align="center"><b>Remitente</b></td>
     <td align="center"><b>Fecha de recibido</b></td>
     <td align="center"><b>Tipo de entrega</b></td>
     <td align="center"><b>Asunto</b></td>
     <td align="center"><b>Número de Referencia</b></td>     
     <td align="center"><b>SEM</b></td>
     <td align="center"><b>Local</b></td>
   </tr>
 
<?php

while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['fechas']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY	
	
echo '<tr>';
echo '<td>'.$f['folio'].'</td>';
echo '<td>'.$f['remitente2'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['tema'].'</td>';
echo '<td>'.$f['asunto'].'</td>';
echo '<td>'.$f['guia'].'</td>';
echo '<td>'.$f['sem']. '&cedil; &nbsp;' .$f['sem1'].'</td>';
echo '<td>'.$f['local']. '&cedil; &nbsp;' .$f['local1'].'</td>';
echo '</tr>';


}

echo '<tr>';
echo '<td colspan="10">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

}// if busca and remitente

?>
</table>



<?php
if ($busca and $asunto){
	
 $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "control";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
          $busqueda = "SELECT * FROM gestion WHERE asunto LIKE '%".$busca."%'";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);	
	
	
?>
<table width="100%" border="1" align="center" >
   <tr>
   <td align="center"><b>Folio</b></td>
     <td align="center"><b>Asunto</b></td>
     <td align="center"><b>Remitente</b></td>
     <td align="center"><b>Fecha de recibido</b></td>
     <td align="center"><b>Tipo de entrega</b></td>     
     <td align="center"><b>Número de Referencia</b></td>     
     <td align="center"><b>SEM</b></td>
     <td align="center"><b>Local</b></td>
   </tr>
 
<?php

while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['fechas']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY	
	
echo '<tr>';
echo '<td>'.$f['folio'].'</td>';
echo '<td>'.$f['asunto'].'</td>';
echo '<td>'.$f['remitente2'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['tema'].'</td>';
echo '<td>'.$f['guia'].'</td>';
echo '<td>'.$f['sem']. '&cedil; &nbsp;' .$f['sem1'].'</td>';
echo '<td>'.$f['local']. '&cedil; &nbsp;' .$f['local1'].'</td>';
echo '</tr>';


}

echo '<tr>';
echo '<td colspan="10">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

}// if busca and asunto

?>
</table>


<?php
if ($busca and $sem){
	
$host = "localhost";
          $user = "root";
          $pw = "";
          $base = "control";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
          $busqueda = "SELECT * FROM gestion WHERE sem LIKE '%".$busca."%'";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);	
	
	
?>
<table width="100%" border="1" align="center" >
   <tr>
   <td align="center"><b>Folio</b></td>
     <td align="center"><b>SEM</b></td>
     <td align="center"><b>Local</b></td>
     <td align="center"><b>Asunto</b></td>
     <td align="center"><b>Remitente</b></td>
     <td align="center"><b>Fecha de recibido</b></td>
     <td align="center"><b>Tipo de entrega</b></td>     
     <td align="center"><b>Número de Referencia</b></td>  
   </tr>
 
<?php

while($f=mysqli_fetch_array($rbusqueda)){

$parts = explode('-', $f['fechas']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY	
	
echo '<tr>';
echo '<td>'.$f['folio'].'</td>';
echo '<td>'.$f['sem']. '&cedil; &nbsp;' .$f['sem1'].'</td>';
echo '<td>'.$f['local']. '&cedil; &nbsp;' .$f['local1'].'</td>';
echo '<td>'.$f['asunto'].'</td>';
echo '<td>'.$f['remitente2'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['tema'].'</td>';
echo '<td>'.$f['guia'].'</td>';
echo '</tr>';


}

echo '<tr>';
echo '<td colspan="10">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

}// if busca and sem

?>
</table>


<?php
if ($busca and $local){
	
 $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "control";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
          $busqueda = "SELECT * FROM gestion WHERE local LIKE '%".$busca."%'";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);	
	
	
?>
<table width="100%" border="1" align="center" >
   <tr>
   <td align="center"><b>Folio</b></td>
     <td align="center"><b>Local</b></td>
     <td align="center"><b>SEM</b></td>     
     <td align="center"><b>Asunto</b></td>
     <td align="center"><b>Remitente</b></td>
     <td align="center"><b>Fecha de recibido</b></td>
     <td align="center"><b>Tipo de entrega</b></td>     
     <td align="center"><b>Número de Referencia</b></td>  
     
   </tr>
 
<?php

while($f=mysqli_fetch_array($rbusqueda)){

$parts = explode('-', $f['fechas']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY	
	
echo '<tr>';
echo '<td>'.$f['folio'].'</td>';
echo '<td>'.$f['sem']. '&cedil; &nbsp;' .$f['sem1'].'</td>';
echo '<td>'.$f['local']. '&cedil; &nbsp;' .$f['local1'].'</td>';
echo '<td>'.$f['asunto'].'</td>';
echo '<td>'.$f['remitente2'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['tema'].'</td>';
echo '<td>'.$f['guia'].'</td>';
echo '</tr>';

}

echo '<tr>';
echo '<td colspan="10">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

}// if busca and local



?>
</table>

<?php
if ($busca == "*"){
	
          $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "control";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
          $busqueda = "SELECT * FROM gestion";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);	
	
	
?>
<table width="100%" border="1" align="center" >
   <tr>
    <td align="center"><b>Folio</b></td> 
     <td align="center"><b>Tipo de entrada</b></td>   
     <td align="center"><b>Fecha</b></td>            
     <td align="center"><b>Remitente</b></td>
     <td align="center"><b>Asunto</b></td>
     <td align="center"><b>Número de referencia</b></td>     
     <td align="center"><b>SEM</b></td>
     <td align="center"><b>Local</b></td>     
     
     
   </tr>
 
<?php

while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['fechas']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY	
	
echo '<tr>';
echo '<td>'.$f['folio'].'</td>';
echo '<td>'.$f['tema'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['remitente2'].'</td>';
echo '<td>'.$f['asunto'].'</td>';
echo '<td>'.$f['guia'].'</td>';
echo '<td>'.$f['sem']. '&cedil; &nbsp;' .$f['sem1'].'</td>';
echo '<td>'.$f['local']. '&cedil; &nbsp;' .$f['local1'].'</td>';
echo '</tr>';
}

echo '<tr>';
echo '<td colspan="9">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

}// if busca *

?>
</table>



<table align="right">
<tr>
<td colspan="8" align="right">
<input type="button" value="Regresar al Control de Gestión" onClick="window.location = 'http://192.168.39.31/intranet/index.php/busqueda-control';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input align="right" type="button" value="Regresar a busqueda del Control" onClick="window.location = 'http://192.168.39.31/intranet/index.php/busqueda-control';"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type="button" name="imprimir" value="Imprimir" onclick="window.print();">


</td>
</tr>
</table>




</div>
</body>
</html>