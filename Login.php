<?php
session_start();

if ($_POST){
	require_once 'librerias\ez_sql_core.php';
	require_once 'librerias\ez_sql_mysql.php';
	
	$conn = new ezSQL_mysql('root','','hospital');
	
	$usuario = $conn->get_row("SELECT id FROM usuarios WHERE usuario='". $_POST['usuario'] . "' AND Password='". $_POST['password'] ."'"); 

    if($usuario){
		$_SESSION['usuario_logeado'] = $usuario;
		header('Location: menu.php');
	}   
     else{
		 $error ='Usuaio o password incorrecto';
	 }	
	
}


?>

<html>
<head>


<link rel="stylesheet" type="text/css" href="login/estilo.css" media="screen" />
<script src="librerias/jquery-3.1.1.min.js"></script>
<script>

function ojo(){
	if(document.getElementById('pass').type == "password"){
		document.getElementById('pass').type = "text";
	}
	else{
		document.getElementById('pass').type = "password";
	}

}

</script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body background="images/fondo.jpg" style="background-repeat:no-repeat">
<div id="divisorlogin" class="form-horizontal">
<form action= "" method="post">
<p style="position:absolute; top:9%; left:2%; color:black;"> Usuario: </p><input class="textbox" type="text" name="usuario" STYLE="position:absolute; top:20%; left:2%;"></input>
</br>
<p style="position:absolute; top:39%; left:2%;  color:black;">Contraseña: </p><input class="textbox" type="password" name="password" id="pass" STYLE="position:absolute; top:50%; left:2%;"></input><img onClick="ojo();" src="images/ojo.png" height="15%" width="15%" style="position:absolute; top:48%; left:80%;">
<?php if(isset($error)): ?>
<p  STYLE="color:#d62d20; position:absolute; top:68%; left:2%;">*Usuario o contraseña incorrectos</p>
<?php endif ?>

<input  class="btn btn-primary" style="position:absolute; top:80%; left:54%; " class="boton" type="submit" style="align:right;" value="Iniciar sesion" ></input>
</form>
</div>

</body>
</html>