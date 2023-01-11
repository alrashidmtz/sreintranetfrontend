<?php
header("Content-type: application/vnd.ms-word");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
$nombrehijo=$_GET['nombrehijo'];
header("Content-Disposition: attachment;filename=$nombrehijo.doc");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OP7</title>

</head>
<body>


<?php

$dia=$_GET['dia'];
$mes=$_GET['mes'];
$año=$_GET['año'];
$para=$_GET['para'];
$asunto=$_GET['asunto'];
$referencia=$_GET['referencia'];
$dia2=$_GET['dia'];
$mes2=$_GET['mes'];
$pronombre=$_GET['pronombre'];
$Sr=$_GET['Sr'];
$nombre=$_GET['nombre'];
$U=$_GET['U'];
$vocal=$_GET['vocal'];
$nombrehijo=$_GET['nombrehijo'];
$FDN=$_GET['FDN'];
$obtenga=$_GET['obtenga'];
$vigencia=$_GET['vigencia'];
$pronombre2=$_GET['pronombre2'];
$menor=$_GET['menor'];
$ser=$_GET['ser'];
$vocal2=$_GET['vocal2'];
$parentesco=$_GET['parentesco'];
$pronombre3=$_GET['pronombre3'];
$Sr2=$_GET['Sr2'];
$nombrepariente=$_GET['nombrepariente'];
$extra=$_GET['extra'];
$iniciales=$_GET['iniciales'];
$iniciales2=$_GET['iniciales2'];
$iniciales3=$_GET['iniciales3'];
$comparecer=$_GET['comparecer'];
$expresar=$_GET['expresar'];
$otorgar=$_GET['otorgar'];



?>





<p align="left"><b>Fecha: <?php echo"$dia de $mes de $año";?></b>


<p align="left">
<b>Para: <?php echo"$para"; ?></b><br><br>
</p>

<p align="center">
&ldquo;2017, Año del Centenario de la Promulgación de la Constitución Política de los Estados Unidos Mexicanos&rdquo;
<br><br>
</p>

<p align="left">Asunto: <?php echo"$asunto"; ?>
<br><br>
</p>

<p align="left">SICAR: 5-550-01-02
<br><br>
</p>

<p align="left"><b>Ref.: <?php echo"$referencia"; ?></b>
<br><br>
</p>

<p align="justify">
Se informa que el <?php echo"$dia2"; ?> de <?php echo"$mes2"; ?> actual, compareci <?php echo"$comparecer"; ?> ante este Consulado General el <?php echo"$Sr $nombre"; ?>, quien expres<?php echo"$expresar"; ?> y otorg<?php echo"$otorgar"; ?> su consentimiento firmando la forma OP-7 correspondiente, a fin de que s<?php echo"$U"; ?> hij<?php echo"$vocal"; ?> <b><?php echo"$nombrehijo"; ?> (FDN: <?php echo"$FDN"; ?>)</b> obteng<?php echo"$obtenga"; ?> pasaporte con vigencia de <b><?php echo"$vigencia"; ?> AÑOS.</b><br><br>
</p>

 <p align="justify">        
<?php echo"$pronombre2"; ?> meno<?php echo"$menor"; ?> ser<?php echo"$ser"; ?> acompañad<?php echo"$vocal2"; ?> por su <?php echo"$parentesco"; ?>, <?php echo"$pronombre3"; ?> <?php echo"$Sr2"; ?> <?php echo"$nombrepariente"; ?> <?php echo"$extra"; ?>
 <br><br>
 </p>
 
<p align="justify"> 
ESTE PERMISO DEBERÁ HACERSE VÁLIDO DENTRO DE LOS SIGUIENTES 90 DÍAS NATURALES.<br><br><br><br>
</p>

<p align="left">
Atentamente,<br><br><br><br>
</p>


<p align="left">Remedios Gómez Arnau<br>
Cónsul General<br><br><br><br>

<?php echo"$iniciales"; ?>/<?php echo"$iniciales2"; ?>/<?php echo"$iniciales3"; ?>

</p>








</body>
</html>