<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte recepción de documentos</title>
<script>
function selectToggle(toggle, form1) {
     var myForm = document.forms[form1];
     for( var i=0; i < myForm.length; i++ ) { 
          if(toggle) {
               myForm.elements[i].checked = "checked";
          } 
          else {
               myForm.elements[i].checked = "";
          }
     }
}</script>
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
<table align="center" cellpadding="10px">
<form name="form1" method="post" action="http://192.168.39.31/intranet/images/Gestion/control/reporte_documentos_r.php" >
<tr>
<th colspan="4"><h2 align="center">Reporte recepción de documentos</h2></th>
</tr> 

<tr>

<th align="left"><b style='color:#F00;'>Seleccione los Tipos de Entrada *</b><br /> 
Seleccionar <a href="javascript:selectToggle(true, 'form1');">Todos</a> | <a href="javascript:selectToggle(false, 'form1');">Ninguno</a><br /> 
<input type="checkbox" name="email" value="email"  />EMAIL INSTITUCIONAL<br />
<input type="checkbox" name="carta" value="carta"  />CARTA<br />
<input type="checkbox" name="fax" value="fax"  />FAX<br />
<input type="checkbox" name="nota" value="nota"  />NOTA<br />
<input type="checkbox" name="oficio" value="oficio"  />OFICIO<br />
<input type="checkbox" name="valija" value="valija"  />VALIJA<br />
<input type="checkbox" name="cpostal" value="cpostal"  />CORREO POSTAL<br />
<input type="checkbox" name="cheque" value="cheque"  />CHEQUE<br />
<input type="checkbox" name="factura" value="factura"  />FACTURA PROVEEDOR<br />
<input type="checkbox" name="preso" value="preso"  />CORRESPONDENCIA DE UN PRESO<br />
<input type="checkbox" name="mensajeria" value="mensajeria"  />MENSAJERIA<br />
<input type="checkbox" name="cgeneral" value="cgeneral"  />CGENERAL EMAIL<br />
<input type="checkbox" name="personal" value="personal"  />ENTREGA PERSONALMENTE<br />


</th>



 

<td align="center">
Ingrese la fecha del reporte a generar<br /> <br />   <input type="date" name="fechas" min="2016-01-01" max="2030-12-31" step="0">
</td>
</tr>
<tr>
<td colspan="2" align="right">   
<input type="submit" name="Buscar" value="Buscar" />&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="Borrar información">&nbsp;&nbsp;&nbsp;&nbsp;
</td>
</tr>
</form>
</table>
</div>

</body>
</html>


////////////////////////////////////////////////

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
<title>Resultado Reporte de Documentos</title>
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
$cpostal = (isset($_POST['cpostal']) ? $_POST['cpostal'] : null);
$cheque = (isset($_POST['cheque']) ? $_POST['cheque'] : null);
$factura = (isset($_POST['factura']) ? $_POST['factura'] : null);
$preso = (isset($_POST['preso']) ? $_POST['preso'] : null);
$mensajeria = (isset($_POST['mensajeria']) ? $_POST['mensajeria'] : null);
$cgeneral = (isset($_POST['cgeneral']) ? $_POST['cgeneral'] : null);
$personal = (isset($_POST['personal']) ? $_POST['personal'] : null);


if ($email == "" and $carta == "" and $fax == "" and $nota == "" and $oficio == "" and $valija == "" and $cpostal == "" and $cheque == "" and $factura == "" and $preso == "" and $mensajeria == "" and $cgeneral == "" and $personal == "" and $fechas == "")
{	
  echo "Debes de capturar los tipos de entrada y la fecha para realizar la búsqueda";
} 


if ($email and $carta and $fax and $nota and $oficio and $valija and $cpostal and $cheque and $factura and $preso and $mensajeria and $cgeneral and $personal)

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
		  
          $busqueda = "SELECT * FROM gestion WHERE fechas LIKE '%".$fechas."%' ";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);	

?>

<table width="100%" border="1" align="center" >
   <tr>
     <td align="center"><b>RLG</b></td> 
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
echo '<td>'.$f['ID'].'</td>';
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
echo '<td colspan="10">Número de elementos encontrados: <b>'.$total.'</b></td>';
echo '</tr>';

}// if

?>
</table>   


<?php

$reporte=array("$email","$carta","$fax","$nota","$oficio","$valija","$cpostal","$cheque","$factura","$preso","$mensajeria","$cgeneral","$personal");

echo "$reporte[0]";



?>
</div>
</body>
</html>