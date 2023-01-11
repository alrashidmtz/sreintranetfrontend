<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Page</title>
</head>

<body>
<?php


$busca="";
 
$busca = (isset($_GET['busca']) ? $_GET['busca'] : null); 



if (isset($_GET['busca']) and empty($_GET['busca'])){
echo "Debes escribir una palabra para realizar la busqueda";
}



         if ($busca){
			 
			 
			 	
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
		  
          $busqueda = "SELECT * FROM solicitud WHERE Folio LIKE ".$busca." ";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);
		  mysqli_close($con);	
		  
		  
		 
		  
	?>
    
  <table width="100%" align="center" cellpadding="10px" bordercolor="#000000"  style=" border-style: solid"  >  
    
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


echo '<tr>';
echo '<td align="right" colspan="2">FOLIO&nbsp;'.$f["folio"].'</td>';
echo '</tr>';



echo '<tr>';
echo '<td width="30%" align="center"><img src="http://192.168.39.31/intranet/images/General/logovertical.png" width="130px" height="150px" /></td>';

echo'<td width="70%" align="center"><b>SERVICIO EXTERIOR MEXICANO</b><BR />
<b>CONSULADO GENERAL DE M&Eacute;XICO EN RALEIGH, CAROLINA DEL NORTE</b><BR />
SOLICITUD DE COPIA CERTIFICADA DE ACTA DE NACIMIENTO<BR />EXPEDIDA EN LA REP&Uacute;BLICA MEXICANA
</td>';
echo '</tr>';



echo '<tr>';
echo '<td>&nbsp;</td>';
echo '<td align="right">FECHA:'.$Date.'<BR/>NO. DE SOLICITUD:&nbsp;'.$f["solicitud"].'<BR/>CANTIDAD DE ACTAS:' .$f["cantidad"].'</td>';
echo '</tr>';


echo '<tr>';
echo '<td colspan="2" align="left">IDENTIFICACI&Oacute;N OFICIAL QUE PRESENTA:&nbsp;&nbsp;'.$f["identificacion"].'</td>';
echo '</tr>';


echo '<tr>';
echo '<td colspan="2" >1.- CURP (SI LA TIENE):&nbsp;'.$f["curp"].'</td>';
echo '</tr>';


echo '<tr>';
echo'<td colspan="2" >2.- NOMBRE COMPLETO:&nbsp;'.$f["nombre"].'</td>';
echo '</tr>';


echo '<tr>';
echo '<td colspan="2" >3.- SEXO:&nbsp;'.$f["sexo"].'</td>';
echo '</tr>';


echo '<tr>';
echo '<td colspan="2" >4.- ESTADO DE LA REP&Uacute;BLICA DONDE FUE REGISTRADO:&nbsp;'.$f["estado"].'</td>';
echo '</tr>';

echo '<tr>';
echo '<td colspan="2" >5.- LUGAR DE NACIMIENTO:&nbsp;' .$f["pais"].',&nbsp;' .$f["provincia"]. 
'&nbsp;  FECHA DE NACIMIENTO:&nbsp;' .$Dateb.'</td>';        
echo '</tr>';



echo '<tr>';
echo '<td colspan="2" >6.- NOMBRES DEL PADRE:&nbsp;' .$f["padre"].'<br /><br />NOMBRES DE LA MADRE:&nbsp;' .$f["madre"].'</td>';
echo '</tr>';



echo '<tr>';
echo '<td colspan="2" >7.- DOMICILIO ACTUAL:&nbsp;' .$f["domicilio"].'</td>';
echo '</tr>';



echo '<tr>';
echo'<td colspan="2" >8.- N&Uacute;MERO DE TEL&Eacute;FONO (FIJO O CELULAR):&nbsp;' .$f["telefono"].'</td>';
echo '</tr>';


echo '<tr>';
echo '<td colspan="2" >9.- CORREO ELECTR&Oacute;NICO:&nbsp;' .$f["email"].'<br /><br /><br /></td>';
echo '</tr>';



echo '<tr>';
echo '<td colspan="2" align="center" >______________________________</td>';
echo '</tr>';

echo '<tr>';
echo'<td colspan="2" align="center" >FIRMA DEL SOLICITANTE<br /><br /></td>';
echo '</tr>';



echo '<tr>';
echo '<td width="50%" align="center">&nbsp;'.$f['pspi'].'<br/>
PSPI QUE REALIZA EL TR&Aacute;MITE <br />
</td>';
        
echo'<td width="50%"align="center" >&nbsp;'.$f['sem'].'<br/>
AUTORIZACI&Oacute;N DEL SUPERVISOR PARA IMPRESI&Oacute;N<br />
</td>';
echo '</tr>';



}
		 }
  ?>   
   
    
</table>



<p align="right"><button onclick="window.location.href='http://192.168.39.31/intranet/index.php/solicitud-actas-de-nacimiento/reimpresion-de-actas-de-nacimiento'">Nueva reimpresión</button>

<input name="imprimir" type="button" id="imprimir" onClick="parent.print()" value="Imprimir" ></p>
























</body>
</html>