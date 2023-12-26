<?php
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
//Archivo de funciones PHP
include("../funciones.php");

$productos = array();

$sql = "SELECT * FROM products";
$query = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($query)){
    $productos[] = $row['codigo_producto']." - ". $row['nombre_producto'];
}


echo json_encode($productos);