<?php
//session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Solicitud valida</title>
</head>

<body>



<?php
$folio = (isset($_POST['folio']) ? $_POST['folio'] : null);
$fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : null);
$solicitud = (isset($_POST['solicitud']) ? $_POST['solicitud'] : null);
$cantidad = (isset($_POST['cantidad']) ? $_POST['cantidad'] : null);
$identificacion = strtoupper(isset($_POST['identificacion']) ? $_POST['identificacion'] : null);
$curp = strtoupper(isset($_POST['curp']) ? $_POST['curp'] : null);
$nombre = strtoupper(isset($_POST['nombre']) ? $_POST['nombre'] : null);
$sexo = (isset($_POST['sexo']) ? $_POST['sexo'] : null);
$estado = (isset($_POST['estado']) ? $_POST['estado'] : null);
$pais = (isset($_POST['pais']) ? $_POST['pais'] : null);
$provincia = (isset($_POST['provincia']) ? $_POST['provincia'] : null);
$fechanacimiento = (isset($_POST['fechanacimiento']) ? $_POST['fechanacimiento'] : null);
$padre = strtoupper(isset($_POST['padre']) ? $_POST['padre'] : null);
$madre = strtoupper(isset($_POST['madre']) ? $_POST['madre'] : null);
$domicilio = strtoupper(isset($_POST['domicilio']) ? $_POST['domicilio'] : null);
$telefono = (isset($_POST['telefono']) ? $_POST['telefono'] : null);
$email = (isset($_POST['email']) ? $_POST['email'] : null);
$pspi = (isset($_POST['pspi']) ? $_POST['pspi'] : null);
$sem = (isset($_POST['sem']) ? $_POST['sem'] : null);


$errores=array();

if ($folio == "" )
{
	$errores[]=true;
	$_SESSION['ERROR1']="DEBE DE ESCRIBIR EL FOLIO";
	
}else {
	
	      $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "registrocivil";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);	
	
          $folior= "SELECT folio FROM solicitud where folio='$folio'"; 
          $rsql = mysqli_query ($con,$folior);
		  $totalf = mysqli_num_rows($rsql);
		  mysqli_close($con);

		  
		  if ($totalf > 0){
		  $foliofinal = $totalf > 0; 
		  
		  
		  
		   $errores[]=true;		  
		   $_SESSION['ERROR2']="El número de folio $folio ya esta registrado";
	       
		  }
	
	}


if ($fecha == "")
{
	$errores[]=true;
	$_SESSION['ERROR3']="DEBE DE SELECCIONAR UNA FECHA ";
	
}

if ($solicitud == "")
{
	$errores[]=true;
	$_SESSION['ERROR4']="DEBE DE ESCRIBIR EL NO. DE SOLICITUD";
	
}

if ($cantidad == "")
{
	$errores[]=true;
	$_SESSION['ERROR5']="DEBE DE ESCRIBIR LA CANTIDAD DE ACTAS";
	
}


if ($identificacion == "")
{
	$errores[]=true;
	$_SESSION['ERROR6']="DEBE DE SELECCIONAR LA IDENTIFICACION PRESENTADA";
	
}


if ($nombre == "")
{
	$errores[]=true;
	$_SESSION['ERROR7']="DEBE DE ESCRIBIR EL NOMBRE";
	
}

if ($sexo == "")
{
	$errores[]=true;
	$_SESSION['ERROR8']="DEBE DE SELECCIONAR EL SEXO";
	
}

if ($estado == "")
{
	$errores[]=true;
	$_SESSION['ERROR9']="DEBE DE ESCRIBIR EL ESTADO DONDE FUE REGISTRADO";
	
}

if ($pais == "")
{
	$errores[]=true;
	$_SESSION['ERROR10']="DEBE DE SELECCIONAR EL ESTADO";
	
}

if ($provincia == "")
{
	$errores[]=true;
	$_SESSION['ERROR11']="DEBE DE SELECCIONAR EL MUNICIPIO";
	
}

if ($fechanacimiento == "")
{
	$errores[]=true;
	$_SESSION['ERROR12']="DEBE DE SELECCIONAR LA FECHA DE NACIMIENTO";
	
}

if ($padre == "")
{
	$errores[]=true;
	$_SESSION['ERROR13']="DEBE DE ESCRIBIR EL NOMBRE DEL PADRE";
	
}

if ($madre == "")
{
	$errores[]=true;
	$_SESSION['ERROR14']="DEBE DE ESCRIBIR EL NOMBRE DE LA MADRE";
	
}

if ($domicilio == "")
{
	$errores[]=true;
	$_SESSION['ERROR15']="DEBE DE ESCRIBIR EL DOMICILIO";
	
}

if ($telefono == "")
{
	$errores[]=true;
	$_SESSION['ERROR16']="DEBE DE ESCRIBIR EL TELEFONO";
	
}

if ($email == "")
{
	$errores[]=true;
	$_SESSION['ERROR17']="DEBE DE ESCRIBIR EL EMAIL";
	
}


if ($sem == "")
{
	$errores[]=true;
	$_SESSION['ERROR18']="DEBE DE SELECCIONAR AL PERSONAL DEL SEM";
	
}

if ($pspi == "")
{
	$errores[]=true;
	$_SESSION['ERROR19']="DEBE DE SELECCIONAR AL PERSONAL LOCAL";
	
}




if (count ($errores)>0)
{
	header('location:http://192.168.39.31/intranet/index.php/solicitud-actas-de-nacimiento');
	
	} 
	
	
	
//




if (isset($_POST['folio']) and !empty($_POST['folio']) and $foliofinal == false and 
	isset($_POST['fecha']) and !empty($_POST['fecha']) and
	isset($_POST['solicitud']) and !empty($_POST['solicitud']) and
	isset($_POST['cantidad']) and !empty($_POST['cantidad']) and		
	isset($_POST['identificacion']) and !empty($_POST['identificacion']) and	
	isset($_POST['curp']) and !empty($_POST['curp']) and
	isset($_POST['nombre']) and !empty($_POST['nombre']) and
	isset($_POST['sexo']) and !empty($_POST['sexo']) and
	isset($_POST['estado']) and !empty($_POST['estado']) and
	isset($_POST['pais']) and !empty($_POST['pais']) and
	isset($_POST['provincia']) and !empty($_POST['provincia']) and
	isset($_POST['fechanacimiento']) and !empty($_POST['fechanacimiento']) and
	isset($_POST['padre']) and !empty($_POST['padre']) and
	isset($_POST['madre']) and !empty($_POST['madre']) and
	isset($_POST['domicilio']) and !empty($_POST['domicilio']) and
	isset($_POST['telefono']) and !empty($_POST['telefono']) and
	isset($_POST['email']) and !empty($_POST['email']) and
	isset($_POST['pspi']) and !empty($_POST['pspi']) and
	isset($_POST['sem']) and !empty($_POST['sem']) 
	
	)
{
	$host = "localhost";
    $user = "root";
    $pw = "";
    $base = "registrocivil";
    $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);
		  
		  
$sql = "INSERT INTO solicitud(folio,fecha,solicitud,cantidad,identificacion,curp,nombre,sexo,estado,pais,provincia,fechanacimiento,padre,madre,domicilio,telefono,email,pspi,sem) VALUES 
('$folio','$fecha','$solicitud','$cantidad','$identificacion','$curp','$nombre','$sexo','$estado','$pais','$provincia','$fechanacimiento','$padre','$madre','$domicilio','$telefono','$email','$pspi','$sem')";
$rsql = mysqli_query ($con,$sql);

mysqli_close($con); 
		
		$_SESSION['exito']="Se guardó la información correctamente";
		header('location:http://192.168.39.31/intranet/images/RegistroCivil/acta/imprimir_solicitud.php');
  
  
 //http://192.168.39.31/intranet/index.php/solicitud-actas-de-nacimiento
			  			  
			  }	
			  

			  			  

?>






</body>
</html>