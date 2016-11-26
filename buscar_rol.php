<html>
<head>
<link rel="stylesheet" href="librerias/jquery-ui.css" />
<script src="librerias/jquery-3.1.1.min.js"></script>
<script src="main.js"></script>
<script src="librerias/jquery-ui.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="librerias/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="librerias/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>

var correcto = false;
    function siescorrecto(){
		if (correcto == true){        
          buscar(' IS NOT NULL ', '');
       
		}
		
	}
	
$( document ).ready(function() {
	
	buscar(' IS NOT NULL ', '');
	$( "#buscar_rol" ).keyup(function() {
		$(".dinamicos").remove();
		if ($("#buscar_rol").val() != ''){
   buscar(' LIKE ',"'" + $("#buscar_rol").val() + "%'");
		}
	else{

			buscar(' IS NOT NULL ', '');
		}
});
});


function buscar(signo, nombre){
     
		$.post( "selects/select_busqueda_rol.php", {signo: signo, nombre:nombre })
  .done(function( data ) {	
      var lista = '';
	  lista = JSON.parse(data);
      data = null;
     $(".dinamicos").remove();
        // Recorrer el vector de objetos e imprimir la propiedad "nombre" en la consola
        for(var i in lista){					 				
              $('#latabla').append('<tr class="dinamicos"><td><p>'+ lista[i].nombre +'</p></td><td><p>'+ lista[i].descripcion +'</p></td><td><button onClick="ver_permisos();" type="button" class="btn btn-info">Permisos</button> <button onClick="abrir_editar('+ "'" + lista[i].id +"','" + lista[i].nombre +"','" + lista[i].descripcion +"'" + ');" type="button" class="btn btn-warning">Editar</button> <button onClick="abrir_eliminar('+ "'" + lista[i].nombre + "','" + lista[i].id + "'" +');" type="button" class="btn btn-danger">Eliminar</button></td></tr>');			 	     
        }        
 });
}
function abrir_editar(id,nombre,descripcion){
	$("#id_rol_editar").val(id);
$("#nombre_rol_editar").val(nombre);
$("#descripcion_rol_editar").text(descripcion);

$('#editar').modal('show');	
}

function editar(){
	$.post( "updates/editar_rol.php", {id: $("#id_rol_editar").val(), nombre:$("#nombre_rol_editar").val(), descripcion: $("#descripcion_rol_editar").val() })
  .done(function( data ) {	

    if(data == '01'){
			$("#mensajeconfirm").text('Este nombre de rol ya existe, por favor escoja otro nombre.');
			$("#imaenconfirm").attr("src","images/error.png");					         	
		}	
    if(data == '00'){
			$("#mensajeconfirm").text('Rol editado correctamente.');
			$("#imagenconfirm").attr("src","images/cheke.png");
     correcto = true;			
		}	
 $('#mensaje_de_confirmacion').modal('show');
	});
}

function abrir_eliminar(nombre,id){
   $("#p_nombre_rol").text('');
    $("#p_id_rol").text('');
	$("#p_nombre_rol").text($("#p_nombre_rol").text() + nombre);
	$("#p_id_rol").text(id);
     $('#p_id_rol').hide();
    $('#mensaje_eliminar').modal('show');
}

function eliminar_rol(){
	
		$.post( "deletes/borrar_rol.php", {id: $("#p_id_rol").text()})
  .done(function( data ) {	
        $('body').removeClass('modal-open');
         $('.modal-backdrop').remove();
	  $("#div_de_carga").empty();
			$("#div_de_carga").load("buscar_rol.php");
 });
	
}

function ver_permisos(){
$('#permisos_rol').modal('show');
}

function asignar_permisos(){
	$('.check_permisos:checked').each(
    function() {
        alert("El checkbox con valor " + $(this).val() + " está seleccionado");
    }
);
}

</script>
</head>
<body>
<div class="panel panel-default" >
  <div class="panel-heading"><h5>Administrar roles</h5></div>
  <img onClick="ir_mantenimiento();" id="flecha" src="images/volver.png" height="7%" width="4%" style="position:relative; top:6px; left:1%; "></img> 
  <div class="panel-body" >
     
  <label class="control-label col-xs-3">Buscar por nombre:</label>              
 <input id='buscar_rol' type="text" class="form-control" placeholder="buscar por nombre">
 
    <div class="panel panel-default" >
  <!-- Default panel contents -->
  <div class="panel-heading"></div>
    <div style=" height:60%; overflow: scroll;">
  <table id="latabla" class="table" >
     <tr>
    <th>Nombre</th>
    <th>Descripcion</th> 
	<th>Opciones</th> 
  </tr>
  

  
  </table>
  </div>
</div>

  </div>
</div>
<!-- VENTANAS EMERGENTES  -->
<div id="editar" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
		 <img  src="images/editar.png" height="7%" width="8%" align="right" ></img>
         Editar</h4>		 
      </div>

      <div class="modal-body">
        
  	   <label  class="control-label col-xs-5" >Id:</label>
               
	  <input id="id_rol_editar" readonly="readonly" type="text" class="form-control" placeholder="Nombre del rol">
       <label class="control-label col-xs-5">Nombre del rol:</label>
               
	  <input id='nombre_rol_editar' type="text" class="form-control" placeholder="Nombre del rol">
	  
	   <label class="control-label col-xs-5">Descripcion del rol:</label>
         
	  <textarea id='descripcion_rol_editar' class="form-control" rows="3" placeholder="Descripcion del rol"></textarea>
	  <button onClick="editar();" data-dismiss="modal" class="btn btn-primary" value="Enviar">Guardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	
      </div>
      <div class="modal-footer">
	  
      </div>
    </div>
	</div>
</div>
	
	
	<!-- ventana emergente de confirmacion para cerrar -->


<div id="mensaje_eliminar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
		 <img id='imaenconfirm' src="images/question.png" height="7%" width="8%" align="right" ></img>
         ATENCION</h4>		 
      </div>
      <div class="modal-body">
       <p >¿Esta seguro que desea eliminar este rol?</p>
        <p id='p_id_rol'></p>
        <h3 id='p_nombre_rol'>Rol: </h3>
      </div>
      <div class="modal-footer">
	<button onClick='eliminar_rol();' data-dismiss="modal" class="btn btn-danger" value="Enviar">Eliminar</button> 
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
      </div>
    </div>

  </div>
  </div>


<!-- ventana emergente para los permisos ------------------------------------------------------->
<div id="permisos_rol" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">		 
         Permisos</h4>		 
      </div>
      <div class="modal-body">         
        <p id='p_id_rol_permisos'></p>

     <!-- PARTE DONDE VA EL TAB  -------------------------------------------------------------------->
  <div class="tabbable tabs-left"><!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Principal</a></li>
    <li><a href="#tab2" data-toggle="tab">Reportes</a></li>
 <li><a href="#tab3" data-toggle="tab">Ajustes</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <p>I'm in Section 1.</p>
    </div>
	
    <div class="tab-pane" id="tab2">
      <p>Howdy, I'm in Section 2.</p>
    </div>
	
 <div class="tab-pane" id="tab3">
      <ul class="list-group col-xs-6">
  <li class="list-group-item">
         <div class="material-switch">
		 <h4>Crear usuario</h4>
                 Ver:  <input id="someSwitchOptionSuccess" name="someSwitchOption001" class="check_permisos" type="checkbox"/>
                  <label for="someSwitchOptionSuccess" class="label-success"></label> 
             </div>
			 
  </li>
</ul>

             
             

	 
 <div class="tab-pane" id="tab3">
      <ul class="list-group col-xs-6">
  <li class="list-group-item">
         <div class="material-switch">
		 <h4>Crear rol</h4>
                Ver:  <input id="check_crear_rol" name="check_crear_rol" class="check_permisos"  type="checkbox"/>
                  <label for="check_crear_rol" class="label-success"></label> 
              </div>
			 
  </li>
</ul>

	 
<div class="tab-pane" id="tab3">
      <ul class="list-group col-xs-6">
  <li class="list-group-item">
         <div class="material-switch">
		 <h4>Administrar rol</h4>
             
             <div class="material-switch">
               Ver: <input id="check_administrar_rol" name="check_administrar_rol" class="check_permisos" type="checkbox"/>
                  <label for="check_administrar_rol" class="label-success"></label> 

		              </div>
			 
  </li>
</ul>
		  
				  
    </div>
  </div>
</div>
      <!-- FIN DEEL TAB  ---------------------------------------------------------------------------->
        
      </div>
      <div class="modal-footer">
	<button onClick='asignar_permisos();' data-dismiss="modal" class="btn btn-primary" value="Enviar" Style="position:absolute; right:20%; top:85%;">Guardar</button> 
        <button type="button" class="btn btn-default " data-dismiss="modal" Style="position:absolute; right:5%; top:85%">Cancelar</button> 
      </div>
    </div>

  </div>
  </div>


</body>
</html>