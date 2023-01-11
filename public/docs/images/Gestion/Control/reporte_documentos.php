<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte entrega de documentos</title>
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
<form name="form1" method="post" action="http://192.168.39.31/intranet/images/Gestion/control/reporte_excel.php" >
<tr>
<th colspan="4"><h2 align="center">Reporte entrega de documentos</h2></th>
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
<input type="checkbox" name="postal" value="postal"  />CORREO POSTAL<br />
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
<input type="submit" name="Buscar" value="Exportar a Excel" />&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="Borrar información">&nbsp;&nbsp;&nbsp;&nbsp;
<!--<input type="button" value="Exportar a excel" onClick="window.location = 'http://192.168.39.31/intranet/images/Gestion/control/reporte_excel.php';">-->
</td>
</tr>
</form>
</table>
</div>

</body>
</html>