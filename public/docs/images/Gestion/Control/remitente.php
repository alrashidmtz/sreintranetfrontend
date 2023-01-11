<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Caegar Remitente</title>
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
<form action="" method="post">

<table>

<tr>
<td><h2 align="center">AGREGAR REMITENTE</h2></td>
</tr>
<tr>
<td align="center"> <input type="text" name="remitente2"  style="width:500px" /></td>
</tr>
<tr>
<td align="right"><input type="reset" value="Borrar información">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Guardar" value="Guardar"></td>
</tr>
</table>


<?php

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
		  
		  
$remitente2 = (isset($_POST['remitente2']) ? $_POST['remitente2'] : null);		

if (empty($_POST['remitente2'])){
		  
 echo "<b style='font-size:18px; color:#F00;'>Escriba el remitente que quiere agregar a la lista</b>";

} 

  

if (isset($_POST['Guardar']) and (isset($_POST['remitente2']) ? $_POST['remitente2'] : null)){
		  
$sql = "INSERT INTO remitente_nuevo (Remitente) VALUES ('$remitente2')";
$rsql = mysqli_query($con,$sql); 

 echo "<b style='font-size:18px; color:#F00;'>Se guardaron los datos correctamente</b>";

} 



?>


</form>
</div>











</body>
</html>