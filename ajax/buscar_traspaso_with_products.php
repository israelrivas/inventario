<?php
require_once ("../config/db.php");
require_once ("../config/conexion.php");

$id = $_GET['id'];

$traspaso = "SELECT traspasos.fecha_hora, traspasos.type_of_move, traspasos.comentarios, users.firstname, users.lastname 
             FROM traspasos 
             LEFT JOIN users ON users.user_id = traspasos.fk_solicita_user_id 
             WHERE traspasos.id = '$id'";
$query_traspaso = mysqli_query($con, $traspaso);
$row_traspaso = mysqli_fetch_array($query_traspaso);
$fecha_hora = $row_traspaso['fecha_hora'];
$tipo_movimiento = ($row_traspaso['type_of_move'] == 1) ? 'Entrada' : 'Salida';
$nombre = $row_traspaso['firstname']." ".$row_traspaso['lastname'];
$comentarios = $row_traspaso['comentarios'];

$autorizo_traspaso = "SELECT users.firstname, users.lastname 
                      FROM traspasos 
                      LEFT JOIN users ON users.user_id = traspasos.fk_aprueba_user_id 
                      WHERE traspasos.id = '$id'";
$query_autorizo_traspaso = mysqli_query($con, $autorizo_traspaso);
$row_autorizo_traspaso = mysqli_fetch_array($query_autorizo_traspaso);
$autorizo = $row_autorizo_traspaso['firstname']." ".$row_autorizo_traspaso['lastname'];



$sql = "SELECT codigo_producto, nombre_producto, piezas FROM porducts_by_traspaso 
        LEFT JOIN products ON porducts_by_traspaso.fk_product_id = products.id_producto
        LEFT JOIN traspasos ON porducts_by_traspaso.fk_id_traspaso = traspasos.id
        WHERE fk_id_traspaso = '$id'";
$query = mysqli_query($con, $sql);
$numrows = mysqli_num_rows($query);
$response = '';
$response .= '
<div class="traspaso"><b>Responsable del traspaso:</b> '.$nombre.'</div>
<div class="autorizo"><b>Autorizo el traspaso:</b> '.$autorizo.'</div>
<div class="tipo"><b>Movieneto:</b> '.$tipo_movimiento.'</div>
<div class="fecha"><b>Fecha:</b > '.$fecha_hora.'</div>
<div class="comentrios"><b>Comentarios:</b > '.$comentarios.'</div>
<br>
';
if ($numrows>0){
    $response .= '
    <div class="table-responsive">
        <table class="table">
            <tr  class="success">
                <th>Código</th>
                <th>Nombre</th>
                <th>Piezas</th>
            </tr>';
    while ($row=mysqli_fetch_array($query)){
        $codigo_producto = $row['codigo_producto'];
        $nombre_producto = $row['nombre_producto'];
        $piezas = $row['piezas'];
        $response .= "
        <tr>    
            <td>$codigo_producto</td>
            <td>$nombre_producto</td>
            <td>$piezas</td>
        </tr>";
    }
    $response .= '
        </table>
    </div>';
}
echo $response = json_encode($response);