<?php
require_once '..\librerias\ez_sql_core.php';
	require_once '..\librerias\ez_sql_mysql.php';
	
	
	$conn = new ezSQL_mysql('root','','hospital');
	
	$result = $conn->get_var("CALL insertar_rol('". $_POST['nombre'] ."','". $_POST['descripcion'] ."')");
     echo $result;
?>