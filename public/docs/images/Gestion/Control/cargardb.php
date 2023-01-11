<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Caegar Remitente</title>
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
<form>

 <?php    $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "control";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);

          $sentencia="SELECT * FROM remitente_nuevo ORDER BY remitente ASC ";	
          $resultado = mysqli_query($con,$sentencia);
?>

    <select name="remitente2" size="0">
    
    <?php while($arreglo = mysqli_fetch_array($resultado)){ ?> 
    
    <option value="<?php echo $arreglo['ID']?>"><?php echo $arreglo['Remitente']?></option>  
    <?php } ?>
    </select>
</form>










</body>
</html>