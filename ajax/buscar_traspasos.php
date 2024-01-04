<?php
include('is_logged.php');
require_once ("../config/db.php");
require_once ("../config/conexion.php");
require_once ("../funciones.php");
if(isset($_GET['id'])){
    $id = intval($_GET['id']); 
    mysqli_query($con,"DELETE FROM porducts_by_traspaso WHERE fk_id_traspaso = '$id'");
    if (mysqli_query($con,"DELETE FROM traspasos WHERE id = '$id'")){
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Aviso!</strong> Datos eliminados exitosamente.
        </div>
        <?php 
    }else {
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
        </div>
        <?php   
    }        
}
$action = (isset($_GET['action']) && $_GET['action'] != NULL) ? $_GET['action'] : '';
if($action == 'ajax'){    
    ( isset( $_GET['fecha']) && $_GET['fecha'] != "") ? $fecha = inputSeguro($_GET['fecha']) : $fecha = '';
    ( isset( $_GET['q']) && $_GET['q'] != "") ? $q = inputSeguro($_GET['q']) : $q = '';

    $quey_by_name = " users.firstname LIKE '%$q%' OR users.lastname LIKE '%$q%' ";
    $query_by_date = " DATE(traspasos.fecha_hora) = '$fecha' ";
    if( $fecha != '' AND $q != '' ){
        $q = inputSeguro($_GET['q']);
        $sql = "SELECT * FROM traspasos 
                LEFT JOIN users ON traspasos.fk_solicita_user_id = users.user_id
                WHERE $quey_by_name OR $query_by_date";
    }elseif ($q != '' ) {
        $sql = "SELECT * FROM traspasos 
                LEFT JOIN users ON traspasos.fk_solicita_user_id = users.user_id
                WHERE $quey_by_name";
    }elseif ($fecha != '' ) {
        $sql = "SELECT * FROM traspasos 
                LEFT JOIN users ON traspasos.fk_solicita_user_id = users.user_id
                WHERE $query_by_date";
    }else{
        $sql = "SELECT * FROM traspasos
                LEFT JOIN users ON traspasos.fk_solicita_user_id = users.user_id
                ORDER BY traspasos.id DESC";
    }
    $query = mysqli_query($con, $sql);
    $numrows = mysqli_num_rows($query);
    include 'pagination.php';
    $page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;
    $per_page = 10; 
    $adjacents  = 4;
    $offset = ($page - 1) * $per_page;
    $total_pages = ceil( $numrows / $per_page);
    $reload = '';
    $sql = "$sql LIMIT $offset, $per_page";
    $query = mysqli_query($con, $sql);
    if ($numrows>0){
        ?>
        <div class="table-responsive">
            <table class="table">
                <tr  class="success">
                    <th>Nombre</th>
                    <th>Movimiento</th>
                    <th>Comentario</th>
                    <th>Fecha</th>
                    <th>Autorizado</th>
                    <th class='text-right'>Acciones</th>
                </tr>
                <?php
                while ($row=mysqli_fetch_array($query)){
                    $id_traspaso = $row['id'];
                    $nombre = $row['firstname']." ".$row['lastname'];
                    $type_of_move = ( $row['type_of_move'] == 1 ) ? 'Entrada' : 'Salida';
                    $comentarios = $row['comentarios'];
                    $date_added = date('d/m/Y H:i:s', strtotime($row['fecha_hora']));
                    $autorizado = ( $row['fk_aprueba_user_id'] != '' ) ? 'Si' : 'No';
                ?>
                <tr>    
                    <td><?php echo $nombre; ?></td>
                    <td ><?php echo $type_of_move; ?></td>
                    <td><?php echo $comentarios;?></td>
                    <td><?php echo $date_added;?></td>
                    <td><?php echo $autorizado;?></td>
                <td class='text-right'>
                    <a 
                        href="#" 
                        class='btn btn-default' 
                        title='Autorizar traspaso' 
                        onclick="autorizar('<?php echo $id_traspaso; ?>')"
                    >
                        <i class="glyphicon glyphicon-ok"></i>
                    </a>
                    <a 
                        href="#" 
                        class='btn btn-default' 
                        title='Ver detalles' 
                        data-toggle="modal" 
                        data-target="#lista_productos" 
                        data-id='<?php echo $id_traspaso;?>' 
                    >
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a 
                        href="#" 
                        class='btn btn-default' 
                        title='Borrar categoría' 
                        onclick="eliminar('<?php echo $id_traspaso; ?>')"
                    >
                        <i class="glyphicon glyphicon-trash"></i> 
                    </a>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan=4>
                    <span class="pull-right">
                    <?php
                    echo paginate($reload, $page, $total_pages, $adjacents);
                    ?>
                    </span>
                </td>
            </tr>
        </table>
    </div>
    <?php
    }
}
