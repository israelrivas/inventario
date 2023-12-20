// traspasos.js
$(document).ready(function() {
    // Lógica de autocompletado para el campo de productos
    $('.autocomplete').autocomplete({
        source: function(request, response) {
            // Tu lógica de autocompletado aquí
        },
        minLength: 2
    });

    // Lógica para agregar y remover productos dinámicamente
    $('.btn-agregar-producto').on('click', function() {
        var productoInput = $('.producto-input:first').clone();
        productoInput.find('input').val(''); // Limpiar los valores de los campos
        $('#productos-container').append(productoInput);
    });

    $('#productos-container').on('click', '.btn-remover-producto', function() {
        $(this).closest('.producto-input').remove();
    });

    // Resto de tu lógica...
});