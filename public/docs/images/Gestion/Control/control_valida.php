<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control valida</title>
</head>

<body>



<?php
$folio = (isset($_POST['folio']) ? $_POST['folio'] : null);
$tema = (isset($_POST['tema']) ? $_POST['tema'] : null);
$fechas = (isset($_POST['fechas']) ? $_POST['fechas'] : null);
$horas = (isset($_POST['horas']) ? $_POST['horas'] : null);
$fechar = (isset($_POST['fechar']) ? $_POST['fechar'] : null);
$guia = (isset($_POST['guia']) ? $_POST['guia'] : null);
$remitente = (isset($_POST['remitente']) ? $_POST['remitente'] : null);
$remitente = strtoupper($remitente);
$remitente2 = (isset($_POST['remitente2']) ? $_POST['remitente2'] : null);
$asunto = (isset($_POST['asunto']) ? $_POST['asunto'] : null);
$sicar = (isset($_POST['sicar']) ? $_POST['sicar'] : null);
$sem = (isset($_POST['sem']) ? $_POST['sem'] : null);
$local = (isset($_POST['local']) ? $_POST['local'] : null);
$sem1 = (isset($_POST['sem1']) ? $_POST['sem1'] : null);
$local1 = (isset($_POST['local1']) ? $_POST['local1'] : null);

$errores=array();

if ($folio == "" )
{
	$errores[]=true;
	$_SESSION['ERROR1']="DEBE DE ESCRIBIR EL FOLIO";
	
}else {
	
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
	
          $folior= "SELECT folio FROM gestion where folio='$folio'"; 
          $rsql = mysqli_query ($con,$folior);
		  $totalf = mysqli_num_rows($rsql);
		  mysqli_close($con);

		  
		  if ($totalf > 0){
		  $foliofinal = $totalf > 0; 
		  
		  
		  
		   $errores[]=true;		  
		   $_SESSION['ERROR2']="El número de folio $folio ya esta registrado";
	       
		  }
	
	}


if ($tema == "")
{
	$errores[]=true;
	$_SESSION['ERROR3']="DEBE DE SELECCIONAR EL TIPO DE ENTRADA ";
	
}

if ($fechas == "")
{
	$errores[]=true;
	$_SESSION['ERROR4']="DEBE DE SELECCIONAR UNA FECHA";
	
}

if ($horas == "")
{
	$errores[]=true;
	$_SESSION['ERROR5']="DEBE DE SELECCIONAR UNA HORA";
	
}


if ($remitente2 == "" and $remitente == "")
{
	$errores[]=true;
	$_SESSION['ERROR6']="DEBE DE SELECCIONAR O ESCRIBIR EL REMITENTE";
	
}

if ($_POST['remitente2'] and $_POST['remitente'])
{
	$errores[]=true;
	$_SESSION['ERROR11']="DEBE DE SELECCIONAR UN REMITENTE DE LA LISTA<br> O ESCRIBIR UN NUEVO REMITENTE";
	
}

if ($asunto == "")
{
	$errores[]=true;
	$_SESSION['ERROR7']="DEBE DE ESCRIBIR EL ASUNTO";
	
}

if ($sicar == "")
{
	$errores[]=true;
	$_SESSION['ERROR8']="DEBE DE SELECCIONAR EL SICAR";
	
}

if ($sem == "")
{
	$errores[]=true;
	$_SESSION['ERROR9']="DEBE DE SELECCIONAR AL PERSONAL DEL SEM";
	
}

if ($local == "")
{
	$errores[]=true;
	$_SESSION['ERROR10']="DEBE DE SELECCIONAR AL PERSONAL LOCAL";
	
}




if (count ($errores)>0)
{
	header('location:http://192.168.39.31/intranet/index.php/control-de-gestion');
	
	} 
	
	
	
//Remitente Lista
if (isset($_POST['folio']) and !empty($_POST['folio']) and $foliofinal == false and 
	isset($_POST['tema']) and !empty($_POST['tema']) and
	isset($_POST['fechas']) and !empty($_POST['fechas']) and
	isset($_POST['horas']) and !empty($_POST['horas']) and		
	isset($_POST['remitente2']) and !empty($_POST['remitente2']) and
	$remitente == "" and
	isset($_POST['asunto']) and !empty($_POST['asunto']) and
	isset($_POST['sicar']) and !empty($_POST['sicar']) and
	isset($_POST['sem']) and !empty($_POST['sem']) and
	isset($_POST['local']) and !empty($_POST['local']) 
	)
{
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
		  
		  
$sql = "INSERT INTO gestion(folio,tema,fechas,horas,fechar,guia,remitente2,asunto,sicar,sem,local,sem1,local1) VALUES ('$folio','$tema','$fechas','$horas','$fechar','$guia','$remitente2','$asunto','$sicar','$sem','$local','$sem1','$local1')";
$rsql = mysqli_query ($con,$sql);

mysqli_close($con); 
		
		$_SESSION['exito']="Se guardó la información correctamente";
		header('location:http://192.168.39.31/intranet/index.php/control-de-gestion');
  
			  			  
			  }	
			  
//Termina Remitente Lista			  


//Remitente texto
if (isset($_POST['folio']) and !empty($_POST['folio']) and $foliofinal == false and 
	isset($_POST['tema']) and !empty($_POST['tema']) and
	isset($_POST['fechas']) and !empty($_POST['fechas']) and
	isset($_POST['horas']) and !empty($_POST['horas']) and		
	isset($_POST['remitente']) and !empty($_POST['remitente']) and
	$remitente2 == "" and
	isset($_POST['asunto']) and !empty($_POST['asunto']) and
	isset($_POST['sicar']) and !empty($_POST['sicar']) and
	isset($_POST['sem']) and !empty($_POST['sem']) and
	isset($_POST['local']) and !empty($_POST['local']) 
	)
{
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
		  
$sql = "INSERT INTO remitente_nuevo (Remitente) VALUES ('$remitente')";
$rsql = mysqli_query($con,$sql); 		  
		  
$sql = "INSERT INTO gestion(folio,tema,fechas,horas,fechar,guia,remitente2,asunto,sicar,sem,local,sem1,local1) VALUES ('$folio','$tema','$fechas','$horas','$fechar','$guia','$remitente','$asunto','$sicar','$sem','$local','$sem1','$local1')";
$rsql = mysqli_query ($con,$sql);

mysqli_close($con); 
		
		$_SESSION['exito']="Se guardó la información correctamente<br> y se agregó un nuevo remitente";
		header('location:http://192.168.39.31/intranet/index.php/control-de-gestion');
  
			  			  
			  }	
?>
</body>
</html>