<?php
session_start();
?>
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
<title>Actas Administrativas</title>
</head>

<body>
<?php

include ("conexion.php");

$con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);	
		  
$id = (isset($_POST['id']) ? $_POST['id'] : null);		  
$fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : null);
$asunto = (isset($_POST['asunto']) ? $_POST['asunto'] : null); 
$funcionario = (isset($_POST['funcionario']) ? $_POST['funcionario'] : null);
$departamento = (isset($_POST['departamento']) ? $_POST['departamento'] : null); 


$errores=array();


if ($fecha == "")
{
	$errores[]=true;
	$_SESSION['ERROR1']="DEBE DE SELECCIONAR UNA FECHA";
}

if ($asunto == "")
{
	$errores[]=true;
	$_SESSION['ERROR2']="DEBE DE ESCRIBIR EL ASUNTO";
	
}

if ($funcionario == "")
{
	$errores[]=true;
	$_SESSION['ERROR3']="DEBE DE SELECCIONAR UN FUNCIONARIO";
	
}

if ($departamento == "")
{
	$errores[]=true;
	$_SESSION['ERROR4']="DEBE DE SELECCIONAR UN DEPARTAMENTO";
	
}

if (count ($errores)>0)
{
	header('http://192.168.39.31/intranet/index.php/actas-administrativas');
	
	
	} 



if (isset($_POST['fecha']) and !empty($_POST['fecha'])  and
    isset($_POST['asunto']) and !empty($_POST['asunto']) and
	isset($_POST['funcionario']) and !empty($_POST['funcionario']) and
	isset($_POST['departamento']) and !empty($_POST['departamento']) 
	
	 
   ) {    
          
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);

$sql = "INSERT INTO actas_administrativas(Fecha,Asunto,Funcionario,Departamento) VALUES ('$fecha','$asunto','$funcionario','$departamento')"; 
mysqli_query($con,$sql);
mysqli_close($con); 



$_SESSION['exito']="Se guardo la información correctamente";
		header('http://192.168.39.31/intranet/index.php/actas-administrativas');
		
	  }	
	  
	  
	  header('location:http://192.168.39.31/intranet/index.php/actas-administrativas');
   
?>		  
		 

   
   





</body>
</html>