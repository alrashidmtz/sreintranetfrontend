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
<title>Reporte AA</title>
</head>

<body>

<div align="center" id="cuadro">



<?php

include ("conexion.php");
$con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);	
		  
$reporte="";		  
$reporte = (isset($_POST['reporte']) ? $_POST['reporte'] : null);



if ($reporte==""){
	
	
	 $url = "http://192.168.39.31/intranet/images/Proteccion/sactas/reporte.php";
		  
		  $query = "SELECT count(*) from actas_administrativas";
          $result = mysqli_query($con,$query);
          $row=mysqli_fetch_array($result);
          
   $totrecords = $row[0];
   	
	 if (!isset ($_GET['page']))
  
  $thispage = 1;
   
       else
  
       $thispage = $_GET['page'];
   
       $recordsperpage = 20;
   
       $offset = ($thispage -1) * $recordsperpage;
	   
	   $totpages = ceil($totrecords / $recordsperpage);  

   $busqueda = "SELECT * FROM actas_administrativas LIMIT $offset,$recordsperpage";
   $rbusqueda = mysqli_query($con,$busqueda);
   $total = mysqli_num_rows($rbusqueda);
   
?>

<table width="100%" border="1" align="center" >
   <tr>
     <th align="center"><b>No</b></th>      
     <th align="center"><b>Fecha</b></th>      
     <th align="center"><b>Asunto</b></th>
     <th align="center"><b>Funcionario</b></th>
     <th align="center"><b>Departamento</b></th>      
   </tr>  
   
<?php
while($f=mysqli_fetch_array($rbusqueda)){
	
$parts = explode('-', $f['Fecha']);  
/**
 *   $parts[2]: the day
 *   $parts[1]: the month
 *   $parts[0]: the year
*/
$Date = "{$parts[2]}/{$parts[1]}/{$parts[0]}"; // DD/MM/YYYY	
	
echo '<tr>';
echo '<td>RLG-00'.$f['ID'].'-19</td>';
echo '<td>'.$Date.'</td>';
echo '<td>'.$f['Asunto'].'</td>';
echo '<td>'.$f['Funcionario']. '</td>';
echo '<td>'.$f['Departamento'].'</td>';

echo '</tr>';
}

echo '<tr>';
//echo '<td>Número de elementos encontrados por página: <b>'.$total.'</b></td>';
//echo '<td>Número total de elementos encontrados:<b> '.$totrecords.'</b></td>';
echo '<td>Página<b> '.$thispage.' de ' .$totpages.' </b></td>';

echo '<td colspan="3">';

	if ($totpages > 1) {
		if ($thispage != 1)
			echo '<a href="'.$url.'?page='.($thispage-1).'"></a>';
		for ($i=1;$i<=$totpages;$i++) {
			if ($thispage == $i)
				echo $thispage;
			else
				echo '<a href="'.$url.'?page='.$i.''.$reporte.'">'.$i.'</a>  ';
		}
		if ($thispage != $totpages)
			echo '<a href="'.$url.'?page='.($thispage+1).'"></a>';
	}
	echo '</td>';

echo '<td><a href="http://192.168.39.31/intranet/index.php/actas-administrativas";">Regresar</a></td>';


echo '</tr>';


}

?>
</table>	
</div>
</body>
</html>