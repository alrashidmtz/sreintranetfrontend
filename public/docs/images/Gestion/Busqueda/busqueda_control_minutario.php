<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Búsqueda Control/Minutario</title>
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

<form action="http://192.168.39.31/intranet/images/Gestion/Busqueda/control_minutario.php" method="post" >
<table>
<tr>
<td align="center"><h2 align="center">Búsqueda por asunto en el Minutario y en el Control de Gestion</h2>
</td>
</tr>

<tr>
<td align="center">
<input name="asuntomc" type="text" />
</td>
</tr>

<tr>
  <td colspan="4" align="right"><input type="reset" value="Borrar información">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Buscar" value="Buscar"></td>
  </tr>
  

</table>

</form>

</body>
</html>