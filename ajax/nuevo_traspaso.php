<?php
session_start();
require_once ("../config/db.php");
require_once ("../config/conexion.php");
require_once ("../funciones.php");

$tipo_traspaso = inputSeguro($_POST['tipo_traspaso']);
$comentarios = inputSeguro($_POST['comentarios']);
$products = $_POST['products'];
$products_code = [];
foreach ($products as $key => $product) {
    $products_code[] = explode(" - ", $product)[0];
}
$id_products = [];
$sql_id_products = "SELECT id_producto FROM products WHERE codigo_producto IN ('" . implode("','", $products_code) . "')";
$query_id_products = mysqli_query($con, $sql_id_products);
while ($row = mysqli_fetch_array($query_id_products)) {
    $id_products[] = $row['id_producto'];
}

$piezas = $_POST['piezas'];
$fecha = date("Y-m-d H:i:s");
$user_id = $_SESSION['user_id'];
$sql_traspaso = "INSERT INTO traspasos (fecha_hora, type_of_move, comentarios, fk_solicita_user_id, fk_aprueba_user_id) 
                 VALUES ('$fecha', '$tipo_traspaso', '$comentarios', '$user_id', null)";
$query_traspaso = mysqli_query($con, $sql_traspaso);
$id_traspaso = mysqli_insert_id($con);
if($id_traspaso == 0){
    echo "Error al insertar el traspaso";
    exit;
}
foreach ($id_products as $key => $id_product) {
    if($tipo_traspaso == 1){
        $sql_product = "UPDATE products SET stock = stock + '$piezas[$key]' WHERE id_producto = '$id_product'";
    }else{
        $sql_product = "UPDATE products SET stock = stock - '$piezas[$key]' WHERE id_producto = '$id_product'";
    }
    $query_product = mysqli_query($con, $sql_product);
    if($query_product == 0){
        echo "Error al actualizar el producto";
        exit;
    }
    $sql_product_by_traspaso = "INSERT INTO porducts_by_traspaso (fk_id_traspaso, fk_product_id, piezas) 
                                VALUES ('$id_traspaso', '$id_product', '$piezas[$key]')";
    $query_product_by_traspaso = mysqli_query($con, $sql_product_by_traspaso);
}



