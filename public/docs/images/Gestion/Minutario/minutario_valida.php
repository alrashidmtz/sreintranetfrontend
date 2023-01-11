<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Minutario Valida</title>
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

<?php
$fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : null);
$tipodocumento = (isset($_POST['tipodocumento']) ? $_POST['tipodocumento'] : null);
$rminutario = (isset($_POST['rminutario']) ? $_POST['rminutario'] : null); //referencia del minutario 
$rminutario = strtoupper($rminutario);
$asunto = (isset($_POST['asunto']) ? $_POST['asunto'] : null); 
$sicar = (isset($_POST['sicar']) ? $_POST['sicar'] : null);
$sem = (isset($_POST['sem']) ? $_POST['sem'] : null);
$local = (isset($_POST['local']) ? $_POST['local'] : null);
$Sinreferencia = $_POST['Sinreferencia'];


$errores=array();


if ($fecha == "")
{
	$errores[]=true;
	$_SESSION['ERROR1']="DEBE DE SELECCIONAR UNA FECHA";
	
}

if ($tipodocumento == "")
{
	$errores[]=true;
	$_SESSION['ERROR2']="DEBE DE SELECCIONAR UN DOCUMENTO";
	
}

if ($sicar == "")
{
	$errores[]=true;
	$_SESSION['ERROR3']="DEBE DE SELECCIONAR EL TEMA DEL SICAR";
	
}


if ($asunto == "")
{
	$errores[]=true;
	$_SESSION['ERROR4']="DEBE DE ESCRIBIR EL ASUNTO";
	
}

if ($rminutario == "" and $Sinreferencia == "")
{
	$errores[]=true;
	$_SESSION['ERROR5']="DEBE DE ESCRIBIR UNA REFERENCIA O SELECIONAR SIN REFERENCIA";
	
}

if (isset($_POST['rminutario']) and !empty($_POST['rminutario']) and 
    isset($_POST['Sinreferencia']) ? $_POST['Sinreferencia'] : null)
{
	$errores[]=true;
	$_SESSION['ERROR6']="DEBE ESCRIBIR SOLO LA REFERENCIA O SELECCIONAR SIN REFERENCIA";
	
}



if ($sem == "")
{
	$errores[]=true;
	$_SESSION['ERROR7']="DEBE DE SELECCIONAR AL PERSONAL DEL SEM";
	
}

if ($local == "")
{
	$errores[]=true;
	$_SESSION['ERROR8']="DEBE DE SELECCIONAR AL PERSONAL LOCAL";
	
}


if (count ($errores)>0)
{
	header('location:http://192.168.39.31/intranet/index.php/minutario');
	
	
	} 
	
	
	
	if (isset($_POST['rminutario']) and !empty($_POST['rminutario']) and
    isset($_POST['fecha']) and !empty($_POST['fecha'])  and
    isset($_POST['tipodocumento']) and !empty($_POST['tipodocumento']) and	
	isset($_POST['asunto']) and !empty($_POST['asunto']) and
	isset($_POST['sicar']) and !empty($_POST['sicar']) and
	isset($_POST['sem']) and !empty($_POST['sem']) and
	isset($_POST['local']) and !empty($_POST['local']) and
	$Sinreferencia == ""
	 
   ) {    
          $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "minutario";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);

$sql = "INSERT INTO info_minutario(fecha,referencia,documento,asunto,sicar,sem,local) VALUES ('$fecha','$rminutario','$tipodocumento','$asunto','$sicar','$sem','$local')"; 
mysqli_query($con,$sql);
mysqli_close($con); 



$_SESSION['exito']="Se guardo la información correctamente";
		header('location:http://192.168.39.31/intranet/index.php/minutario');
		
	  }
	  

	  
	  if (isset($_POST['Sinreferencia']) and
    isset($_POST['fecha']) and !empty($_POST['fecha'])  and
    isset($_POST['tipodocumento']) and !empty($_POST['tipodocumento']) and	
	isset($_POST['asunto']) and !empty($_POST['asunto']) and
	isset($_POST['sicar']) and !empty($_POST['sicar']) and
	isset($_POST['sem']) and !empty($_POST['sem']) and
	isset($_POST['local']) and !empty($_POST['local']) and
	$rminutario == ""
	
		 )	  
	  {    
          $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "minutario";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
		  
		  $queryb = "SELECT MAX(Id) + 1 FROM info_minutario";
		  $result = $con->query($queryb);
		  
		 		 if ($rowb = mysqli_fetch_row($result))
                     {
                        $idb = trim($rowb[0]);
                     }
					 
					 
		  

$sql = "INSERT INTO info_minutario(fecha,referencia,documento,asunto,sicar,sem,local) VALUES ('$fecha','RLG $idb','$tipodocumento','$asunto','$sicar','$sem','$local')"; 
mysqli_query($con,$sql);
mysqli_close($con); 



$_SESSION['exito']="Se guardo la información correctamente";
		header('location:http://192.168.39.31/intranet/index.php/minutario');
		
	  }




















header('location:http://192.168.39.31/intranet/index.php/minutario');
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>   
 





















</body>
</html>