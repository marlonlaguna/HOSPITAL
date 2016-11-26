<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "hospital";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT id,nombre,descripcion FROM roles WHERE nombre" . $_POST['signo'] . $_POST['nombre'] . "AND ESTADO ='A'";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$roles = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
    
    $nombre=$row['nombre'];
    $descripcion=$row['descripcion'];
    $id=$row['id'];
    $roles[] = array('id'=> $id,'nombre'=> $nombre, 'descripcion'=> $descripcion);

}
    
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($roles);
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'clientes.json';
file_put_contents($file, $json_string);
*/
?>