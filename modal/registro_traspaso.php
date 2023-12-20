
	<!-- modal/registro_traspaso.php -->
<div class="modal fade" id="nuevoTraspaso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo traspaso</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" id="guardar_traspaso" name="guardar_traspaso">
          <div id="resultados_ajax"></div>
          
          <!-- Campos para traspasos -->
          <div class="form-group">
            <label for="fecha" class="col-sm-3 control-label">Fecha y Hora</label>
            <div class="col-sm-8">
              <input type="datetime-local" class="form-control" id="fecha" name="fecha" required>
            </div>
          </div>
          
          <div class="form-group">
            <label for="usuario" class="col-sm-3 control-label">Quién hace el traspaso</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
          </div>

          <!-- Campo para productos -->
          <div class="form-group">
            <label for="productos" class="col-sm-3 control-label">Productos</label>
            <div class="col-sm-8">
              <div id="productos-container">
                <div class="producto-input">
                  <input type="text" class="form-control autocomplete" name="productos[]" placeholder="Nombre del producto" required>
                  <input type="number" class="form-control" name="piezas[]" placeholder="Cantidad en piezas" required>
                  <button type="button" class="btn btn-danger btn-remover-producto">Eliminar</button>
                </div>
              </div>
              <button type="button" class="btn btn-success btn-agregar-producto">Agregar Producto</button>
            </div>
          </div>

          <div class="form-group">
            <label for="comentarios" class="col-sm-3 control-label">Comentarios</label>
            <div class="col-sm-8">
              <textarea class="form-control" id="comentarios" name="comentarios" maxlength="255"></textarea>
            </div>
          </div>
          <!-- Fin de campos para traspasos -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Asegúrate de incluir jQuery primero -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Luego, incluye jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Resto de tus scripts -->
<script type="text/javascript" src="js/traspasos.js"></script>
