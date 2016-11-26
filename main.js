


function crear_usuario(){
$('body').removeClass('modal-open');
	 $("#div_de_carga").empty();
	$("#div_de_carga").load("nuevo_usuario.php");
}

function mantenimiento_rol(){
$('body').removeClass('modal-open');
	 $("#div_de_carga").empty();
	$("#div_de_carga").load("crear_rol.php");
}


function ir_mantenimiento(){
$('body').removeClass('modal-open');
	  $("#div_de_carga").empty();
	$("#div_de_carga").load("mantenimiento.php");	
}

function buscar_rol(){
$('body').removeClass('modal-open');
	  $("#div_de_carga").empty();
	$("#div_de_carga").load("buscar_rol.php");	
}




