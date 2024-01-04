
	<!-- modal/registro_traspaso.php -->
<div class="modal fade" id="nuevoTraspaso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog custom_my_modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo traspaso</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" id="guardar_traspaso" name="guardar_traspaso">
          <div id="resultados_ajax"></div>
          <div class="form-group">
            <label for="productos" class="col-sm-12 ">Tipo de traspaso</label>
            <div class="col-sm-12">
              <div class="producto-input">
                <select class="form-control" name="tipo_traspaso" id="tipo_traspaso" required>
                  <option value="">-- Selecciona --</option>
                  <option value="1">Traspaso de entrada</option>
                  <option value="2">Traspaso de salida</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="productos" class="col-sm-12 ">Productos</label>
            <div class="col-12 col-md-6">
              <input type="text" class="form-control search_product" style="margin-bottom:16px" name="products[]" placeholder="Nombre" autocomplete="off" required>
            </div>
            <div class="col-4 col-md-3">
              <input type="number" class="form-control" style="margin-bottom:16px" name="piezas[]" placeholder="Piezas" required>
            </div>
            <div class="container_items"></div>
            <div class="col-2 col-md-12">
              <button type="button" class="btn btn-success btn-agregar-producto"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
          </div>

          <div class="form-group">
            <label for="comentarios" class="col-sm-12">Comentarios</label>
            <div class="col-sm-12">
              <textarea class="form-control" id="comentarios" name="comentarios" maxlength="255"></textarea>
            </div>
          </div>
          <!-- Fin de campos para traspasos -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="btn_cerrar_modal" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
        </div>
      </form>
    </div>
  </div>
</div>

