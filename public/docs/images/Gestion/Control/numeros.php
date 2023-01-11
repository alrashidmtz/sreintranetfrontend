<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
table {
    border-collapse: collapse;
   
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Numeros Control de gestion</title>
</head>

<body>

<?php
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
		  
		  
		  $url = "http://192.168.39.31/intranet/images/Gestion/control/numeros.php";
		  
		  $query = "SELECT count(*) from gestion";
          $result = mysqli_query($con,$query);
          $row=mysqli_fetch_array($result);
          
   $totrecords = $row[0];
   	
	 if (!isset ($_GET['page']))
  
  $thispage = 1;
   
       else
  
       $thispage = $_GET['page'];
   
       $recordsperpage = 200;
   
       $offset = ($thispage -1) * $recordsperpage;
	   
	   $totpages = ceil($totrecords / $recordsperpage);  
		  
          $busqueda = "SELECT Folio FROM gestion ORDER BY Folio ASC LIMIT $offset,$recordsperpage";
		  $rbusqueda = mysqli_query($con,$busqueda);
          $total = mysqli_num_rows($rbusqueda);		  
     	  mysqli_close($con);
 
		  
		  
		  
 

?>



<table border="1" bordercolor="#CCCCCC"  align="center" >
   <tr>        
    <td align="center"><b>Folio</b></td>    
   </tr>
   
 
 
 
<?php  


		   
while($f=mysqli_fetch_array($rbusqueda)){	
 echo '<tr>';
  echo '<td align="center">'.$f['Folio'].'</td>';
 echo '</tr>'; 
}
 
  
  
       
	
 echo '<tr>';
    

echo '<td colspan="1">Página<b> '.$thispage.' de ' .$totpages.' </b></td>';
echo '<td colspan="2">Número total de elementos encontrados:<b> '.$totrecords.'</b></td>';


 
 
 
 echo '<td colspan="3">';

	if ($totpages > 1) {
		if ($thispage != 1)
			echo '<a href="'.$url.'?page='.($thispage-1).'"></a>';
		for ($i=1;$i<=$totpages;$i++) {
			if ($thispage == $i)
				echo $thispage;
			else
				echo '<a href="'.$url.'?page='.$i.'">'.$i.'</a>  ';
		}
		if ($thispage != $totpages)
			echo '<a href="'.$url.'?page='.($thispage+1).'"></a>';
	}
	echo '</td>';


echo '</tr>';
?>


</table>

<table align="right">
<tr>
<td colspan="8" align="right">
<input type="button" value="Regresar al Control de Gestión" onClick="window.location = 'http://192.168.39.31/intranet/index.php/busqueda-control';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input align="right" type="button" value="Regresar a busqueda del Control" onClick="window.location = 'http://192.168.39.31/intranet/index.php/busqueda-control';"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type="button" name="imprimir" value="Imprimir" onclick="window.print();">


</td>
</tr>
</table> 
</body>
</html>