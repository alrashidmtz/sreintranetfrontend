<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Búsqueda de Minutario</title>
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
<form name="form1" method="post" action="http://192.168.39.31/intranet/images/Gestion/Minutario/resultadominutario.php" >
  <tr>
  <th colspan="4"><h2 align="center">B&Uacute;SQUEDA EN EL MINUTARIO</h2></th>
  </tr>
  <tr>
  <th><img src="images/Gestion/control/instrucciones.png" 
  title="1.- Seleccione el tipo de busqueda que quiere realizar.
       2.- Escriba el n&uacute;mero o la palabra a buscar.
	   3.- Presione el boton buscar.
	   En caso de seleccionar por RLG solo necesita poner el n&uacute;mero.
	   En caso de seleccionar por fecha capture la fecha en el siguiente formato dd/mm/yyyy si el día o el mes es de un solo digito, coloque un cero &quot;0&quot; a la izquierda Ejemplo: &quot;01/06/2017&quot;"
   alt="1.- Seleccione el tipo de busqueda que quiere realizar.
       2.- Escriba el n&uacute;mero o la palabra a buscar.
	   3.- Presione el boton buscar.
	   En caso de seleccionar por RLG solo necesita poner el n&uacute;mero.
	   En caso de seleccionar por fecha capture la fecha en el siguiente formato dd/mm/yyyy si el día o el mes es de un solo digito, coloque un cero &quot;0&quot; a la izquierda Ejemplo: &quot;01/06/2017&quot;"    
       />
  </th>
  </tr>
<tr>
<th align="center">
  <input type="radio" name="rlg" value="rlg">FIA
  <input type="radio" name="fecha" value="fecha">Fecha
  <input type="radio" name="referencia" value="referencia"> Referencia
  <input type="radio" name="documento" value="documento"> Documento
  <input type="radio" name="asunto" value="asunto"> Asunto
  <input type="radio" name="sem" value="sem"> SEM
  <input type="radio" name="local" value="local"> Local
</th>
</tr>
<tr>
<td align="center">
   <input name="busca" type="text" autocomplete="off">
   <input type="submit" name="Submit" value="Buscar" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Borrar información">
   </form>
</td>
</tr>
</table>


</body>
</html>