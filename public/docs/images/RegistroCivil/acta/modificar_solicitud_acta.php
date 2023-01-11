<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
body { background:#f2f2f2; width:100%;}

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
    
}

th, td {
    padding: 15px;
}

.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 14px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #F00;
  background-color: #CCC;
  border: none;
  border-radius: 15px;
  box-shadow: 0 3px 3px #000;
}

.button:hover {background-color: #FFF}

.button:active {
  background-color: #333;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar Solicitud de Acta</title>
</head>

<body>
<table align="center">
<form action="http://192.168.39.31/intranet/index.php?option=com_content&view=article&id=69" method="post">

<tr>
<td align="center" colspan="2"><span style="font-size:20px;">Intoduce el <b style="color:#F00; font-size:24px;">Folio</b> a buscar</span><br /><br /><input type="text" name="folio"/> </td>
</tr>


<tr>
<td align="center"><input class="button" name="actualizar" type="submit" value="Buscar"/>
</form>


</table>






</body>
</html>