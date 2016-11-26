<?php
require_once '..\librerias\ez_sql_core.php';
	require_once '..\librerias\ez_sql_mysql.php';
	
	
	$conn = new ezSQL_mysql('root','','hospital');
	
	$result = $conn->get_var("CALL insertar_usuario('". $_POST['usuario'] ."','". $_POST['numero_identidad'] ."','". $_POST['nombres'] ."','". $_POST['apellidos'] ."','". $_POST['correo'] ."','". $_POST['fecha_nacimiento'] ."','". $_POST['telefono'] ."','". $_POST['sexo'] ."',". $_POST['id_Rol'] .",'". $_POST['password'] ."')");
     echo $result;
?>