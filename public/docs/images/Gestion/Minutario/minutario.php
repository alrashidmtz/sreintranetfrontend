<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="120"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Minutario</title>
<style type="text/css">
body{width:90%;margin:auto;min-width:600px;max-width:2000px}

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

<form action="http://192.168.39.31/intranet/index.php?option=com_content&view=article&id=37" method="post">
<table align="center" >
<tr>
<td colspan="2">
<?php



if (isset($_SESSION['exito'])){
echo "<b style='font-size:18px'><center><font color='#FF0000'>".$_SESSION['exito']."</font></center></b>";
} 

else{
	echo "";
}
unset($_SESSION['exito']);
?>
</td>
</tr>
  <tr>
  <th colspan="2"><h2 align="center">MINUTARIO</h2></th>
  </tr>
  <tr>
    <th>No. de Folio 
    <?php $host = "localhost";
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
					 
		mysqli_close($con); 			 
												 
						echo "<br><b style='color:#000; font-size:12px'><br>FIA $idb</b>";	
	  	 
    ?>
    </th>
    
    <th align="center">Fecha:<input type="date" name="fecha" min="2016-01-01" max="2030-12-31" step="0">
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
    </th>
  </tr>
  <tr>    
    <td align="center">Tipo de Documento<br/>
      <select name="tipodocumento">
        <option value="">SELECCIONE</option>
        <option value="CORREO ELECTRONICO">CORREO ELECTRONICO</option>
        <option value="CARTA">CARTA</option>
        <option value="FAX">FAX</option>
        <option value="NOTA">NOTA</option>
        <option value="OFICIO">OFICIO</option>
        <option value="VALIJA DIPLOM??TICA">VALIJA DIPLOM??TICA</option>
        <option value="OTRO">OTRO</option>
        <option value="CORREOGRAMA VALIJA">CORREOGRAMA VALIJA</option>
      </select>
      <br />
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
      
     
    <td align="center">CADIDO<br/>    
      <select name="sicar">
       <option value="">SELECCIONE</option>
       <option value="Secci??n01C Legislaci??n">Secci??n 01C Legislaci??n">01C Legislaci??n">Secci??n 01C Legislaci??n</option>
<option value="Serie 01C.02Programas y proyectos en materia de legislaci??n">01C.02Programas y proyectos en materia de legislaci??n</option>
<option value="Serie01C.10Instrumentos jur??dicos consensuales (convenios, bases de colaboraci??n, acuerdos, etc.)">01C.10Instrumentos jur??dicos consensuales (convenios, bases de colaboraci??n, acuerdos, etc.)</option>
<option value="Serie01C.13Diario Oficial de la Federaci??n (publicaciones en el)">01C.13Diario Oficial de la Federaci??n (publicaciones en el)</option>
<option value="Secci??n02C Asuntos jur??dicos">02C Asuntos jur??dicos</option>
<option value="Serie 02C.03Registro y certificaci??n de firmas">02C.03Registro y certificaci??n de firmas</option>
<option value="Serie02C.05Actuaciones y representaciones en materia legal">02C.05Actuaciones y representaciones en materia legal</option>
<option value="Serie02C.06Asistencia, consulta y asesor??as">02C.06Asistencia, consulta y asesor??as</option>
<option value="Serie02C.08Juicios contra la dependencia">02C.08Juicios contra la dependencia</option>
<option value="Serie02C.09Juicios de la dependencia">02C.09Juicios de la dependencia</option>
<option value="Serie02C.10Amparos">02C.10Amparos</option>
<option value="Secci??n03C Programaci??n, organizaci??n y presupuestaci??n">03C Programaci??n, organizaci??n y presupuestaci??n</option>
<option value="Serie 03C.04Programa anual de inversiones">03C.04Programa anual de inversiones</option>
<option value="Serie03C.11Integraci??n y dictamen de manuales de organizaci??n">03C.11Integraci??n y dictamen de manuales de organizaci??n</option>
<option value="Serie 03C.12Integraci??n y dictamen de manuales, normas y lineamientos de procesos y procedimientos">03C.12Integraci??n y dictamen de manuales, normas y lineamientos de procesos y procedimientos</option>
<option value="Serie 03C.13Acciones de modernizaci??n administrativa">03C.13Acciones de modernizaci??n administrativa</option>
<option value="Serie 03C.18Programas y proyectos en materia de presupuestaci??n">03C.18Programas y proyectos en materia de presupuestaci??n</option>
<option value="Serie 03C.20Evaluaci??n y control del ejercicio presupuestal">03C.20Evaluaci??n y control del ejercicio presupuestal</option>
<option value="Serie 03C.21Comit?? de mejora regulatoria interna">03C.21Comit?? de mejora regulatoria interna</option>
<option value="Secci??n04C Recursos humanos">04C Recursos humanos</option>
<option value="Serie 04C.02Programas y proyectos en materia de recursos humanos">04C.02Programas y proyectos en materia de recursos humanos</option>
<option value="Serie04C.03Expediente ??nico de personal">04C.03Expediente ??nico de personal</option>
<option value="Subserie04C.03.01Personal del Servicio Exterior Mexicano">04C.03.01Personal del Servicio Exterior Mexicano</option>
<option value="Subserie04C.03.02Personal de prestaci??n de servicios profesionales por honorarios">04C.03.02Personal de prestaci??n de servicios profesionales por honorarios</option>
<option value="Subserie04C.03.03Personal de la Canciller??a">04C.03.03Personal de la Canciller??a</option>
<option value="Serie04C.04 Registro y control de puestos y plazas">04C.04 Registro y control de puestos y plazas</option>
<option value="Serie 04C.05 N??mina de pago de personal">04C.05 N??mina de pago de personal</option>
<option value="Serie04C.06 Reclutamiento y selecci??n de personal">04C.06 Reclutamiento y selecci??n de personal</option>
<option value="Serie 04C.08 Control de asistencia (vacaciones, descansos y licencias, incapacidades, etc.)">04C.08 Control de asistencia (vacaciones, descansos y licencias, incapacidades, etc.)</option>
<option value="Serie04C.11 Est??mulos y recompensas">04C.11 Est??mulos y recompensas</option>
<option value="Serie04C.15 Afiliaciones al Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado">04C.15 Afiliaciones al Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado</option>
<option value="Serie04C.16Control de prestaciones en materia econ??mica (FONAC, Sistema de Ahorro para el Retiro, Seguros, etc.)">04C.16Control de prestaciones en materia econ??mica (FONAC, Sistema de Ahorro para el Retiro, Seguros, etc.)</option>
<option value="Serie04C.20Relaciones laborales (comisiones mixtas, sindicato nacional de trabajad            ores al servicio del estado, condiciones laborales)">04C.20Relaciones laborales (comisiones mixtas, sindicato nacional de trabajad            ores al servicio del estado, condiciones laborales)</option>
<option value="Serie04C.21Servicios sociales y culturales y de seguridad e higiene en el trabajo">04C.21Servicios sociales y culturales y de seguridad e higiene en el trabajo</option>
<option value="Serie04C.22 Capacitaci??n continua y desarrollo profesional del personal de las ??reas administrativas">04C.22 Capacitaci??n continua y desarrollo profesional del personal de las ??reas administrativas</option>
<option value="Serie04C.23 Servicio social de ??reas administrativas">04C.23 Servicio social de ??reas administrativas</option>
<option value="Serie04C.29 Comit?? de ??tica y de prevenci??n de conflictos de inter??s">04C.29 Comit?? de ??tica y de prevenci??n de conflictos de inter??s</option>
<option value="Secci??n05C Recursos financieros">05C Recursos financieros</option>
<option value="Serie 05C.03Gastos o egresos por partida presupuestal">05C.03Gastos o egresos por partida presupuestal</option>
<option value="Subserie05C.03.01Radicaciones a las Representaciones de M??xico en el Exterior">05C.03.01Radicaciones a las Representaciones de M??xico en el Exterior</option>
<option value="Subserie05C.03.02Control de vi??ticos de la Canciller??a">05C.03.02Control de vi??ticos de la Canciller??a</option>
<option value="Subserie05C.03.03Control de vi??ticos del Servicio Exterior Mexicano ">05C.03.03Control de vi??ticos del Servicio Exterior Mexicano </option>
<option value="Subserie05C.03.04Control de menaje de casa, gastos de instalaci??n y pasajes">05C.03.04Control de menaje de casa, gastos de instalaci??n y pasajes</option>
<option value="Serie 05C.04Ingresos ">05C.04Ingresos </option>
<option value="Serie 05C.05 Libros contables ">05C.05 Libros contables </option>
<option value="Serie 05C.06 Registros contables (glosa)">05C.06 Registros contables (glosa)</option>
<option value="Subserie 05C.06.01Cuentas por liquidar certificadas de gastos de inversi??n">05C.06.01Cuentas por liquidar certificadas de gastos de inversi??n</option>
<option value="Serie 05C.12Asignaci??n y optimizaci??n de recursos financieros">05C.12Asignaci??n y optimizaci??n de recursos financieros</option>
<option value="Serie 05C.14 Cuentas por liquidar certificadas">05C.14 Cuentas por liquidar certificadas</option>
<option value="Serie 05C.15 Transferencias de presupuesto">05C.15 Transferencias de presupuesto</option>
<option value="Serie 05C.22 Control de cheques">05C.22 Control de cheques</option>
<option value="Serie 05C.23Conciliaciones">05C.23Conciliaciones</option>
<option value="Serie 05C.27Fondo rotatorio (revolvente)">05C.27Fondo rotatorio (revolvente)</option>
<option value="Secci??n06C Recursos materiales y obra p??blica">06C Recursos materiales y obra p??blica</option>
<option value="Serie 06C.02 Programas y proyectos en materia de recursos materiales,  obra p??blica, conservaci??n y mantenimiento">06C.02 Programas y proyectos en materia de recursos materiales,  obra p??blica, conservaci??n y mantenimiento</option>
<option value="Serie 06C.04 Adquisiciones">06C.04 Adquisiciones</option>
<option value="Subserie06C.04.01 Licitaci??n p??blica">06C.04.01 Licitaci??n p??blica</option>
<option value="Subserie06C.04.02 Invitaci??n a cuando menos tres personas">06C.04.02 Invitaci??n a cuando menos tres personas</option>
<option value="Subserie06C.04.03 Adjudicaci??n directa">06C.04.03 Adjudicaci??n directa</option>
<option value="Serie06C.06 Control de contratos">06C.06 Control de contratos</option>
<option value="Serie06C.07 Seguros y fianzas">06C.07 Seguros y fianzas</option>
<option value="Serie06C.13 Conservaci??n y mantenimiento de la infraestructura f??sica">06C.13 Conservaci??n y mantenimiento de la infraestructura f??sica</option>
<option value="Serie06C.14 Registro de proveedores y contratistas">06C.14 Registro de proveedores y contratistas</option>
<option value="Serie06C.15Arrendamientos">06C.15Arrendamientos</option>
<option value="Serie06C.17 Inventario f??sico y control de bienes muebles">06C.17 Inventario f??sico y control de bienes muebles</option>
<option value="Subserie06C.17.01Control del patrimonio art??stico">06C.17.01Control del patrimonio art??stico</option>
<option value="Serie06C.18Inventario f??sico y control de bienes inmuebles">06C.18Inventario f??sico y control de bienes inmuebles</option>
<option value="Serie06C.19 Almacenamiento, control y distribuci??n de bienes muebles">06C.19 Almacenamiento, control y distribuci??n de bienes muebles</option>
<option value="Serie06C.22 Control y seguimiento de obras y remodelaciones">06C.22 Control y seguimiento de obras y remodelaciones</option>
<option value="Serie06C.23 Comit??s y subcomit??s de adquisiciones, arrendamientos y servicios">06C.23 Comit??s y subcomit??s de adquisiciones, arrendamientos y servicios</option>
<option value="Serie06C.24 Comit?? de enajenaci??n de bienes muebles e inmuebles">06C.24 Comit?? de enajenaci??n de bienes muebles e inmuebles</option>
<option value="Serie06C.25 Comit?? de obra p??blica">06C.25 Comit?? de obra p??blica</option>
<option value="Secci??n07C Servicios generales">07C Servicios generales</option>
<option value="Serie07C.03 Servicios b??sicos (energ??a el??ctrica, agua, predial, etc.)">07C.03 Servicios b??sicos (energ??a el??ctrica, agua, predial, etc.)</option>
<option value="Serie07C.10 Servicios especializados de mensajer??a">07C.10 Servicios especializados de mensajer??a</option>
<option value="Serie07C.11Mantenimiento, conservaci??n e instalaci??n de mobiliario">07C.11Mantenimiento, conservaci??n e instalaci??n de mobiliario</option>
<option value="Serie07C.13 Control de parque vehicular">07C.13 Control de parque vehicular</option>
<option value="Serie07C.14 Control de combustible">07C.14 Control de combustible</option>
<option value="Serie07C.15Control de servicios en auditorios y salas">07C.15Control de servicios en auditorios y salas</option>
<option value="Serie07C.16 Protecci??n civil">07C.16 Protecci??n civil</option>
<option value="Secci??n08C Tecnolog??as y servicios de la informaci??n">08C Tecnolog??as y servicios de la informaci??n</option>
<option value="Serie08C.04Desarrollo e infraestructura de telecomunicaciones">08C.04Desarrollo e infraestructura de telecomunicaciones</option>
<option value="Serie08C.05 Desarrollo e infraestructura del portal de internet de la dependencia">08C.05 Desarrollo e infraestructura del portal de internet de la dependencia</option>
<option value="Serie08C.09 Desarrollo inform??tico">08C.09 Desarrollo inform??tico</option>
<option value="Serie08C.10Seguridad inform??tica">08C.10Seguridad inform??tica</option>
<option value="Serie08C.11 Desarrollo de sistemas">08C.11 Desarrollo de sistemas</option>
<option value="Serie08C.16 Administraci??n y servicios de archivo">08C.16 Administraci??n y servicios de archivo</option>
<option value="Serie08C.18Administraci??n y servicios de bibliotecas">08C.18Administraci??n y servicios de bibliotecas</option>
<option value="Serie08C.19Administraci??n y servicios de otros centros documentales">08C.19Administraci??n y servicios de otros centros documentales</option>
<option value="Serie08C.24Productos para la divulgaci??n de servicios">08C.24Productos para la divulgaci??n de servicios</option>
<option value="Serie08C.25Servicios y productos en internet o intranet">08C.25Servicios y productos en internet o intranet</option>
<option value="Secci??n09C Comunicaci??n social ">09C Comunicaci??n social </option>
<option value="Serie09C.02 Programas y proyectos en materia de comunicaci??n social">09C.02 Programas y proyectos en materia de comunicaci??n social</option>
<option value="Serie09C.04 Material multimedia">09C.04 Material multimedia</option>
<option value="Serie09C.05Publicidad institucional">09C.05Publicidad institucional</option>
<option value="Serie09C.07 Boletines informativos para medios">09C.07 Boletines informativos para medios</option>
<option value="Serie09C.09 Agencias period??sticas, de noticias, reporteros y articulistas, cadenas televisivas y otros medios de comunicaci??n social">09C.09 Agencias period??sticas, de noticias, reporteros y articulistas, cadenas televisivas y otros medios de comunicaci??n social</option>
<option value="Serie09C.13 Comparecencias ante el poder legislativo">09C.13 Comparecencias ante el poder legislativo</option>
<option value="Secci??n10C Control y auditor??a de actividades p??blicas">10C Control y auditor??a de actividades p??blicas</option>
<option value="Serie10C.02Programas y proyectos en materia de control y auditor??a">10C.02Programas y proyectos en materia de control y auditor??a</option>
<option value="Subserie10C.02.01Sistema de control interno institucional">10C.02.01Sistema de control interno institucional</option>
<option value="Subserie10C.02.02Administraci??n de riesgos institucionales">10C.02.02Administraci??n de riesgos institucionales</option>
<option value="Subserie10C.02.03Comit?? de control y desempe??o institucional">10C.02.03Comit?? de control y desempe??o institucional</option>
<option value="Serie10C.06Seguimiento a la aplicaci??n en medidas o recomendaciones">10C.06Seguimiento a la aplicaci??n en medidas o recomendaciones</option>
<option value="Serie10C.15 Entrega???recepci??n">10C.15 Entrega???recepci??n</option>
<option value="Serie10C.16Libros blancos">10C.16Libros blancos</option>
<option value="Secci??n11C Programaci??n, informaci??n, evaluaci??n y pol??ticas">11C Programaci??n, informaci??n, evaluaci??n y pol??ticas</option>
<option value="Serie11C.04Programas y proyectos en materia de informaci??n y evaluaci??n">11C.04Programas y proyectos en materia de informaci??n y evaluaci??n</option>
<option value="Serie11C.16Informe de labores">11C.16Informe de labores</option>
<option value="Secci??n12C Transparencia y acceso a la Informaci??n">12C Transparencia y acceso a la Informaci??n</option>
<option value="Serie 12C.05 Comit?? de transparencia">12C.05 Comit?? de transparencia</option>
<option value="Serie12C.06 Solicitudes de acceso a la informaci??n">12C.06 Solicitudes de acceso a la informaci??n</option>
<option value="Serie12C.07 Portal de transparencia">12C.07 Portal de transparencia</option>
<option value="Serie12C.10 Sistemas de datos personales">12C.10 Sistemas de datos personales</option>
<option value="Secci??n01S Conducci??n de la pol??tica exterior de M??xico">01S Conducci??n de la pol??tica exterior de M??xico</option>
<option value="Serie01S.01 Disposiciones en materia de pol??tica exterior de M??xico">01S.01 Disposiciones en materia de pol??tica exterior de M??xico</option>
<option value="Serie01S.02 Programas y proyectos en materia de pol??tica exterior de M??xico">01S.02 Programas y proyectos en materia de pol??tica exterior de M??xico</option>
<option value="Serie01S.03Ampliaci??n de la presencia diplom??tica de M??xico en el mundo">01S.03Ampliaci??n de la presencia diplom??tica de M??xico en el mundo</option>
<option value="Serie01S.04Celebraci??n de tratados, acuerdos, convenios y convenciones internacionales">01S.04Celebraci??n de tratados, acuerdos, convenios y convenciones internacionales</option>
<option value="Serie01S.05Intervenci??n en foros, comisiones, congresos, conferencias y exposiciones internacionales">01S.05Intervenci??n en foros, comisiones, congresos, conferencias y exposiciones internacionales</option>
<option value="Serie01S.06Defensa de los intereses de M??xico en litigios internacionales">01S.06Defensa de los intereses de M??xico en litigios internacionales</option>
<option value="Serie01S.07Atenci??n de los asuntos de Estado internacionales">01S.07Atenci??n de los asuntos de Estado internacionales</option>
<option value="Serie01S.08Atenci??n de los asuntos de Estado interiores">01S.08Atenci??n de los asuntos de Estado interiores</option>
<option value="Serie01S.09Coordinaci??n de las acciones que realicen las dependencias del gobierno federal en el extranjero">01S.09Coordinaci??n de las acciones que realicen las dependencias del gobierno federal en el extranjero</option>
<option value="Serie01S.10Sesiones de la Comisi??n Consultiva de Pol??tica Exterior">01S.10Sesiones de la Comisi??n Consultiva de Pol??tica Exterior</option>
<option value="Serie01S.11Comisi??n de Personal del Servicio Exterior Mexicano">01S.11Comisi??n de Personal del Servicio Exterior Mexicano</option>
<option value="Subserie01S.11.01Control de ingresos">01S.11.01Control de ingresos</option>
<option value="Subserie01S.11.02Control de rotaciones">01S.11.02Control de rotaciones</option>
<option value="Subserie01S.11.03Control de evaluaci??n y ascensos">01S.11.03Control de evaluaci??n y ascensos</option>
<option value="Subserie01S.11.04Control de asuntos disciplinarios">01S.11.04Control de asuntos disciplinarios</option>
<option value="Subserie01S.11.05Control de prestaciones">01S.11.05Control de prestaciones</option>
<option value="Subserie01S.11.06Control administrativo en la Representaci??n ">01S.11.06Control administrativo en la Representaci??n </option>
<option value="Subserie01S.11.07Personal asimilado al Servicio Exterior Mexicano">01S.11.07Personal asimilado al Servicio Exterior Mexicano</option>
<option value="Secci??n02S Actuaci??n internacional del Gobierno de la Rep??blica">02S Actuaci??n internacional del Gobierno de la Rep??blica</option>
<option value="Serie02S.01 Disposiciones en materia de actuaci??n internacional del Gobierno de la Rep??blica">02S.01 Disposiciones en materia de actuaci??n internacional del Gobierno de la Rep??blica</option>
<option value="Serie02S.02 Programas y proyectos en materia de pol??tica exterior de M??xico">02S.02 Programas y proyectos en materia de pol??tica exterior de M??xico</option>
<option value="Serie02S.03Cooperaci??n internacional para el desarrollo">02S.03Cooperaci??n internacional para el desarrollo</option>
<option value="Subserie02S.03.01Gesti??n de acuerdos, acciones y programas de cooperaci??n cultural, educativa, t??cnica, cient??fica y de derechos humanos">02S.03.01Gesti??n de acuerdos, acciones y programas de cooperaci??n cultural, educativa, t??cnica, cient??fica y de derechos humanos</option>
<option value="Subserie02S.03.02Fortalecimiento de las relaciones comerciales, econ??micas y tur??sticas">02S.03.02Fortalecimiento de las relaciones comerciales, econ??micas y tur??sticas</option>
<option value="Subserie02S.03.03Actuaciones ante Organismos y Mecanismos Internacionales y Regionales">02S.03.03Actuaciones ante Organismos y Mecanismos Internacionales y Regionales</option>
<option value="Serie02S.04Acreditaci??n del Cuerpo Diplom??tico, Consular y Funcionarios de los Organismos Internacionales con Sede y Representaci??n ante el Gobierno de M??xico">02S.04Acreditaci??n del Cuerpo Diplom??tico, Consular y Funcionarios de los Organismos Internacionales con Sede y Representaci??n ante el Gobierno de M??xico</option>
<option value="Serie02S.05Promoci??n y defensa de los intereses de M??xico en el exterior, en los ??mbitos multilateral, bilateral y regional">02S.05Promoci??n y defensa de los intereses de M??xico en el exterior, en los ??mbitos multilateral, bilateral y regional</option>
<option value="Serie02S.06Gesti??n de acciones protocolarias">02S.06Gesti??n de acciones protocolarias</option>
<option value="Secci??n03S Protecci??n y asistencia a connacionales y extranjeros">03S Protecci??n y asistencia a connacionales y extranjeros</option>
<option value="Serie 03S.01 Disposiciones en materia de protecci??n y asistencia a connacionales y extranjeros">03S.01 Disposiciones en materia de protecci??n y asistencia a connacionales y extranjeros</option>
<option value="Serie03S.02Programas y proyectos en materia de protecci??n y asistencia a connacionales y extranjeros">03S.02Programas y proyectos en materia de protecci??n y asistencia a connacionales y extranjeros</option>
<option value="Serie03S.03Formalizaci??n y consolidaci??n de la red de delegaciones en territorio nacional y representaciones de M??xico en el exterior">03S.03Formalizaci??n y consolidaci??n de la red de delegaciones en territorio nacional y representaciones de M??xico en el exterior</option>
<option value="Serie03S.04Servicio consular y migratorio">03S.04Servicio consular y migratorio</option>
<option value="Subserie03S.04.01Servicios, tr??mites y documentaci??n">03S.04.01Servicios, tr??mites y documentaci??n</option>
<option value="Subserie03S.04.02Asistencia jur??dica">03S.04.02Asistencia jur??dica</option>
<option value="Subserie03S.04.03Asistencia de protecci??n">03S.04.03Asistencia de protecci??n</option>
<option value="Serie03S.05Sesiones del Comit?? para la Asistencia a Casos de Protecci??n Consular que requieren apoyos econ??micos">03S.05Sesiones del Comit?? para la Asistencia a Casos de Protecci??n Consular que requieren apoyos econ??micos</option>
<option value="Serie03S.06Expedici??n de pasaportes ">03S.06Expedici??n de pasaportes </option>
<option value="Serie03S.07Legalizaci??n de firmas de documentos p??blicos ">03S.07Legalizaci??n de firmas de documentos p??blicos </option>
<option value="Serie03S.08Expedici??n de documentos de identidad y viaje a extranjeros">03S.08Expedici??n de documentos de identidad y viaje a extranjeros</option>
<option value="Serie03S.09Servicio delegacional">03S.09Servicio delegacional</option>


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
      
  </tr>
  <tr>
    <td align="center" colspan="2">Asunto:<br />    
      <textarea name="asunto" rows="5" cols="50" style="width:auto;"></textarea>
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
  </tr>
  <tr>
    <td align="center">Referencia<br/>    
      <input type="text" name="rminutario" />
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
    <td align="center">
      <input type="checkbox" name="Sinreferencia" value="Sinreferencia" > Sin referencia
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
  </tr>
  
  <tr>
    <td align="center">Elabor?? del SEM<br/>    
      <select name="sem">
        <option value="">SELECCIONE</option>
		<option value="CARLOS GUSTAVO OBRADOR GARRIDO CUESTA">CARLOS GUSTAVO OBRADOR GARRIDO CUESTA</option>
		<option value="RAUL GARCIA ZENTLAPAL">RAUL GARCIA ZENTLAPAL</option>
        <option value="MARIA DEL ROCIO VAZQUEZ ALVAREZ">MARIA DEL ROCIO VAZQUEZ ALVAREZ</option>
		<option value="SEBASTIAN ALFONSO GALVAN DUQUE COVARRUBIAS">SEBASTIAN ALFONSO GALVAN DUQUE COVARRUBIAS</option>
		<option value="VALERIA RAMIREZ SILLER">VALERIA RAMIREZ SILLER</option>
		<option value="JOSE LUIS ALATORRE OROZCO">JOSE LUIS ALATORRE OROZCO</option>
      </select>
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
 
  
    <td align="center">Elabor?? LOCAL<br/>
      <select name="local">
        <option value="">SELECCIONE</option>
        <option value="NO APLICA">NO APLICA</option>
		<option value="AL RASHID MARTINEZ ARRIOLA">AL RASHID MARTINEZ ARRIOLA</option>
		<option value="ALEJANDRA ELIDETH OLIVARES PATI??O">ALEJANDRA ELIDETH OLIVARES PATI??O</option>
		<option value="ALEXIA AMADA ESPINOZA SOTO">ALEXIA AMADA ESPINOZA SOTO</option>
		<option value="ALICIA MEJIA MONROY">ALICIA MEJIA MONROY</option>
		<option value="CARLOS JESUS PEREZ LARA">CARLOS JESUS PEREZ LARA</option>
		<option value="EDWIN MORALES ACOSTA">EDWIN MORALES ACOSTA</option>
		<option value="ESPERANZA LIZZET REYES CORTES">ESPERANZA LIZZET REYES CORTES</option>
		<option value="FEDERICO YOSHIRO YAMASAKI BUSSEY">FEDERICO YOSHIRO YAMASAKI BUSSEY</option>
		<option value="GERARDO CORONADO BENITEZ">GERARDO CORONADO BENITEZ</option>
		<option value="GUSTAVO RICARDO RAMIREZ CIFUENTES">GUSTAVO RICARDO RAMIREZ CIFUENTES</option>
		<option value="HUGO EDUARDO BARRERA RETAMA">HUGO EDUARDO BARRERA RETAMA</option>
		<option value="IRVING EDUARDO VIVEROS CAMACHO">IRVING EDUARDO VIVEROS CAMACHO</option>
		<option value="IVETTE COMPEAN RODRIGUEZ">IVETTE COMPEAN RODRIGUEZ</option>
		<option value="JOSE RAUL ESCAMILLA MENDOZA">JOSE RAUL ESCAMILLA MENDOZA</option>
		<option value="KEVIN ALONSO JIMENEZ MARTINEZ">KEVIN ALONSO JIMENEZ MARTINEZ</option>
		<option value="LORRAINE RESENDIZ MARTINEZ">LORRAINE RESENDIZ MARTINEZ</option>
		<option value="MARCELA RIOS CORTEZ">MARCELA RIOS CORTEZ</option>
		<option value="MARIA DOLORES DE LA VEGA DOMINGUEZ">MARIA DOLORES DE LA VEGA DOMINGUEZ</option>
		<option value="MARIA JOSE HERNANDEZ MENDEZ">MARIA JOSE HERNANDEZ MENDEZ</option>
		<option value="MARISELA RAMIREZ GARDU??O">MARISELA RAMIREZ GARDU??O</option>
		<option value="PABLO VEGA CRUZ">PABLO VEGA CRUZ</option>
		<option value="STEPHANY ALEXANDRA PLACIDO VELAZCO">STEPHANY ALEXANDRA PLACIDO VELAZCO</option>
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
      
  </tr>
  
  <tr>
  <td colspan="4" align="right"><input type="button" onclick="document.location.reload();" value="Nuevo" name="http://192.168.39.31/Gestion/minutario/minutario.php" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Borrar informaci??n">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Guardar" value="Guardar"></td>
  </tr>
  
  
</table>
 

</form>

<?php
error_reporting(E_ALL & ~E_NOTICE);  
?>

<?php $host = "localhost";
          $user = "root";
          $pw = "";
          $base = "minutario";
          $con = new mysqli($host,$user,$pw,$base);
		  
		  if ($con->connect_error){
			  die("Connection failed: " . $con->connect_error);
		  }
		  
		  
		  $codigo = "SET NAMES 'utf8'";
		  $resulta = $con->query($codigo);

          $queryb = "SELECT MAX(Id) FROM info_minutario";
		  $result = $con->query($queryb);
		  
		 		 if ($rowb = mysqli_fetch_row($result))
                     {
                        $idb = trim($rowb[0]);
                     }
					 
		 $consulta = "SELECT sem,local FROM info_minutario ORDER BY ID DESC LIMIT 1";
		 $resulta = $con->query($consulta);
		  while($rows=mysqli_fetch_array($resulta)){
			 echo "<br><p style='color:#F00; font-size:18px'><br>Ultimo n??mero tomado FIA $idb </p>";
			 echo "<p style='color:#000; font-size:14px'><br>Tomado por: SEM $rows[0] Local $rows[1]</p>";
		  }
		 		 					 
		mysqli_close($con); 			 
												 
    ?>
</div>

</body>
</html>
