<?php
include ("../config/db.php");
include ("../config/conexion.php");
include ("../funciones.php");
session_start();
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 
    $sql = "UPDATE traspasos SET fk_aprueba_user_id = '" . $_SESSION['user_id'] . "' WHERE id = '$id'";
    if (mysqli_query($con, $sql)) {
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close"
                    data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <strong>Aviso!</strong> Traspaso aprobado exitosamente.
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger alert-dismissible"
                role="alert">
            <button type="button" class="close"
                    data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <strong>Error!</strong> Lo siento algo ha salido mal
            intenta nuevamente.
        </div>
        <?php
    }
}
