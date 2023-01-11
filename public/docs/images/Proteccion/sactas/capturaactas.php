<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">

body { background:#f2f2f2; width:100%;}

table {
width: 100%;
text-align: center;
border-collapse: collapse; }
 

th { 
padding: 8px; 
background: #b9c9fe; 
border-top: 4px solid #aabcfe;
border-bottom: 1px solid #fff; color: #039; }


td { 
padding: 8px; 
background: #e8edff; 
border-bottom: 1px solid #fff; 
color: #669; 
border-top: 1px solid transparent; }


tr:hover td { 
background: #d0dafd; 
color: #339; }


.editar {
color: blue; 
cursor:pointer;}


#contenedorForm {
margin-left: 45px;}
 

.boton {
color: black; 
padding: 5px; 
margin: 10px;
background-color: #b9c9fe; }

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Captura de Actas Administrativas</title>
</head>
<body>

<div align="center" id="cuadro">

<form action="http://locahost/intranet/index.php?option=com_content&view=article&id=61" method="post">
<table align="center" >
<tr>
<td colspan="2">
<?php
if (isset($_SESSION['exito']))
{
echo "<b style='font-size:18px'><center>".$_SESSION['exito']."</font></center></b>";
} 

else {
	
	echo "";
	
	}
unset($_SESSION['exito']);
?>
</td>
</tr>
  <tr>
  <th colspan="2"><h2 align="center">ACTAS ADMINISTRATIVAS</h2></th>
  </tr>
  <tr>
    <td align="center">No.
    <?php 	
	  include ("conexion.php");
		  
      $con = new mysqli($host,$user,$pw,$base);
	  
	   if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
			  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);  
		  
          $queryb = "SELECT MAX(Id) + 1 FROM actas_administrativas";
		  $result = $con->query($queryb);
		  
		 		 if ($rowb = mysqli_fetch_row($result))
                     {
                        $idb = trim($rowb[0]);
                     }
					 
													 
                      echo "<br><br><b style='font-size:36px'>FIA-00$idb-19</b>";	
	  	 
    ?>
    </td>
    
    <td align="center">Fecha:<input type="date" name="fecha" min="2016-01-01" max="2030-12-31" step="0">
    <br />
      <b style="color: #F00">
      <?php	 
	  if (isset($_SESSION['ERROR1']))
	  {
		  echo ($_SESSION['ERROR1']);
	  } 
	  
	  else {		  
		  echo "";	  
	  }
	  
	  unset ($_SESSION['ERROR1']);
	  ?>
      </b>
    </td>
  </tr>
  
  <tr>
    <td align="center" colspan="2">Asunto:<br />    
      <textarea name="asunto" rows="5" cols="50" style="width:auto;"></textarea>
      <br />
      <b style="color: #F00">
      <?php	 
	  if (isset($_SESSION['ERROR2']))
	  {
		  echo ($_SESSION['ERROR2']);
	  } 
	  
	  else {		  
		  echo "";	  
	  }
	  
	  unset ($_SESSION['ERROR2']);
	  ?>
      </b>
     </td>
  </tr>
   
  <tr>
    <td align="center">Funcionario<br/>    
      <select name="funcionario">
        <option value="">SELECCIONE</option>
        <option value="	MARIA DEL ROCIO VAZQUEZ ALVAREZ">MARIA DEL ROCIO VAZQUEZ ALVAREZ</option>
		<option value="	SEBASTIAN ALFONSO GALVAN DUQUE COVARRUBIAS">SEBASTIAN ALFONSO GALVAN DUQUE COVARRUBIAS</option>
		<option value="	PAULA ELIZABETH LUCANO GOMEZ">PAULA ELIZABETH LUCANO GOMEZ</option>
		<option value="	MARCO ANTONIO FONTANEL MORALES">MARCO ANTONIO FONTANEL MORALES</option>
      </select>
    <br />
      <b style="color: #F00">
      <?php	 
	  if (isset($_SESSION['ERROR3']))
	  {
		  echo ($_SESSION['ERROR3']);
	  } 
	  
	  else {		  
		  echo "";	  
	  }
	  
	  unset ($_SESSION['ERROR3']);
	  ?>
      </b>     
       <td align="center">Departamento<br/>    
      <select name="departamento">
        <option value="">SELECCIONE</option>
        <option value="PROTECCION">PROTECCION</option>
        <option value="ASUNTOS COMUNITARIOS">ASUNTOS COMUNITARIOS</option>
        <option value="DOCUMENTACION">DOCUMENTACION</option>
        <option value="ADMINISTRACION">ADMINISTRACION</option>
        <option value="CONSULADO MOVIL">CONSULADO SOBRE RUEDAS</option>
        <option value="OFICINA DE LA CG">OFICINA DE LA CG</option>
        <option value="OFICINA DE LA CA">OFICINA DE LA CA</option>
        <option value="INFORMATICA">INFORMATICA</option>        
      </select>
    <br />
      <b style="color: #F00">
      <?php	 
	  if (isset($_SESSION['ERROR4']))
	  {
		  echo ($_SESSION['ERROR4']);
	  } 
	  
	  else {		  
		  echo "";	  
	  }
	  
	  unset ($_SESSION['ERROR4']);
	  ?>
      </b>
      </td>
  </tr>
  
  <tr>
     <td colspan="4" align="right">
     <input type="button" onclick="document.location.reload();" value="Nuevo" name="http://locahost/intranet/index.php/actas-administrativas" />       &nbsp;&nbsp;&nbsp;&nbsp;
     <input type="reset" value="Borrar información">&nbsp;&nbsp;&nbsp;&nbsp;
     <input type="submit" name="Guardar" value="Guardar">
     </td>
  </tr>
  
</table>
</form>

<?php
error_reporting(E_ALL & ~E_NOTICE); 
?>

</div>
</body>
</html>