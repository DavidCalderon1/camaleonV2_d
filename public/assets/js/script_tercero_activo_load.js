
// realiza la carga automatica y dinamica del select para TERCERO / ACTIVO
$(document).on('change','input[name="TER_ACT"]',function(event){
	var tipo = $(this).val();
	var route = "/admin/movimientoContable/lista?" + tipo;
	var thisParent =  $(this).parents('form').attr('id');
	var nombre = "TerceroActivo";

	$('#' +thisParent+ ' select#'+nombre+'').empty().attr('disabled', 'disabled');

	//se obtiene el componente en el cual se esta generando el evento
	//se obtiene el id (event.target.value) y se envia concatenado a la url 
	//esta peticion tendra una respuesta y un estado
	$.get(route, function(response, state){
		//se puede ver que es lo que esta recibiendo
		//console.log(response);
		
		//se insertan los elementos recibidos con formato de option dentro del select
		for(i=0; i<response.length; i++){
			$('#' +thisParent+ ' select#'+nombre+'').append('<option value="'+ response[i].id +'">'+ response[i].nombre +'</option>');
		}
		$('#' +thisParent+ ' select#'+nombre+'').removeAttr('disabled');
	});
});