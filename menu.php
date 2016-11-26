<?php
session_start();
if(!$_SESSION['usuario_logeado']){
	header('location: login.php');
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="menu/estilomenu.css" media="screen" />
<script src="librerias/jquery-3.1.1.min.js"></script>
<script src="menu/main.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="librerias/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="librerias/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body background="images/fondo.jpg" style="-ms-user-select:none;">

<img  id="flecha" src="images/flecha.png" height="11%" width="3%" style="position:absolute; top:10%; left:9.5%; z-index:1;"></img>
<div class="container"  id="divprincipal" class="divsmenu">
<h4 class="h4">Principal</h4>
<img id="imagenprincipal" src="images/principal.png" height="60%" width="60%" style="position:absolute; top:25%; left:18%;">
<hr STYLE="position:relative; top:86%; left:-11%; background-color: black;height: 1px; border: 0px; "></hr>
</div>
<div  class="container" id="divsegundo" class="divsmenu">
<h6 class="h4">Informes</h6>
<img id="imagenreportes"  src="images/reportes.png" height="60%" width="60%" style="position:absolute; top:25%; left:18%;">
<hr STYLE="position:relative; top:86%; left:-11%; background-color: black;height: 1px; border: 0px; "></hr>
</div>
<div class="container" id="divtercero" class="divsmenu">
<h4 class="h4">Perfil</h4>
<img  src="images/usuario.png" height="60%" width="60%" style="position:absolute; top:25%; left:18%;">
<hr STYLE="position:relative; top:86%; left:-11%; background-color: black;height: 1px; border: 0px; "></hr>
</div>
<div class="container" id="divcuarto" class="divsmenu">
<h4 class="h4">Ajustes</h4>
<img  src="images/ajustes.png" height="60%" width="60%" style="position:absolute; top:25%; left:18%;">
</div>
<div id="div_de_carga">

</div>
<a href="cerrarsesion.php" STYLE="position:absolute; top:96%; left:2%;">Cerrar sesion</a>


<!-- mensaje de confirmacion o error -------------------------------------------------------------------------->
<!-- Ventana emergente de confirmacionnnn -->
<div id="mensaje_de_confirmacion" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
		 <img id='imagenconfirm' src="images/question.png" height="7%" width="8%" align="right" ></img>
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