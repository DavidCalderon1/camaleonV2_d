//modifica el contenido del formulario de eliminacion
$(document).on('show.bs.modal','#confirmDelete',function(e){
	$message = $(e.relatedTarget).attr('data-message');
	$(this).find('.modal-body p').text($message);
	$title = $(e.relatedTarget).attr('data-title');
	$(this).find('.modal-title').text($title);

	// Pass form reference to modal for submission on yes/ok
	//var form = $(e.relatedTarget).closest('form');
	//$(this).find('.modal-footer #confirm').data('form', form);
});

// cierra el formulario cuando se da click en el boton de confirmacion y ejecuta el envio 
$(document).on('click','.modal.fade #confirmar',function(e){
	//$(this).data('form').submit();
	$("#confirmDelete").modal('toggle'); 
	$('.form_delete').submit();
});