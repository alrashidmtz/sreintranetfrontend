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
 
$busca = (isset($_GET['busca']) ? $_GET['busca'] : null); 
$folio = (isset($_GET['folio']) ? $_GET['folio'] : null);
$ID = (isset($_GET['ID']) ? $_GET['ID'] : null);
$tema = (isset($_GET['tema']) ? $_GET['tema'] : null);
$fecha = (isset($_GET['fechas']) ? $_GET['fechas'] : null);
$horas = (isset($_GET['horas']) ? $_GET['horas'] : null);
$fechar = (isset($_GET['fechar']) ? $_GET['fechar'] : null);
$guia = (isset($_GET['guia']) ? $_GET['guia'] : null);
$remitente = (isset($_GET['remitente2']) ? $_GET['remitente2'] : null);
$asunto = (isset($_GET['asunto']) ? $_GET['asunto'] : null);
$sicar = (isset($_GET['sicar']) ? $_GET['sicar'] : null);
$sem = (isset($_GET['sem']) ? $_GET['sem'] : null);
$local = (isset($_GET['local']) ? $_GET['local'] : null);
$sem1 = (isset($_GET['sem1']) ? $_GET['sem2'] : null);
$local1 = (isset($_GET['local1']) ? $_GET['local1'] : null);





if (isset($_GET['busca']) and empty($_GET['busca'])){
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
		  
          $busqueda = "SELECT * FROM gestion WHERE Folio LIKE '%".$busca."%' ";
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

}// if busca and folio

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
		  
          $busqueda = "SELECT * FROM gestion WHERE fechas LIKE '%".$newDate."%' ";
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
		  
		  $url = "http://192.168.39.31/intranet/images/Gestion/control/resultadobusqueda.php";
		  
		  $query = "SELECT count(*) from gestion";
          $result = mysqli_query($con,$query);
          $row=mysqli_fetch_array($result);
          
   $totrecords = $row[0];
   	
	 if (!isset ($_GET['page']))
  
  $thispage = 1;
   
       else
  
       $thispage = $_GET['page'];
   
       $recordsperpage = 200;
   
       $offset = ($thispage -1) * $recordsperpage;
	   
	   $totpages = ceil($totrecords / $recordsperpage);  
		  
          $busqueda = "SELECT * FROM gestion ORDER BY Folio ASC LIMIT $offset,$recordsperpage";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);	
	
	
?>
<table width="100%" border="1" align="center" >
   <tr>
     <td align="center"><b>Folio</b></td> 
     <td align="center"><b>Tipo de entrega</b></td>   
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
echo '<td colspan="2">Número de elementos encontrados por página: <b>'.$total.'</b></td>';
echo '<td colspan="2">Número total de elementos encontrados:<b> '.$totrecords.'</b></td>';
echo '<td colspan="1">Página<b> '.$thispage.' de ' .$totpages.' </b></td>';




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