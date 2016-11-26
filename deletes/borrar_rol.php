<?php
require_once '..\librerias\ez_sql_core.php';
	require_once '..\librerias\ez_sql_mysql.php';
	
	
	$conn = new ezSQL_mysql('root','','hospital');
	
	$result = $conn->get_var("UPDATE roles SET ESTADO = 'I' WHERE id = " . $_POST['id'] );
     echo $result;
?>