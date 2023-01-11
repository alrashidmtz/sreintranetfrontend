<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resultado Minutario</title>
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
$rlg = (isset($_POST['rlg']) ? $_POST['rlg'] : null);
$fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : null);
$referencia = (isset($_POST['referencia']) ? $_POST['referencia'] : null);
$documento = (isset($_POST['documento']) ? $_POST['documento'] : null);
$asunto = (isset($_POST['asunto']) ? $_POST['asunto'] : null);
$sem = (isset($_POST['sem']) ? $_POST['sem'] : null);
$local = (isset($_POST['local']) ? $_POST['local'] : null);


if (isset($_POST['busca']) and empty($_POST['busca']) and !isset($_POST['instrucciones'])){
echo "Debes escribir una palabra para realizar la busqueda";
}

 
if ($busca and $rlg){
		
          $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "minutario";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
$busqueda = "SELECT * FROM info_minutario WHERE id LIKE '%".$busca."%'";
$rbusqueda = mysqli_query($con,$busqueda);

$total = mysqli_num_rows($rbusqueda);
mysqli_close($con);

 
?>

 <table width='100%' border='1' align='center' >
     <tr>
     <td align='center'><b>FIA</b></td>
     <td align='center'><b>Fecha</b></td>
     <td align='center'><b>Referencia</b></td>
     <td align='center'><b>Documento</b></td>
     <td align='center'><b>Asunto</b></td>
     <td align='center'><b>SICAR</b></td>
     <td align='center'><b>Elaboró SEM</b></td>
     <td align='center'><b>Elaboró Local</b></td>
     </tr>	
     
<?php

while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['FECHA']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY	
	
echo "
     <tr>
     <td>$f[ID]</td>
     <td>$Date</td>
     <td>$f[REFERENCIA]</td>
	 <td>$f[DOCUMENTO]</td>
     <td>$f[ASUNTO]</td>
     <td>$f[SICAR]</td>
     <td>$f[SEM]</td>
     <td>$f[LOCAL]</td>
    ";
}

echo '<tr>';
echo '<td colspan="8">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

}// if busca and rlg 
 
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
          $base = "minutario";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
          $busqueda = "SELECT * FROM info_minutario WHERE fecha LIKE '%".$newDate."%'";
          $rbusqueda = mysqli_query($con,$busqueda); 
		  $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);

?>
<table width="100%" border="1" align="center" >
   <tr>
     <td align="center"><b>Fecha</b></td>  
     <td align="center"><b>FIA</b></td>     
     <td align="center"><b>Referencia</b></td>
     <td align="center"><b>Documento</b></td>
     <td align="center"><b>Asunto</b></td>
     <td align="center"><b>SICAR</b></td>
     <td align="center"><b>Elaboró SEM</b></td>
     <td align="center"><b>Elaboró Local</b></td>
   </tr>
 
<?php

while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['FECHA']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY		
	
echo '<tr>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['ID'].'</td>';
echo '<td>'.$f['REFERENCIA'].'</td>';
echo '<td>'.$f['DOCUMENTO'].'</td>';
echo '<td>'.$f['ASUNTO'].'</td>';
echo '<td>'.$f['SICAR'].'</td>';
echo '<td>'.$f['SEM'].'</td>';
echo '<td>'.$f['LOCAL'].'</td>';
echo '</tr>';
}

echo '<tr>';
echo '<td colspan="8">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

if ($fecha!="" and $total==0){	
echo "Capture la fecha en el siguiente formato dd/mm/YYYY</br>en caso de de que el día o el mes sea de un solo digito, coloque un cero &quot;0&quot; a la izquierda Ejemplo: &quot;01&quot;";	
}

}// if busca and fecha

	
?>

</table>


<?php
if ($busca and $referencia){
	
          $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "minutario";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
          $busqueda = "SELECT * FROM info_minutario WHERE referencia LIKE '%".$busca."%'";
          $rbusqueda = mysqli_query($con,$busqueda);
		  $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);

?>
<table width="100%" border="1" align="center" >
   <tr>
     <td align="center"><b>Referencia</b></td>
     <td align="center"><b>Fecha</b></td>  
     <td align="center"><b>FIA</b></td>    
     <td align="center"><b>Documento</b></td>
     <td align="center"><b>Asunto</b></td>
     <td align="center"><b>SICAR</b></td>
     <td align="center"><b>Elaboró SEM</b></td>
     <td align="center"><b>Elaboró Local</b></td>
   </tr>
 
<?php

while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['FECHA']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY		
	
echo '<tr>';
echo '<td>'.$f['REFERENCIA'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['ID'].'</td>';
echo '<td>'.$f['DOCUMENTO'].'</td>';
echo '<td>'.$f['ASUNTO'].'</td>';
echo '<td>'.$f['SICAR'].'</td>';
echo '<td>'.$f['SEM'].'</td>';
echo '<td>'.$f['LOCAL'].'</td>';
echo '</tr>';
}
echo '<tr>';
echo '<td colspan="8">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';
}// if busca and referencia

?>

</table>

<?php
if ($busca and $documento){
	
          $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "minutario";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
          $busqueda = "SELECT * FROM info_minutario WHERE documento LIKE '%".$busca."%'";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);
		  
?>
<table width="100%" border="1" align="center" >
   <tr>
    <td align="center"><b>Documento</b></td>
     <td align="center"><b>Referencia</b></td>
     <td align="center"><b>Fecha</b></td>  
     <td align="center"><b>FIA</b></td>    
     <td align="center"><b>Asunto</b></td>
     <td align="center"><b>SICAR</b></td>
     <td align="center"><b>Elaboró SEM</b></td>
     <td align="center"><b>Elaboró Local</b></td>
   </tr>
 
<?php

while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['FECHA']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY		
	
echo '<tr>';
echo '<td>'.$f['DOCUMENTO'].'</td>';
echo '<td>'.$f['REFERENCIA'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['ID'].'</td>';
echo '<td>'.$f['ASUNTO'].'</td>';
echo '<td>'.$f['SICAR'].'</td>';
echo '<td>'.$f['SEM'].'</td>';
echo '<td>'.$f['LOCAL'].'</td>';
echo '</tr>';
}
echo '<tr>';
echo '<td colspan="8">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';
}// if busca and documento

?>

</table>

<?php
if ($busca and $asunto){
	
         $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "minutario";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
         $busqueda = "SELECT * FROM info_minutario WHERE asunto LIKE '%".$busca."%'";
		 $rbusqueda = mysqli_query($con,$busqueda);
         $total = mysqli_num_rows($rbusqueda);
		 mysqli_close($con);
		  
		  
?>
<table width="100%" border="1" align="center" >
   <tr>
    <td align="center"><b>Asunto</b></td>
     <td align="center"><b>Referencia</b></td>
     <td align="center"><b>Fecha</b></td>  
     <td align="center"><b>FIA</b></td>    
     <td align="center"><b>Documento</b></td>    
     <td align="center"><b>SICAR</b></td>
     <td align="center"><b>Elaboró SEM</b></td>
     <td align="center"><b>Elaboró Local</b></td>
   </tr>
 
<?php

while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['FECHA']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY		
	
echo '<tr>';
echo '<td>'.$f['ASUNTO'].'</td>';
echo '<td>'.$f['REFERENCIA'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['ID'].'</td>';
echo '<td>'.$f['DOCUMENTO'].'</td>';
echo '<td>'.$f['SICAR'].'</td>';
echo '<td>'.$f['SEM'].'</td>';
echo '<td>'.$f['LOCAL'].'</td>';
echo '</tr>';
}
echo '<tr>';
echo '<td colspan="8">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';
}// if busca and asunto

?>

</table>

<?php
if ($busca and $sem){
	
          $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "minutario";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
         $busqueda = "SELECT * FROM info_minutario WHERE sem LIKE '%".$busca."%'";
		 $rbusqueda = mysqli_query($con,$busqueda);
         $total = mysqli_num_rows($rbusqueda);
		 mysqli_close($con);

?>
<table width="100%" border="1" align="center" >
   <tr>
    <td align="center"><b>SEM</b></td>
    <td align="center"><b>Asunto</b></td>
     <td align="center"><b>Referencia</b></td>
     <td align="center"><b>Fecha</b></td>  
     <td align="center"><b>FIA</b></td>    
     <td align="center"><b>Documento</b></td>    
     <td align="center"><b>Elaboró SICAR</b></td>    
     <td align="center"><b>Elaboró Local</b></td>
   </tr>
 
<?php

while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['FECHA']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY		
	
echo '<tr>';
echo '<td>'.$f['SEM'].'</td>';
echo '<td>'.$f['ASUNTO'].'</td>';
echo '<td>'.$f['REFERENCIA'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['ID'].'</td>';
echo '<td>'.$f['DOCUMENTO'].'</td>';
echo '<td>'.$f['SICAR'].'</td>';
echo '<td>'.$f['LOCAL'].'</td>';
echo '</tr>';
}
echo '<tr>';
echo '<td colspan="8">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';
}// if busca and sem

?>



</table>

<?php
if ($busca and $local){
	
          $host = "localhost";
		  $user = "root";
          $pw = "";
          $base = "minutario";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
          $busqueda = "SELECT * FROM info_minutario WHERE local LIKE '%".$busca."%'";
          $rbusqueda = mysqli_query($con,$busqueda);
		  $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);
		  

?>
<table width="100%" border="1" align="center" >
   <tr>
     <td align="center"><b>Local</b></td>    
     <td align="center"><b>Asunto</b></td>
     <td align="center"><b>Referencia</b></td>
     <td align="center"><b>Fecha</b></td>  
     <td align="center"><b>FIA</b></td>    
     <td align="center"><b>Documento</b></td>    
     <td align="center"><b>Elaboró SICAR</b></td>
      <td align="center"><b>Elaboró SEM</b></td>       
   </tr>
 
<?php

while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['FECHA']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY		
	
echo '<tr>';
echo '<td>'.$f['LOCAL'].'</td>';
echo '<td>'.$f['ASUNTO'].'</td>';
echo '<td>'.$f['REFERENCIA'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['ID'].'</td>';
echo '<td>'.$f['DOCUMENTO'].'</td>';
echo '<td>'.$f['SICAR'].'</td>';
echo '<td>'.$f['SEM'].'</td>';
echo '</tr>';
}
echo '<tr>';
echo '<td colspan="8">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';
}// if busca and local

?>

</table>

<?php
if ($busca == "*"){
	
          $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "minutario";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
          $busqueda = "SELECT * FROM info_minutario";
          $rbusqueda = mysqli_query($con,$busqueda);
		  $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);
		  

?>
<table width='100%' border='1' align='center' >
     <tr>
     <td align='center'><b>FIA</b></td>
     <td align='center'><b>Fecha</b></td>
     <td align='center'><b>Referencia</b></td>
     <td align='center'><b>Documento</b></td>
     <td align='center'><b>Asunto</b></td>
     <td align='center'><b>SICAR</b></td>
     <td align='center'><b>Elaboró SEM</b></td>
     <td align='center'><b>Elaboró Local</b></td>
     </tr>	
     
<?php

while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['FECHA']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY	
	
		
echo '<tr>';
echo '<td>'.$f['ID'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['REFERENCIA'].'</td>';
echo '<td>'.$f['DOCUMENTO'].'</td>';
echo '<td>'.$f['ASUNTO'].'</td>';
echo '<td>'.$f['SICAR'].'</td>';
echo '<td>'.$f['SEM'].'</td>';
echo '<td>'.$f['LOCAL'].'</td>';
echo '</tr>';

    
}

echo '<tr>';
echo '<td colspan="8">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

}// if busca *

?>



</table>

<table align="right">
<tr>
<td colspan="8" align="right">
<input type="button" value="Regresar al Minutario" onClick="window.location = 'http://192.168.39.31/intranet/index.php/minutario';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type="button" value="Regresar a Busqueda en el Minutario" onClick="window.location = 'http://192.168.39.31/intranet/index.php/busqueda';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type="button" name="imprimir" value="Imprimir" onclick="window.print();"></td>



</tr>
</table>
</div>































</body>
</html>