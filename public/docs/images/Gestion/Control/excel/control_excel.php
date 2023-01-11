<?php

$excel = (isset($_POST['excel']) ? $_POST['excel'] : null);
$excel1 = (isset($_POST['excel1']) ? $_POST['excel1'] : null);
$excel2 = (isset($_POST['excel2']) ? $_POST['excel2'] : null);
$excel3 = (isset($_POST['excel3']) ? $_POST['excel3'] : null);
$excel4 = (isset($_POST['excel4']) ? $_POST['excel4'] : null);
$excel5 = (isset($_POST['excel5']) ? $_POST['excel5'] : null);
$excel6 = (isset($_POST['excel6']) ? $_POST['excel6'] : null);



$excel=$_POST['export'];
header("Content-type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
header("Content-Disposition: attachment; filename=Resultados_minutario.xls");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Búsqueda en el Control de Gestión</title>
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
<table width="100%" border="1" align="center" >
   <tr>
     <td align="center"><b>Tipo de entrega</b></td>   
     <td align="center"><b>Fecha de recibido</b></td>            
     <td align="center"><b>Remitente</b></td>
     <td align="center"><b>Asunto</b></td>
     <td align="center"><b>N&uacute;mero de Referencia</b></td>     
     <td align="center"><b>SEM</b></td>
     <td align="center"><b>Local</b></td>  
   </tr>
   

<?php
echo "$excel";
/*echo "$excel1";
echo "$excel2";
echo "$excel3";
echo "$excel4";
echo "$excel5";
echo "$excel6";*/

//print $excel;
?>
</table> 
</div>
</body>
</html>
