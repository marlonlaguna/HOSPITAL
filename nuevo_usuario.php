		   <?php 
require_once 'librerias\ez_sql_core.php';
	require_once 'librerias\ez_sql_mysql.php';
	
$conn = new ezSQL_mysql('root','','hospital');
	$results = $conn->get_results("SELECT id,nombre FROM roles WHERE Estado='A'");
    $ano = $conn->get_var("select YEAR(NOW());");
		   ?>
<html>
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
var correcto = false;
    function siescorrecto(){
		if (correcto == true){
			limpiar();
		}
		
	}
	function limpiar(){	
	 $("#div_de_carga").empty();	
		 $('#mensaje_de_confirmacion').modal().hide();
			 $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
			$("#div_de_carga").load("nuevo_usuario.php");
	}
	
$( document ).ready(function() {
  $('#identidad').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });
		   $('#telefono').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });
		  $('#nombres').keyup(function (){
            this.value = (this.value + '').replace(/[^a-zA-z\s\ñ\Ñ]+$/, '');
          });
		   $('#apellidos').keyup(function (){
            this.value = (this.value + '').replace(/[^a-zA-z\s\ñ\Ñ]+$/, '');
          });
});

function enviarDatos(){
	
	var nombres = $("#nombres").val();
	var apellidos = $("#apellidos").val();
	var identidad = $("#identidad").val();
	var nombreusuario = $("#nombreusuario").val();
    var correo = $("#correo").val();
	var pass = $("#pass").val();
	var confirpass = $("#confirpass").val();
	var telefono = $("#telefono").val();
	var rol = $("#rol").val();
    var fecha = $("#ano").val() + "-" + $("#mes").val() + "-" + $("#dia").val();	  
	var sexo = $('input:radio[name=sexo]:checked').val();

	
	if(nombres == '' || nombres == ' ')
	{
		$("#mensajeconfirm").text('No puede dejar los nombres vacios');
			$("#imaenconfirm").attr("src","images/error.png");
		  $('#mensaje_de_confirmacion').modal('show');
		  return;
	}
		if(apellidos == '' || apellidos == ' ')
	{
		$("#mensajeconfirm").text('No puede dejar los apellidos vacios');
			$("#imaenconfirm").attr("src","images/error.png");
		  $('#mensaje_de_confirmacion').modal('show');
		  return;
	}
	if(identidad == '' || identidad == ' ')
	{
		$("#mensajeconfirm").text('No puede dejar la identidad vacia.');
			$("#imaenconfirm").attr("src","images/error.png");
		  $('#mensaje_de_confirmacion').modal('show');
		  return;
	}
		if(nombreusuario == '' || nombreusuario == ' ')
	{
		$("#mensajeconfirm").text('No puede dejar el nombre de usuario vacio.');
			$("#imaenconfirm").attr("src","images/error.png");
		  $('#mensaje_de_confirmacion').modal('show');
		  return;
	}
	
	 
			if(correo == '' || correo == ' ' )
	{
		$("#mensajeconfirm").text('Debe ingresar un correo valido.');
			$("#imaenconfirm").attr("src","images/error.png");
		  $('#mensaje_de_confirmacion').modal('show');
		  return;
	}
	
	if(pass != confirpass){
		$("#mensajeconfirm").text('El password no coincide con la confirmacion del password.');
			$("#imaenconfirm").attr("src","images/error.png");
		  $('#mensaje_de_confirmacion').modal('show');
		  return;
	}
	
	if ($("#ano").val() == 'año'){
		$("#mensajeconfirm").text('Debe seleccionar un año de nacimiento.');
			$("#imaenconfirm").attr("src","images/error.png");
		  $('#mensaje_de_confirmacion').modal('show');
		  return;
	}
	
		if ($("#mes").val() == 'Mes'){
		$("#mensajeconfirm").text('Debe seleccionar un mes de nacimiento.');
			$("#imaenconfirm").attr("src","images/error.png");
		  $('#mensaje_de_confirmacion').modal('show');
		  return;
	}
			if ($("#dia").val() == 'Dia'){
		$("#mensajeconfirm").text('Debe seleccionar un dia de nacimiento.');
			$("#imaenconfirm").attr("src","images/error.png");
		  $('#mensaje_de_confirmacion').modal('show');
		  return;
	}
	
	if (typeof(sexo) == 'undefined'){
		$("#mensajeconfirm").text('Debe seleccionar un sexo para esta persona.');
			$("#imaenconfirm").attr("src","images/error.png");
		  $('#mensaje_de_confirmacion').modal('show');
		  return;
	}
	
	if (rol == 'Seleccione una opcion...'){
		$("#mensajeconfirm").text('Debe seleccionar un rol para esta persona.');
			$("#imaenconfirm").attr("src","images/error.png");
		  $('#mensaje_de_confirmacion').modal('show');
		  return;
	}
	
	$.post( "inserts/Insert_crear_usuario.php", { usuario: nombreusuario ,numero_identidad: identidad,nombres: nombres,apellidos: apellidos,password: pass,correo: correo,fecha_nacimiento: fecha,telefono: telefono,sexo: sexo,id_Rol: rol })
  .done(function( data ) {
 
		
		if(data == '01'){
			$("#mensajeconfirm").text('El usuario ingresado ya esta registrado, por favor ingrese otro nombre de usuario.');
			$("#imaenconfirm").attr("src","images/error.png");
		}
		if(data == '02'){
			$("#mensajeconfirm").text('El numero de identidad ingresado ya esta registrado, por favor ingrese otro numero de identidad.');
			$("#imaenconfirm").attr("src","images/error.png");
		}
			if(data == '03'){
			$("#mensajeconfirm").text('El correo ingresado ya esta registrado, por favor ingrese otra direccion de correo electronico.');
			$("#imaenconfirm").attr("src","images/error.png");
		}
			if(data == '00'){
			$("#mensajeconfirm").text('Usuario registrado correctamente.');
			$("#imaenconfirm").attr("src","images/cheke.png");
				correcto = true;	         	
		}
		
	        $('#mensaje_de_confirmacion').modal('show');

			  
			
	
  });
	
}
</script>
</head>
<body>
</br>
</br>
<img onClick="ir_mantenimiento();" id="flecha" src="images/volver.png" height="7%" width="4%" style="position:absolute; top:1%; left:1%; z-index:1;"></img>

<div class="form-horizontal" style="position:absolute; top:5%; left:0%; width: 50%; height:80%;" >

<div class="form-group">
        <label class="control-label col-xs-3">Nombres:</label>
        <div class="col-xs-9">
            <input id="nombres" "name="nombres" type="text" class="form-control" placeholder="Nombre">
        </div>
    </div>
	<div class="form-group">
        <label class="control-label col-xs-3">Apellidos:</label>
        <div class="col-xs-9">
            <input id="apellidos" type="text" class="form-control" placeholder="Apellido">
        </div>
    </div>
	<div class="form-group">
        <label class="control-label col-xs-3">n° Identidad:</label>
        <div class="col-xs-9">
            <input id="identidad" type="text" class="form-control" placeholder="n° Identidad">
        </div>
    </div>
	<div class="form-group">
        <label class="control-label col-xs-3">usuario:</label>
        <div class="col-xs-9">
            <input id="nombreusuario" "name="nombres" type="text" class="form-control" placeholder="Nombre">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Email:</label>
        <div class="col-xs-9">
            <input id="correo" type="email" class="form-control" id="inputEmail" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Password:</label>
        <div class="col-xs-9">
            <input id="pass" type="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Confirmar Password:</label>
        <div class="col-xs-9">
            <input id="confirpass" type="password" class="form-control" placeholder="Confirmar Password">
        </div>
    </div>
    
    
    <div class="form-group">
        <label class="control-label col-xs-3" >Telefono:</label>
        <div class="col-xs-9">
            <input id="telefono" type="tel" class="form-control" placeholder="Telefono">
        </div>
    </div>
	<div class="form-group">
        <label class="control-label col-xs-3">Rol:</label>
        <div class="col-xs-9">
           <select id="rol" class="form-control">

			    <option>Seleccione una opcion...</option>
				<?php 
				foreach ( $results as $nombre )
				{
				 echo "<option value='";				 
				 echo $nombre->id;
				 echo "'>";
                  // Access data using object syntax
                   echo $nombre->nombre;
                      echo "</option>";
                       }
				
				?>
				</select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">F. Nacimiento:</label>
        <div class="col-xs-3">
            <select id="dia" name="dia" class="form-control">
                <option>Dia</option>
				<option>1</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
				<option>13</option>
				<option>14</option>
				<option>15</option>
				<option>16</option>
				<option>17</option>
				<option>18</option>
				<option>19</option>
				<option>20</option>
				<option>21</option>
				<option>22</option>
				<option>23</option>
				<option>24</option>
				<option>25</option>
				<option>26</option>
				<option>27</option>
				<option>28</option>
				<option>29</option>
				<option>30</option>
				<option>31</option>
            </select>
        </div>
        <div class="col-xs-3">
            <select id="mes" class="form-control">
                <option>Mes</option>
				<option value="1" >Enero</option>
				<option value="2">Febrero</option>
				<option  value="3">Marzo</option>
				<option value="4">Abril</option>
				<option value="5">Mayo</option>
				<option value="6">Junio</option>
				<option value="7">Julio</option>
				<option value="8">Agosto</option>
				<option value="9">Septiembre</option>
				<option value="10">Octubre</option>
				<option value="11">Noviembre</option>
				<option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-3">
            <select id="ano" class="form-control">
			    <option>año</option>
		<?php 
				for ($i = 100;$i>=0;$i--)
				{
				 echo "<option>";				 				 				
                  // Access data using object syntax
                   echo $ano - $i;
                      echo "</option>";
                       }
				
				?>
				
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-3">Genero:</label>
        <div class="col-xs-2">
            <label class="radio-inline">
                <input name="sexo" type="radio" name="genderRadios" value="m"> Maculino
            </label>
        </div>
        <div class="col-xs-2">
            <label class="radio-inline">
                <input name="sexo" type="radio" name="genderRadios" value="f"> Femenino
            </label>
        </div>
		</div>
		
		
     <br>
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <button class="btn btn-primary" value="Enviar" data-toggle="modal" data-target="#myModal">Enviar</button>
		
            <input onClick='limpiar()' type="reset" class="btn btn-default" value="Limpiar">
        </div>
    </div>
	<!-- Ventana emergente----------------------------------------------------------------------->
</div><!-- Ventana emergente -->
<div id="myModal" class="modal fade" role="dialog" ">
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
        <p>¿Esta seguro de insertar este registro?</p>
      
	   
      </div>
      <div class="modal-footer">
	  <button onClick="enviarDatos();" data-dismiss="modal" class="btn btn-primary" value="Enviar">Enviar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
  
  
  </div><!-- Ventana emergente de confirmacionnnn -->
<div id="mensaje_de_confirmacion" class="modal fade" role="dialog" ">
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
        <p id="mensajeconfirm">Mensaje</p>
      
	   
      </div>
      <div class="modal-footer">
	<button onClick='siescorrecto();' data-dismiss="modal" class="btn btn-primary" value="Enviar">Ok</button> 
         
      </div>
    </div>

  </div>
</div>
</body>
</html>