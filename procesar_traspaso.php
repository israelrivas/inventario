<?php
include('config/db.php');
include('config/conexion.php');

if (isset($_POST['guardar_traspaso'])) {
    // Obtener datos del formulario
    $fecha = $_POST['fecha'];
    $usuario = $_POST['usuario'];
    $comentarios = $_POST['comentarios'];

    // Insertar datos en la tabla traspasos
    $query_traspaso = "INSERT INTO traspasos (fecha, usuario, comentarios) VALUES ('$fecha', '$usuario', '$comentarios')";
    $result_traspaso = $con->query($query_traspaso);

    if ($result_traspaso) {
        // Traspaso insertado con éxito
        header('Location: traspasos.php?success=true');
        exit();
    } else {
        // Error al insertar traspaso
        echo "Error: " . $con->error;
    }
}
?>
