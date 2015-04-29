$(document).ready(function() {
	$('.confirmation').on('click', function () {
        return confirm('¿Estas seguro de eliminar este registro?');
    });
    $('#detalle').on('hidden.bs.modal', function() {
	    $(this).removeData('bs.modal');
	});
});