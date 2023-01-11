<?php
//session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control de Gestión</title>
<script type="text/javascript" src="jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="jquery.autocomplete.js"></script>
<script type="text/javascript" src="jquery.select-autocomplete.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
  	$('select.autocomplete').select_autocomplete();
  });
   
	</script>
    
 
    

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



<div align="center" id="cuadro">
<form name="control"  method="post" action="http://192.168.39.31/intranet/index.php?option=com_content&view=article&id=34" >
<table  border="1" align="center" cellpadding="10px">
<tr>
<td colspan="3">
<?php
if (isset($_SESSION['exito']))
{
echo "<b style='font-size:18px'><center><font color='#FF0000'>".$_SESSION['exito']."</font></center></b>";
} 

else {
	
	echo "";
	
	}
unset($_SESSION['exito']);
?>
</td>
</tr>
 <tr>
 <th colspan="2" scope="col"><h2 align="center">Control de Gesti&oacute;n</h2></th>
 </tr>


  <tr>
    <th scope="col"><b style='color:#F00;'>No. de Folio *</b><br />
    <!--No. de Folio---> 
   <input type="text" name="folio" maxlength="6" size="6"  />  
    <!--Termina No. de Folio--->
    <br />
      <b style="color: #090">
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
      
      <b style="color: #090">
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
      
      
    </th>
    
    <th scope="col"><b style='color:#F00;'>Tipo de Entrada *</b><br />     
      <select name="tema" class="autocomplete">
        <option value=""></option>
        <option value="EMAIL INSTITUCIONAL">EMAIL INSTITUCIONAL</option>
        <option value="CARTA">CARTA</option>
        <option value="FAX">FAX</option>
        <option value="NOTA">NOTA</option>
        <option value="OFICIO">OFICIO</option>
        <option value="VALIJA">VALIJA</option>
        <option value="CORREO POSTAL">CORREO POSTAL</option>
        <option value="CHEQUE">CHEQUE</option>
        <option value="FACTURA PROVEEDOR">FACTURA PROVEEDOR</option>
        <option value="CORRESPONDENCIA DE UN PRESO">CORRESPONDENCIA DE UN PRESO</option>
        <option value="MENSAJERIA">MENSAJERIA</option>
        <option value="CGENERAL EMAIL">CGENERAL EMAIL</option>
        <option value="ENTREGA PERSONALMENTE">ENTREGA PERSONALMENTE</option>
      </select>
      <br />
      <b style="color: #090">
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
      </th>
  </tr>
  <tr>
    <td align="center"><b style='color:#F00;'>Fecha de Recibido/Sello *</b><br /><input type="date" name="fechas" min="2016-01-01" max="2030-12-31" step="0">
    <br />
     <b style="color: #090">  
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
    
    <td align="center"><b style='color:#F00;'>Hora de Recibido *</b><br /><input type="time" name="horas">
    <br />
    <b style="color: #090">  
    <?php
	  if (isset($_SESSION['ERROR5']))
	  {
		  echo ($_SESSION['ERROR5']);
	  } 
	  
	  else {		  
		  echo "";	  
	  }
	  
	  unset ($_SESSION['ERROR5']);
	  ?>
      </b>
    </td>
  </tr>
  <tr>
    <td align="center">Fecha del Documento<br /><input type="date" name="fechar" min="2016-01-01" max="2030-12-31" step="0"></td>
    
    <td align="center">N&uacute;mero de Referencia<br /><input type="text" name="guia" /></td>
  </tr>
  <tr>
    
    <td align="center"><b style='color:#F00;'>Remitente *</b><br />     
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

          $sentencia="SELECT * FROM remitente_nuevo ORDER BY Remitente ASC";	
          $resultado=mysqli_query($con,$sentencia);
    ?>

    <select name="remitente2" class="autocomplete">
    <option value=""></option>
    
    <?php while($arreglo = mysqli_fetch_array($resultado)){ ?> 
    
    <option value="<?php echo $arreglo['Remitente']?>"><?php echo $arreglo['Remitente']?></option>  
    <?php } ?>
    </select>
    <br />
    <b style="color: #090">  
    <?php
	  if (isset($_SESSION['ERROR6']))
	  {
		  echo ($_SESSION['ERROR6']);
	  } 
	  
	  else {		  
		  echo "";	  
	  }
	  
	  unset ($_SESSION['ERROR6']);
	  ?>
      </b>
    </td>
    
    <!--Empieza agregar remitente--->    
   <td align="center">Agregar Remitente<br/>
   <input type="text" name="remitente" />   
   <br />
    <b style="color: #090">  
    <?php
	  if (isset($_SESSION['ERROR11']))
	  {
		  echo ($_SESSION['ERROR11']);
	  } 
	  
	  else {		  
		  echo "";	  
	  }
	  
	  unset ($_SESSION['ERROR11']);
	  ?>
      </b>  
   
    <!--Termina agregar remitente--->  
    
  </tr>
  <tr>
    
    <td align="center" colspan="2"><b style='color:#F00;'>Asunto *</b>
      <textarea name="asunto" rows="3" cols="100" style="width:400px"></textarea>
      <br />
    <b style="color: #090">  
    <?php
	  if (isset($_SESSION['ERROR7']))
	  {
		  echo ($_SESSION['ERROR7']);
	  } 
	  
	  else {		  
		  echo "";	  
	  }
	  
	  unset ($_SESSION['ERROR7']);
	  ?>
      </b>
      </td>
  </tr>
  <tr>    
    <td align="center" colspan="2"><b style='color:#F00;'>CADIDO *</b>
      <select name="sicar" class="autocomplete">
        <option value=""></option>
      <option value="Sección01C Legislación">Sección 01C Legislación">01C Legislación">Sección 01C Legislación</option>
<option value="Serie 01C.02Programas y proyectos en materia de legislación">01C.02Programas y proyectos en materia de legislación</option>
<option value="Serie01C.10Instrumentos jurídicos consensuales (convenios, bases de colaboración, acuerdos, etc.)">01C.10Instrumentos jurídicos consensuales (convenios, bases de colaboración, acuerdos, etc.)</option>
<option value="Serie01C.13Diario Oficial de la Federación (publicaciones en el)">01C.13Diario Oficial de la Federación (publicaciones en el)</option>
<option value="Sección02C Asuntos jurídicos">02C Asuntos jurídicos</option>
<option value="Serie 02C.03Registro y certificación de firmas">02C.03Registro y certificación de firmas</option>
<option value="Serie02C.05Actuaciones y representaciones en materia legal">02C.05Actuaciones y representaciones en materia legal</option>
<option value="Serie02C.06Asistencia, consulta y asesorías">02C.06Asistencia, consulta y asesorías</option>
<option value="Serie02C.08Juicios contra la dependencia">02C.08Juicios contra la dependencia</option>
<option value="Serie02C.09Juicios de la dependencia">02C.09Juicios de la dependencia</option>
<option value="Serie02C.10Amparos">02C.10Amparos</option>
<option value="Sección03C Programación, organización y presupuestación">03C Programación, organización y presupuestación</option>
<option value="Serie 03C.04Programa anual de inversiones">03C.04Programa anual de inversiones</option>
<option value="Serie03C.11Integración y dictamen de manuales de organización">03C.11Integración y dictamen de manuales de organización</option>
<option value="Serie 03C.12Integración y dictamen de manuales, normas y lineamientos de procesos y procedimientos">03C.12Integración y dictamen de manuales, normas y lineamientos de procesos y procedimientos</option>
<option value="Serie 03C.13Acciones de modernización administrativa">03C.13Acciones de modernización administrativa</option>
<option value="Serie 03C.18Programas y proyectos en materia de presupuestación">03C.18Programas y proyectos en materia de presupuestación</option>
<option value="Serie 03C.20Evaluación y control del ejercicio presupuestal">03C.20Evaluación y control del ejercicio presupuestal</option>
<option value="Serie 03C.21Comité de mejora regulatoria interna">03C.21Comité de mejora regulatoria interna</option>
<option value="Sección04C Recursos humanos">04C Recursos humanos</option>
<option value="Serie 04C.02Programas y proyectos en materia de recursos humanos">04C.02Programas y proyectos en materia de recursos humanos</option>
<option value="Serie04C.03Expediente único de personal">04C.03Expediente único de personal</option>
<option value="Subserie04C.03.01Personal del Servicio Exterior Mexicano">04C.03.01Personal del Servicio Exterior Mexicano</option>
<option value="Subserie04C.03.02Personal de prestación de servicios profesionales por honorarios">04C.03.02Personal de prestación de servicios profesionales por honorarios</option>
<option value="Subserie04C.03.03Personal de la Cancillería">04C.03.03Personal de la Cancillería</option>
<option value="Serie04C.04 Registro y control de puestos y plazas">04C.04 Registro y control de puestos y plazas</option>
<option value="Serie 04C.05 Nómina de pago de personal">04C.05 Nómina de pago de personal</option>
<option value="Serie04C.06 Reclutamiento y selección de personal">04C.06 Reclutamiento y selección de personal</option>
<option value="Serie 04C.08 Control de asistencia (vacaciones, descansos y licencias, incapacidades, etc.)">04C.08 Control de asistencia (vacaciones, descansos y licencias, incapacidades, etc.)</option>
<option value="Serie04C.11 Estímulos y recompensas">04C.11 Estímulos y recompensas</option>
<option value="Serie04C.15 Afiliaciones al Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado">04C.15 Afiliaciones al Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado</option>
<option value="Serie04C.16Control de prestaciones en materia económica (FONAC, Sistema de Ahorro para el Retiro, Seguros, etc.)">04C.16Control de prestaciones en materia económica (FONAC, Sistema de Ahorro para el Retiro, Seguros, etc.)</option>
<option value="Serie04C.20Relaciones laborales (comisiones mixtas, sindicato nacional de trabajad            ores al servicio del estado, condiciones laborales)">04C.20Relaciones laborales (comisiones mixtas, sindicato nacional de trabajad            ores al servicio del estado, condiciones laborales)</option>
<option value="Serie04C.21Servicios sociales y culturales y de seguridad e higiene en el trabajo">04C.21Servicios sociales y culturales y de seguridad e higiene en el trabajo</option>
<option value="Serie04C.22 Capacitación continua y desarrollo profesional del personal de las áreas administrativas">04C.22 Capacitación continua y desarrollo profesional del personal de las áreas administrativas</option>
<option value="Serie04C.23 Servicio social de áreas administrativas">04C.23 Servicio social de áreas administrativas</option>
<option value="Serie04C.29 Comité de ética y de prevención de conflictos de interés">04C.29 Comité de ética y de prevención de conflictos de interés</option>
<option value="Sección05C Recursos financieros">05C Recursos financieros</option>
<option value="Serie 05C.03Gastos o egresos por partida presupuestal">05C.03Gastos o egresos por partida presupuestal</option>
<option value="Subserie05C.03.01Radicaciones a las Representaciones de México en el Exterior">05C.03.01Radicaciones a las Representaciones de México en el Exterior</option>
<option value="Subserie05C.03.02Control de viáticos de la Cancillería">05C.03.02Control de viáticos de la Cancillería</option>
<option value="Subserie05C.03.03Control de viáticos del Servicio Exterior Mexicano ">05C.03.03Control de viáticos del Servicio Exterior Mexicano </option>
<option value="Subserie05C.03.04Control de menaje de casa, gastos de instalación y pasajes">05C.03.04Control de menaje de casa, gastos de instalación y pasajes</option>
<option value="Serie 05C.04Ingresos ">05C.04Ingresos </option>
<option value="Serie 05C.05 Libros contables ">05C.05 Libros contables </option>
<option value="Serie 05C.06 Registros contables (glosa)">05C.06 Registros contables (glosa)</option>
<option value="Subserie 05C.06.01Cuentas por liquidar certificadas de gastos de inversión">05C.06.01Cuentas por liquidar certificadas de gastos de inversión</option>
<option value="Serie 05C.12Asignación y optimización de recursos financieros">05C.12Asignación y optimización de recursos financieros</option>
<option value="Serie 05C.14 Cuentas por liquidar certificadas">05C.14 Cuentas por liquidar certificadas</option>
<option value="Serie 05C.15 Transferencias de presupuesto">05C.15 Transferencias de presupuesto</option>
<option value="Serie 05C.22 Control de cheques">05C.22 Control de cheques</option>
<option value="Serie 05C.23Conciliaciones">05C.23Conciliaciones</option>
<option value="Serie 05C.27Fondo rotatorio (revolvente)">05C.27Fondo rotatorio (revolvente)</option>
<option value="Sección06C Recursos materiales y obra pública">06C Recursos materiales y obra pública</option>
<option value="Serie 06C.02 Programas y proyectos en materia de recursos materiales,  obra pública, conservación y mantenimiento">06C.02 Programas y proyectos en materia de recursos materiales,  obra pública, conservación y mantenimiento</option>
<option value="Serie 06C.04 Adquisiciones">06C.04 Adquisiciones</option>
<option value="Subserie06C.04.01 Licitación pública">06C.04.01 Licitación pública</option>
<option value="Subserie06C.04.02 Invitación a cuando menos tres personas">06C.04.02 Invitación a cuando menos tres personas</option>
<option value="Subserie06C.04.03 Adjudicación directa">06C.04.03 Adjudicación directa</option>
<option value="Serie06C.06 Control de contratos">06C.06 Control de contratos</option>
<option value="Serie06C.07 Seguros y fianzas">06C.07 Seguros y fianzas</option>
<option value="Serie06C.13 Conservación y mantenimiento de la infraestructura física">06C.13 Conservación y mantenimiento de la infraestructura física</option>
<option value="Serie06C.14 Registro de proveedores y contratistas">06C.14 Registro de proveedores y contratistas</option>
<option value="Serie06C.15Arrendamientos">06C.15Arrendamientos</option>
<option value="Serie06C.17 Inventario físico y control de bienes muebles">06C.17 Inventario físico y control de bienes muebles</option>
<option value="Subserie06C.17.01Control del patrimonio artístico">06C.17.01Control del patrimonio artístico</option>
<option value="Serie06C.18Inventario físico y control de bienes inmuebles">06C.18Inventario físico y control de bienes inmuebles</option>
<option value="Serie06C.19 Almacenamiento, control y distribución de bienes muebles">06C.19 Almacenamiento, control y distribución de bienes muebles</option>
<option value="Serie06C.22 Control y seguimiento de obras y remodelaciones">06C.22 Control y seguimiento de obras y remodelaciones</option>
<option value="Serie06C.23 Comités y subcomités de adquisiciones, arrendamientos y servicios">06C.23 Comités y subcomités de adquisiciones, arrendamientos y servicios</option>
<option value="Serie06C.24 Comité de enajenación de bienes muebles e inmuebles">06C.24 Comité de enajenación de bienes muebles e inmuebles</option>
<option value="Serie06C.25 Comité de obra pública">06C.25 Comité de obra pública</option>
<option value="Sección07C Servicios generales">07C Servicios generales</option>
<option value="Serie07C.03 Servicios básicos (energía eléctrica, agua, predial, etc.)">07C.03 Servicios básicos (energía eléctrica, agua, predial, etc.)</option>
<option value="Serie07C.10 Servicios especializados de mensajería">07C.10 Servicios especializados de mensajería</option>
<option value="Serie07C.11Mantenimiento, conservación e instalación de mobiliario">07C.11Mantenimiento, conservación e instalación de mobiliario</option>
<option value="Serie07C.13 Control de parque vehicular">07C.13 Control de parque vehicular</option>
<option value="Serie07C.14 Control de combustible">07C.14 Control de combustible</option>
<option value="Serie07C.15Control de servicios en auditorios y salas">07C.15Control de servicios en auditorios y salas</option>
<option value="Serie07C.16 Protección civil">07C.16 Protección civil</option>
<option value="Sección08C Tecnologías y servicios de la información">08C Tecnologías y servicios de la información</option>
<option value="Serie08C.04Desarrollo e infraestructura de telecomunicaciones">08C.04Desarrollo e infraestructura de telecomunicaciones</option>
<option value="Serie08C.05 Desarrollo e infraestructura del portal de internet de la dependencia">08C.05 Desarrollo e infraestructura del portal de internet de la dependencia</option>
<option value="Serie08C.09 Desarrollo informático">08C.09 Desarrollo informático</option>
<option value="Serie08C.10Seguridad informática">08C.10Seguridad informática</option>
<option value="Serie08C.11 Desarrollo de sistemas">08C.11 Desarrollo de sistemas</option>
<option value="Serie08C.16 Administración y servicios de archivo">08C.16 Administración y servicios de archivo</option>
<option value="Serie08C.18Administración y servicios de bibliotecas">08C.18Administración y servicios de bibliotecas</option>
<option value="Serie08C.19Administración y servicios de otros centros documentales">08C.19Administración y servicios de otros centros documentales</option>
<option value="Serie08C.24Productos para la divulgación de servicios">08C.24Productos para la divulgación de servicios</option>
<option value="Serie08C.25Servicios y productos en internet o intranet">08C.25Servicios y productos en internet o intranet</option>
<option value="Sección09C Comunicación social ">09C Comunicación social </option>
<option value="Serie09C.02 Programas y proyectos en materia de comunicación social">09C.02 Programas y proyectos en materia de comunicación social</option>
<option value="Serie09C.04 Material multimedia">09C.04 Material multimedia</option>
<option value="Serie09C.05Publicidad institucional">09C.05Publicidad institucional</option>
<option value="Serie09C.07 Boletines informativos para medios">09C.07 Boletines informativos para medios</option>
<option value="Serie09C.09 Agencias periodísticas, de noticias, reporteros y articulistas, cadenas televisivas y otros medios de comunicación social">09C.09 Agencias periodísticas, de noticias, reporteros y articulistas, cadenas televisivas y otros medios de comunicación social</option>
<option value="Serie09C.13 Comparecencias ante el poder legislativo">09C.13 Comparecencias ante el poder legislativo</option>
<option value="Sección10C Control y auditoría de actividades públicas">10C Control y auditoría de actividades públicas</option>
<option value="Serie10C.02Programas y proyectos en materia de control y auditoría">10C.02Programas y proyectos en materia de control y auditoría</option>
<option value="Subserie10C.02.01Sistema de control interno institucional">10C.02.01Sistema de control interno institucional</option>
<option value="Subserie10C.02.02Administración de riesgos institucionales">10C.02.02Administración de riesgos institucionales</option>
<option value="Subserie10C.02.03Comité de control y desempeño institucional">10C.02.03Comité de control y desempeño institucional</option>
<option value="Serie10C.06Seguimiento a la aplicación en medidas o recomendaciones">10C.06Seguimiento a la aplicación en medidas o recomendaciones</option>
<option value="Serie10C.15 Entrega–recepción">10C.15 Entrega–recepción</option>
<option value="Serie10C.16Libros blancos">10C.16Libros blancos</option>
<option value="Sección11C Programación, información, evaluación y políticas">11C Programación, información, evaluación y políticas</option>
<option value="Serie11C.04Programas y proyectos en materia de información y evaluación">11C.04Programas y proyectos en materia de información y evaluación</option>
<option value="Serie11C.16Informe de labores">11C.16Informe de labores</option>
<option value="Sección12C Transparencia y acceso a la Información">12C Transparencia y acceso a la Información</option>
<option value="Serie 12C.05 Comité de transparencia">12C.05 Comité de transparencia</option>
<option value="Serie12C.06 Solicitudes de acceso a la información">12C.06 Solicitudes de acceso a la información</option>
<option value="Serie12C.07 Portal de transparencia">12C.07 Portal de transparencia</option>
<option value="Serie12C.10 Sistemas de datos personales">12C.10 Sistemas de datos personales</option>
<option value="Sección01S Conducción de la política exterior de México">01S Conducción de la política exterior de México</option>
<option value="Serie01S.01 Disposiciones en materia de política exterior de México">01S.01 Disposiciones en materia de política exterior de México</option>
<option value="Serie01S.02 Programas y proyectos en materia de política exterior de México">01S.02 Programas y proyectos en materia de política exterior de México</option>
<option value="Serie01S.03Ampliación de la presencia diplomática de México en el mundo">01S.03Ampliación de la presencia diplomática de México en el mundo</option>
<option value="Serie01S.04Celebración de tratados, acuerdos, convenios y convenciones internacionales">01S.04Celebración de tratados, acuerdos, convenios y convenciones internacionales</option>
<option value="Serie01S.05Intervención en foros, comisiones, congresos, conferencias y exposiciones internacionales">01S.05Intervención en foros, comisiones, congresos, conferencias y exposiciones internacionales</option>
<option value="Serie01S.06Defensa de los intereses de México en litigios internacionales">01S.06Defensa de los intereses de México en litigios internacionales</option>
<option value="Serie01S.07Atención de los asuntos de Estado internacionales">01S.07Atención de los asuntos de Estado internacionales</option>
<option value="Serie01S.08Atención de los asuntos de Estado interiores">01S.08Atención de los asuntos de Estado interiores</option>
<option value="Serie01S.09Coordinación de las acciones que realicen las dependencias del gobierno federal en el extranjero">01S.09Coordinación de las acciones que realicen las dependencias del gobierno federal en el extranjero</option>
<option value="Serie01S.10Sesiones de la Comisión Consultiva de Política Exterior">01S.10Sesiones de la Comisión Consultiva de Política Exterior</option>
<option value="Serie01S.11Comisión de Personal del Servicio Exterior Mexicano">01S.11Comisión de Personal del Servicio Exterior Mexicano</option>
<option value="Subserie01S.11.01Control de ingresos">01S.11.01Control de ingresos</option>
<option value="Subserie01S.11.02Control de rotaciones">01S.11.02Control de rotaciones</option>
<option value="Subserie01S.11.03Control de evaluación y ascensos">01S.11.03Control de evaluación y ascensos</option>
<option value="Subserie01S.11.04Control de asuntos disciplinarios">01S.11.04Control de asuntos disciplinarios</option>
<option value="Subserie01S.11.05Control de prestaciones">01S.11.05Control de prestaciones</option>
<option value="Subserie01S.11.06Control administrativo en la Representación ">01S.11.06Control administrativo en la Representación </option>
<option value="Subserie01S.11.07Personal asimilado al Servicio Exterior Mexicano">01S.11.07Personal asimilado al Servicio Exterior Mexicano</option>
<option value="Sección02S Actuación internacional del Gobierno de la República">02S Actuación internacional del Gobierno de la República</option>
<option value="Serie02S.01 Disposiciones en materia de actuación internacional del Gobierno de la República">02S.01 Disposiciones en materia de actuación internacional del Gobierno de la República</option>
<option value="Serie02S.02 Programas y proyectos en materia de política exterior de México">02S.02 Programas y proyectos en materia de política exterior de México</option>
<option value="Serie02S.03Cooperación internacional para el desarrollo">02S.03Cooperación internacional para el desarrollo</option>
<option value="Subserie02S.03.01Gestión de acuerdos, acciones y programas de cooperación cultural, educativa, técnica, científica y de derechos humanos">02S.03.01Gestión de acuerdos, acciones y programas de cooperación cultural, educativa, técnica, científica y de derechos humanos</option>
<option value="Subserie02S.03.02Fortalecimiento de las relaciones comerciales, económicas y turísticas">02S.03.02Fortalecimiento de las relaciones comerciales, económicas y turísticas</option>
<option value="Subserie02S.03.03Actuaciones ante Organismos y Mecanismos Internacionales y Regionales">02S.03.03Actuaciones ante Organismos y Mecanismos Internacionales y Regionales</option>
<option value="Serie02S.04Acreditación del Cuerpo Diplomático, Consular y Funcionarios de los Organismos Internacionales con Sede y Representación ante el Gobierno de México">02S.04Acreditación del Cuerpo Diplomático, Consular y Funcionarios de los Organismos Internacionales con Sede y Representación ante el Gobierno de México</option>
<option value="Serie02S.05Promoción y defensa de los intereses de México en el exterior, en los ámbitos multilateral, bilateral y regional">02S.05Promoción y defensa de los intereses de México en el exterior, en los ámbitos multilateral, bilateral y regional</option>
<option value="Serie02S.06Gestión de acciones protocolarias">02S.06Gestión de acciones protocolarias</option>
<option value="Sección03S Protección y asistencia a connacionales y extranjeros">03S Protección y asistencia a connacionales y extranjeros</option>
<option value="Serie 03S.01 Disposiciones en materia de protección y asistencia a connacionales y extranjeros">03S.01 Disposiciones en materia de protección y asistencia a connacionales y extranjeros</option>
<option value="Serie03S.02Programas y proyectos en materia de protección y asistencia a connacionales y extranjeros">03S.02Programas y proyectos en materia de protección y asistencia a connacionales y extranjeros</option>
<option value="Serie03S.03Formalización y consolidación de la red de delegaciones en territorio nacional y representaciones de México en el exterior">03S.03Formalización y consolidación de la red de delegaciones en territorio nacional y representaciones de México en el exterior</option>
<option value="Serie03S.04Servicio consular y migratorio">03S.04Servicio consular y migratorio</option>
<option value="Subserie03S.04.01Servicios, trámites y documentación">03S.04.01Servicios, trámites y documentación</option>
<option value="Subserie03S.04.02Asistencia jurídica">03S.04.02Asistencia jurídica</option>
<option value="Subserie03S.04.03Asistencia de protección">03S.04.03Asistencia de protección</option>
<option value="Serie03S.05Sesiones del Comité para la Asistencia a Casos de Protección Consular que requieren apoyos económicos">03S.05Sesiones del Comité para la Asistencia a Casos de Protección Consular que requieren apoyos económicos</option>
<option value="Serie03S.06Expedición de pasaportes ">03S.06Expedición de pasaportes </option>
<option value="Serie03S.07Legalización de firmas de documentos públicos ">03S.07Legalización de firmas de documentos públicos </option>
<option value="Serie03S.08Expedición de documentos de identidad y viaje a extranjeros">03S.08Expedición de documentos de identidad y viaje a extranjeros</option>
<option value="Serie03S.09Servicio delegacional">03S.09Servicio delegacional</option>



      </select>
      <br />
    <b style="color: #090">  
    <?php
	  if (isset($_SESSION['ERROR8']))
	  {
		  echo ($_SESSION['ERROR8']);
	  } 
	  
	  else {		  
		  echo "";	  
	  }
	  
	  unset ($_SESSION['ERROR8']);
	  ?>
      </b>
   </td>
  </tr>
  
  <tr>
    <td align="center" colspan="2">Turnado a:</td>
    </tr>
    <tr>
    <td align="center"><b style='color:#F00;'>SEM *</b></td>
    <td align="center"><b style='color:#F00;'>LOCAL *</b></td>
  </tr>
  <tr>    
    <td align="center">
      <select name="sem" class="autocomplete">
        <option value=""></option>
		<option value="CARLOS GUSTAVO OBRADOR GARRIDO CUESTA">CARLOS GUSTAVO OBRADOR GARRIDO CUESTA</option>
		<option value="	MARIA DEL ROCIO VAZQUEZ ALVAREZ">MARIA DEL ROCIO VAZQUEZ ALVAREZ</option>
		<option value="	SEBASTIAN ALFONSO GALVAN DUQUE COVARRUBIAS">SEBASTIAN ALFONSO GALVAN DUQUE COVARRUBIAS</option>
		<option value="	VALERIA RAMIREZ SILLER">VALERIA RAMIREZ SILLER</option>
		<option value="	JOSE LUIS ALATORRE OROZCO">JOSE LUIS ALATORRE OROZCO</option>
        <option value="TODO EL SEM">TODO EL SEM</option>
      </select>
      <br />
    <b style="color: #090">  
    <?php
	  if (isset($_SESSION['ERROR9']))
	  {
		  echo ($_SESSION['ERROR9']);
	  } 
	  
	  else {		  
		  echo "";	  
	  }
	  
	  unset ($_SESSION['ERROR9']);
	  ?>
      </b>
     </td>
    <td align="center">
      <select name="local" class="autocomplete">
        <option value=""></option>
        <option value="NO APLICA">NO APLICA</option>
      </select>
      <br />
    <b style="color: #090">  
    <?php
	  if (isset($_SESSION['ERROR10']))
	  {
		  echo ($_SESSION['ERROR10']);
	  } 
	  
	  else {		  
		  echo "";	  
	  }
	  
	  unset ($_SESSION['ERROR10']);
	  ?>
      </b>
      </td>
  </tr>
   <tr>    
    <td align="center">
     <select name="sem1">
        <option value=""></option>
		<option value="CARLOS GUSTAVO OBRADOR GARRIDO CUESTA">CARLOS GUSTAVO OBRADOR GARRIDO CUESTA</option>
		<option value="	MARIA DEL ROCIO VAZQUEZ ALVAREZ">MARIA DEL ROCIO VAZQUEZ ALVAREZ</option>
		<option value="	SEBASTIAN ALFONSO GALVAN DUQUE COVARRUBIAS">SEBASTIAN ALFONSO GALVAN DUQUE COVARRUBIAS</option>
		<option value="	JOSE LUIS ALATORRE OROZCO">JOSE LUIS ALATORRE OROZCO</option>
        <option value="TODO EL SEM">TODO EL SEM</option>
      </select>  
    </td>
    <td align="center">
     <select name="local1">
        <option value=""></option>
        <option value=""></option>
        <option value="ERIKA JANETH CARRILLO PALACIOS">ERIKA JANETH CARRILLO PALACIOS</option>
		<option value="ALEJANDRA ELIDETH OLIVARES PATIÑO">ALEJANDRA ELIDETH OLIVARES PATIÑO</option>
		<option value="ALEXIA AMADA ESPINOZA SOTO">ALEXIA AMADA ESPINOZA SOTO</option>
		<option value="STEPHANY ALEXANDRA PLACIDO VELAZCO">STEPHANY ALEXANDRA PLACIDO VELAZCO</option>
		<option value="ARTURO AGUIRRE OTERO">ARTURO AGUIRRE OTERO</option>
		<option value="ALICIA MEJIA MONROY">ALICIA MEJIA MONROY</option>
		<option value="VIRGINIA RIVERA HERNANDEZ">VIRGINIA RIVERA HERNANDEZ</option>
		<option value="HUMBERTO CRUZ GUADARRAMA">HUMBERTO CRUZ GUADARRAMA</option>
		<option value="LILIANA FAJARDO CANTERO">LILIANA FAJARDO CANTERO</option>
		<option value="ZUHAIL DESSIRRE CORRO VAZQUEZ">ZUHAIL DESSIRRE CORRO VAZQUEZ</option>
		<option value="MISAEL OCAMPO CADENA">MISAEL OCAMPO CADENA</option>
		<option value="IVETTE COMPEAN RODRIGUEZ">IVETTE COMPEAN RODRIGUEZ</option>
		<option value="ESPERANZA LIZZET REYES CORTES">ESPERANZA LIZZET REYES CORTES</option>
		<option value="AMANDA MOYSEN CORTES.">AMANDA MOYSEN CORTES.</option>
		<option value="EDWIN MORALES ACOSTA">EDWIN MORALES ACOSTA</option>
		<option value="MARISELA RAMIREZ GARDUÑO">MARISELA RAMIREZ GARDUÑO</option>
		<option value="HECTOR ALONSO RICO-DIAZ">HECTOR ALONSO RICO-DIAZ</option>
		<option value="MARCELA RIOS CORTEZ">MARCELA RIOS CORTEZ</option>
		<option value="ARLEET DEL REAL FIGUEROA">ARLEET DEL REAL FIGUEROA</option>
		<option value="MARIA DOLORES DE LA VEGA DOMINGUEZ">MARIA DOLORES DE LA VEGA DOMINGUEZ</option>
		<option value="ANA KAREN VEGA AMBRIZ">ANA KAREN VEGA AMBRIZ</option>
		<option value="IRVING EDUARDO VIVEROS CAMACHO">IRVING EDUARDO VIVEROS CAMACHO</option>
        <option value="NO APLICA">NO APLICA</option>
        <option value="TODOSLOCALES">TODOS LOS LOCALES</option>
        <option value="COMUNIDADES">COMUNIDADES</option>
        <option value="PROTECCION">PROTECCION</option>
        <option value="DOCUMENTACION">DOCUMENTACION</option>
        <option value="ADMINISTRACION">ADMINISTRACION</option>
        <option value="INFORMATICA">INFORMATICA</option>
      </select>
    </td>
  </tr>
   
  <tr>
  <td colspan="4" align="right"><input type="button" onclick="document.location.reload();" value="Nuevo" name="http://192.168.39.31/intranet/index.php/control-de-gestion" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Borrar información">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Guardar" value="Guardar"></td>
  </tr>
    
</table>

</form>


<?php
error_reporting(E_ALL & ~E_NOTICE);  



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

          $queryb = "SELECT MAX(folio) FROM gestion";
		  $result = $con->query($queryb);
		  
		 		 if ($rowb = mysqli_fetch_row($result))
                     {
                        $idb = trim($rowb[0]);
                     }
					 
		
         $consulta = "SELECT folio FROM gestion ORDER BY ID DESC LIMIT 1";
		 $resulta = $con->query($consulta);
		  while($rows=mysqli_fetch_array($resulta)){
			 echo "<br><p style='color:#F00; font-size:12px'><br>Ultimo número tomado FIA  $rows[0] </p>";
			 
		  }
					 
		mysqli_close($con); 			 
												 
                      /*echo "<br><p style='color:#F00; font-size:12px'><br>Ultimo número registrado <b>$idb</b></p>";	*/
	  	 
    
?>

</div>
</body>
</html>