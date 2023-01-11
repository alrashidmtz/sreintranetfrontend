<?php
header("Content-type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
header("Content-Disposition: attachment; filename=Reporte_excel.xls");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte Entrega de Documentos Excel</title>
</head>

<body>
<div align="center" id="cuadro">
<?php
$fechas = (isset($_POST['fechas']) ? $_POST['fechas'] : null);
$email = (isset($_POST['email']) ? $_POST['email'] : null);
$carta = (isset($_POST['carta']) ? $_POST['carta'] : null);
$fax = (isset($_POST['fax']) ? $_POST['fax'] : null);
$nota = (isset($_POST['nota']) ? $_POST['nota'] : null);
$oficio = (isset($_POST['oficio']) ? $_POST['oficio'] : null);
$valija = (isset($_POST['valija']) ? $_POST['valija'] : null);
$postal = (isset($_POST['postal']) ? $_POST['postal'] : null);
$cheque = (isset($_POST['cheque']) ? $_POST['cheque'] : null);
$factura = (isset($_POST['factura']) ? $_POST['factura'] : null);
$preso = (isset($_POST['preso']) ? $_POST['preso'] : null);
$mensajeria = (isset($_POST['mensajeria']) ? $_POST['mensajeria'] : null);
$cgeneral = (isset($_POST['cgeneral']) ? $_POST['cgeneral'] : null);
$personal = (isset($_POST['personal']) ? $_POST['personal'] : null);


	
$reporte=array("$email","$carta","$fax","$nota","$oficio","$valija","$postal","$cheque","$factura","$preso","$mensajeria","$cgeneral","$personal");

$totalreporte = count($reporte);	

foreach ($reporte as $seleccion)

{

if ($seleccion and $fechas)
{
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
		  
          $busqueda = "SELECT * FROM gestion WHERE tema LIKE '%".$seleccion."%' AND fechas LIKE '%".$fechas."%'  ";
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
     <td align="center"><b>Firma</b></td> 
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
echo '<td>&nbsp;</td>';
echo '</tr>';


}

echo '<tr>';
if ($total == "0")
{
 echo '<td colspan="10"><b>No se encontraron resultados</b></td>';
}else

echo '<td colspan="10">Número de elementos encontrados: <b>'.$total.'</b></td>';

	
echo '</tr>';


	

}// if seleccion y fechas
}// foreach
?>
</table>   



</div>
</body>
</html>