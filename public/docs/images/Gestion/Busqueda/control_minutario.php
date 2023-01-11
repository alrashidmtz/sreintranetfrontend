<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Valida Control/Minutario</title>
<style type="text/css">
body{width:90%;margin:auto;min-width:600px;max-width:2000px}

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

<?php

$asuntomc = (isset($_POST['asuntomc']) ? $_POST['asuntomc'] : null);


if ($asuntomc){
	
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
		  
          $busqueda = "SELECT * FROM gestion WHERE asunto LIKE '%".$asuntomc."%' ORDER BY fechas ASC";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);	
	
	
?>
<table width="100%" border="1" align="center" >
   <tr>
   <td><h2 align="center">Control de Gestion</h2></td>
   
   </tr>

   <tr>
     <td align="center"><b>Asunto</b></td>
     <td align="center"><b>Folio</b></td>    
     <td align="center"><b>Tipo de entrega</b></td>   
     <td align="center"><b>Fecha</b></td> 
     <td align="center"><b>Remitente</b></td>  
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
echo '<td>'.$f['asunto'].'</td>';
echo '<td>'.$f['folio'].'</td>';
echo '<td>'.$f['tema'].'</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['remitente2'].'</td>';
echo '<td>'.$f['guia'].'</td>';
echo '<td>'.$f['sem']. '&cedil; &nbsp;' .$f['sem1'].'</td>';
echo '<td>'.$f['local']. '&cedil; &nbsp;' .$f['local1'].'</td>';
echo '</tr>';
}

echo '<tr>';
echo '<td colspan="10">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';



?>
</table>


  <?php

          $host1 = "localhost";
          $user1 = "root";
          $pw1 = "";
          $base1 = "minutario";
          $con1 = new mysqli($host1,$user1,$pw1,$base1);
		  
		  if ($con1->connect_error){
			  die("Connection failed: " . $con1->connect_error);
		  }
		  
		  
		  $codigo1 = "SET NAMES 'utf8'";
		  $resulta1 = $con1->query($codigo1);
		  
          $busqueda1 = "SELECT * FROM info_minutario WHERE asunto LIKE '%".$asuntomc."%' ORDER BY FECHA ASC";
		  $rbusqueda1 = mysqli_query($con1,$busqueda1);
          $total1 = mysqli_num_rows($rbusqueda1);
		  mysqli_close($con1);	
	
	
?>
<table width="100%" border="1" align="center" >
   <tr>
   <td><h2 align="center">Minutario</h2></td>
   
   </tr>

   <tr>
     <td align='center'><b>Asunto</b></td>
     <td align='center'><b>Referencia</b></td>
     <td align='center'><b>Folio</b></td>
     <td align='center'><b>Fecha</b></td>     
     <td align='center'><b>Documento</b></td>    
     <td align='center'><b>SICAR</b></td>
     <td align='center'><b>Elaboró SEM</b></td>
     <td align='center'><b>Elaboró Local</b></td>    
     
     
   </tr>
 
<?php

while($f=mysqli_fetch_array($rbusqueda1)){
	
$parts = explode('-', $f['FECHA']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY	
	
	
echo "
     <tr>
	 <td>$f[ASUNTO]</td>
	 <td>$f[REFERENCIA]</td>
     <td>$f[ID]</td>
     <td>$Date</td>     
	 <td>$f[DOCUMENTO]</td>     
     <td>$f[SICAR]</td>
     <td>$f[SEM]</td>
     <td>$f[LOCAL]</td>
    ";
}

echo '<tr>';
echo '<td colspan="9">Número de elementos encontrados: <b>'.$total1.'</b></td>';
echo '</tr>';


}
?>
</table>



<table align="right">
<tr>
<td colspan="8" align="right">
<input type="button" value="Regresar a la busqueda  Control/Minutario" onClick="window.location = 'http://192.168.39.31/intranet/index.php/busqueda-control-minutario';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type="button" name="imprimir" value="Imprimir" onclick="window.print();"></td>
</tr>
</table>

</body>
</html>