$(document).ready(function() {
    load(1);
});
$("#modal_traspaso").click(function(){
    $("#guardar_traspaso")[0].reset();
});
function load(page){
    let q = $("#q").val();
    let fecha = $("#fecha").val();
    $.ajax({
        url:'./ajax/buscar_traspasos.php?action=ajax&page='+page+'&q='+q+'&fecha='+fecha,
        beforeSend: function(objeto){
            $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
        },
        success:function(data){
            $(".outer_div").html(data).fadeIn('slow');
            $('#loader').html('');    
        }
    })
}
function get_productos_by_name() {
    $.ajax({
        url: '../ajax/get_productos_by_name.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            let productos = response;
            $(".search_product").autocomplete({
                source: productos
            });
        }    
    });
}
get_productos_by_name();
$(document).on("click", ".btn-agregar-producto", function() {
    let elemento =   `<div class="producto-input">
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control search_product" style="margin-bottom:16px" name="products[]" placeholder="Nombre" autocomplete="off" required>
                        </div>
                        <div class="col-4 col-md-3">
                            <input type="number" class="form-control" style="margin-bottom:16px" name="piezas[]" placeholder="Piezas" required>
                        </div>
                        <div class="col-2 col-md-3">
                            <button type="button" class="btn btn-danger btn-remover-producto">
                                <i class="glyphicon glyphicon-minus"></i>
                            </button>
                        </div> 
                    </div>`;
    $(".container_items").append(elemento);
    get_productos_by_name();
});
$(document).on("click", ".btn-remover-producto", function() {
    $(this).parent().parent().remove();
});
$( "#guardar_traspaso" ).submit(function( event ) {
    event.preventDefault();
    $('#guardar_datos').attr("disabled", true);
    let parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "ajax/nuevo_traspaso.php",
        data: parametros,
        beforeSend: function(objeto){
            $("#resultados").html("Mensaje: Cargando...");
        },
        success: function(datos){
            load(1);
            setTimeout(function() {
                $('#guardar_datos').attr("disabled", false);
                $("#btn_cerrar_modal").click();
                $("#resultados").html(datos);
            }, 500);
            setTimeout(function() {
                $("#resultados").html("");
            }, 3000);
        }
    });
});

$('#lista_productos').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
	let id = button.data('id')
    $.ajax({
        url: '../ajax/buscar_traspaso_with_products.php?id='+id,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $("#resultados_ajax_productos").html(response);
        }    
    });
});
function printDiv() {
    var divToPrint=document.getElementById('resultados_ajax_productos');
    newWin= window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
}
function eliminar (id){
    if (confirm("Realmente deseas eliminar el traspaso")){	
        $.ajax({
            type: "GET",
            url: "./ajax/buscar_traspasos.php",
            data: "id="+id,
            beforeSend: function(objeto){
                $("#resultados").html("Mensaje: Cargando...");
            },
            success: function(datos){
                $("#resultados").html(datos);
                load(1);
                setTimeout(function() {
                    $("#resultados").html('');
                }, 3000);
            }
        });
    }
}
function autorizar(id){
    if (confirm("Autorizar este trapaso")){	
        $.ajax({
            type: "GET",
            url: "./ajax/autorizar_traspaso.php",
            data: "id="+id,
            beforeSend: function(objeto){
                $("#resultados").html("Mensaje: Cargando...");
            },
            success: function(datos){
                $("#resultados").html(datos);
                load(1);
                setTimeout(function() {
                    $("#resultados").html('');
                }, 3000);
            }
        });
    }
}