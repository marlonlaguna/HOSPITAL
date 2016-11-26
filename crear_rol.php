<HTML>
<head>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="librerias/jquery-3.1.1.min.js"></script>
<script src="main.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>


function enviarDatos(){
	var nombre = $("#nombre_rol").val();
	var descripcion = $("#descripcion_rol").val();
	
	if(nombre == '' || nombre == ' '){
		$("#mensajeconfirm").text('No puede dejar el campo nombre vacio.');
			$("#imagenconfirm").attr("src","images/error.png");
			$('#mensaje_de_confirmacion').modal('show');
			return;
	}
	if(descripcion == '' || descripcion == ' '){
		$("#mensajeconfirm").text('No puede dejar el descripcion vacio.');
			$("#imagenconfirm").attr("src","images/error.png");
			$('#mensaje_de_confirmacion').modal('show');
			return;
	}
	
	
		$.post( "inserts/Insert_crear_rol.php", { nombre: nombre ,descripcion: descripcion})
  .done(function( data ) {
 
		
		if(data == '01'){
			$("#mensajeconfirm").text('El rol ingresado ya existe, por favor ingrese otro nombre.');
			$("#imagenconfirm").attr("src","images/error.png");
		}
               if(data == '00'){
			$("#mensajeconfirm").text('Registro insertado correctamente.');
			$("#imagenconfirm").attr("src","images/cheke.png");
			limpiar();
		}				
	  $('#mensaje_de_confirmacion').modal('show');
  });
	
}

function limpiar(){
	$("#nombre_rol").val('');
	$("#descripcion_rol").val('');
}

</script>

</head>
<body>
<div class="panel panel-default">
  <div class="panel-heading"><h5>Crear rol</h5></div>
  <div class="panel-body"> 
  <img onClick="ir_mantenimiento();" id="flecha" src="images/volver.png" height="7%" width="4%" style="position:absolute; top:10%; left:1%; z-index:1;"></img>  
<div class="col-md-8 col-md-offset-2">	
  
       <label class="control-label col-xs-3">Nombre del rol:</label>
               
	  <input id='nombre_rol' type="text" class="form-control" placeholder="Nombre del rol">
	  
	   <label class="control-label col-xs-3">Descripcion del rol:</label>
         
	  <textarea id='descripcion_rol' class="form-control" rows="3" placeholder="Descripcion del rol"></textarea>
	  
	  </div>
	   <div class="col-md-8 col-md-offset-2">
	   <p> </p>
            <button class="btn btn-primary" value="Enviar" data-toggle="modal" data-target="#esta_seguro1">Guardar</button>		
            <input onClick='limpiar()' type="reset" class="btn btn-default" value="Limpiar">
        </div>
	   
  </div>
</div>



<!-- TODAS LAS VENTANAS EMERGENTES ----------------------------------------------------------------------------->
<div id="esta_seguro1" class="modal fade" role="dialog" ">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
		 <img  src="images/question.png" height="7%" width="8%" align="right" ></img>
         ¿Esta seguro?</h4>		 
      </div>
      <div class="modal-body">
        <p>¿Esta seguro de insertar un nuevo rol?</p>
      
	   
      </div>
      <div class="modal-footer">
	  <button onClick="enviarDatos();" data-dismiss="modal" class="btn btn-primary" value="Enviar">Enviar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>


</body>
</HTML>