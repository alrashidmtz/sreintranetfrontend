// JavaScript Document


var editando=false;

 

function transformarEnEditable(nodo){

//El nodo recibido es SPAN

if (editando == false) {

var nodoTd = nodo.parentNode; //Nodo TD

var nodoTr = nodoTd.parentNode; //Nodo TR

var nodoContenedorForm = document.getElementById('contenedorForm'); //Nodo DIV

var nodosEnTr = nodoTr.getElementsByTagName('td');

var folio = nodosEnTr[0].textContent;
var fecha = nodosEnTr[1].textContent;
var solicitud = nodosEnTr[2].textContent;
var cantidad = nodosEnTr[3].textContent;
var identificacion = nodosEnTr[4].textContent;
var curp = nodosEnTr[5].textContent;
var nombre = nodosEnTr[6].textContent;
var sexo = nodosEnTr[7].textContent;
var estado = nodosEnTr[8].textContent;
var pais = nodosEnTr[9].textContent;
var provincia = nodosEnTr[10].textContent;
var fechanacimiento = nodosEnTr[11].textContent;
var padre = nodosEnTr[12].textContent;

var madre = nodosEnTr[13].textContent;
var domicilio = nodosEnTr[14].textContent;
var telefono = nodosEnTr[15].textContent;

var email = nodosEnTr[16].textContent;
var pspi = nodosEnTr[17].textContent;
var sem = nodosEnTr[18].textContent;
var observaciones = nodosEnTr[19].textContent;




var nuevoCodigoHtml =

'<tr><td>Folio</td><td> <input class="up" type="text" name="folio" id="folio" value="'+folio+'"></td></tr>'+
'<tr><td>Fecha</td><td> <input class="up" type="text" name="fecha" id="fecha" value="'+fecha+'"></td></tr>'+
'<tr><td>No.de Solicitud</td><td><input class="up" type="text" name="solicitud" id="solicitud" value="'+solicitud+'"></td></tr>'+
'<tr><td>Cantidad</td><td> <input class="up" type="text" name="cantidad" id="cantidad" value="'+cantidad+'"></td></tr>'+
'<tr><td>Identificación</td><td> <input class="up" type="text" name="identificacion" id="identificacion" value="'+identificacion+'"></td></tr>'+
'<tr><td>CURP</td><td> <input class="up" type="text" name="curp" id="curp" value="'+curp+'"></td></tr>'+
'<tr><td>Nombre</td><td> <input class="up" type="text" name="nombre" id="nombre" value="'+nombre+'"></td></tr>'+
'<tr><td>Sexo</td><td> <input class="up" type="text" name="sexo" id="sexo" value="'+sexo+'"></td></tr>'+
'<tr><td>Estado de Registro</td><td> <input class="up" type="text" name="estado" id="estado" value="'+estado+'"></td></tr>'+
'<tr><td>Estado de Nacimiento</td><td> <input class="up" type="text" name="pais" id="pais" value="'+pais+'"></td></tr>'+
'<tr><td>Municipio</td><td> <input class="up" type="text" name="provincia" id="provincia" value="'+provincia+'"></td></tr>'+
'<tr><td>Fecha de Nacimiento</td><td> <input class="up" type="text" name="fechanacimiento" id="fechanacimiento" value="'+fechanacimiento+'"></td></tr>'+
'<tr><td>Nombre del Padre</td><td> <input class="up" type="text" name="padre" id="padre" value="'+padre+'"></td></tr>'+
'<tr><td>Nombre de la Madre</td><td> <input class="up" type="text" name="madre" id="madre" value="'+madre+'"></td></tr>'+

'<tr><td>Domicilio</td><td> <input class="up" type="text" name="domicilio" id="domicilio" value="'+domicilio+'"></td></tr>'+
'<tr><td>Teléfono</td><td> <input class="up" type="text" name="telefono" id="telefono" value="'+telefono+'"></td></tr>'+

'<tr><td>Email</td><td> <input class="up" type="text" name="email" id="email" value="'+email+'"></td></tr>'+
'<tr><td>PSPI</td><td> <input class="up" type="text" name="pspi" id="pspi" value="'+pspi+'"></td></tr>'+
'<tr><td>SEM</td><td> <input class="up" type="text" name="sem" id="sem" value="'+sem+'"></td></tr>'+

'<tr><td>Observaciones</td><td><br><textarea class="up" rows="4" cols="50" name="observaciones" id="observaciones">'+observaciones+'</textarea></td></tr>'+



'<tr><td colspan="2">En edición</td></tr>';

nodoTr.innerHTML = nuevoCodigoHtml; 

nodoContenedorForm.innerHTML = '<tr><td align="center">Desea guardar los cambios?</td></tr>'+

'<tr><td align="center"><form name = "formulario" action="http://192.168.39.31/intranet/index.php?option=com_content&view=article&id=70" method="POST" onsubmit="capturarEnvio()" onreset="anular()"></td></tr>'+

'<tr><td align="center"><input class="button" type="submit" value="Aceptar"> <input class="button" type="reset" value="Cancelar"></td></tr>';

editando = "true";}


}

 

function capturarEnvio(){

var nodoContenedorForm = document.getElementById('contenedorForm'); //Nodo DIV

nodoContenedorForm.innerHTML = 'Pulse Aceptar para guardar los cambios o cancelar para anularlos'+

'<form name="formulario" action="http://192.168.39.31/intranet/index.php?option=com_content&view=article&id=70" method="post" onsubmit="capturarEnvio()" onreset="anular()">'+

'<input class="up" type="hidden" name="folio" value="'+document.querySelector('#folio').value+'">'+

'<input class="up" type="hidden" name="fecha" value="'+document.querySelector('#fecha').value+'">'+

'<input class="up" type="hidden" name="solicitud" value="'+document.querySelector('#solicitud').value+'">'+

'<input class="up" type="hidden" name="cantidad" value="'+document.querySelector('#cantidad').value+'">'+

'<input class="up" type="hidden" name="identificacion" value="'+document.querySelector('#identificacion').value+'">'+

'<input class="up" type="hidden" name="curp" value="'+document.querySelector('#curp').value+'">'+

'<input class="up" type="hidden" name="nombre" value="'+document.querySelector('#nombre').value+'">'+

'<input class="up" type="hidden" name="sexo" value="'+document.querySelector('#sexo').value+'">'+

'<input class="up" type="hidden" name="estado" value="'+document.querySelector('#estado').value+'">'+

'<input class="up" type="hidden" name="pais" value="'+document.querySelector('#pais').value+'">'+

'<input class="up" type="hidden" name="provincia" value="'+document.querySelector('#provincia').value+'">'+

'<input class="up" type="hidden" name="fechanacimiento" value="'+document.querySelector('#fechanacimiento').value+'">'+

'<input class="up" type="hidden" name="padre" value="'+document.querySelector('#padre').value+'">'+

'<input class="up" type="hidden" name="madre" value="'+document.querySelector('#madre').value+'">'+

'<input class="up" type="hidden" name="domicilio" value="'+document.querySelector('#domicilio').value+'">'+

'<input class="up" type="hidden" name="telefono" value="'+document.querySelector('#telefono').value+'">'+

'<input class="up" type="hidden" name="email" value="'+document.querySelector('#email').value+'">'+

'<input class="up" type="hidden" name="pspi" value="'+document.querySelector('#pspi').value+'">'+

'<input class="up" type="hidden" name="sem" value="'+document.querySelector('#sem').value+'">'+

'<textarea rows="4" cols="50" name="observaciones">'+document.querySelector('#observaciones').value+'</textarea>'+

'<input  class="button" type="submit" value="Aceptar"> <input  class="button" type="reset" value="Cancelar">';

document.formulario.submit();

}

 

function anular(){

window.location.reload();

}