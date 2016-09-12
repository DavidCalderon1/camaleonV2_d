//este array se usara para devolver al estado inicial los selects de la busqueda dinamica
var listas = {"cuenta_tipo":"clases,grupos,cuentas,subcuentas,cuentasauxiliares", "clases":"grupos,cuentas,subcuentas,cuentasauxiliares", "grupos":"cuentas,subcuentas,cuentasauxiliares", "cuentas":"subcuentas,cuentasauxiliares", "subcuentas":"cuentasauxiliares"};

//modifica el contenido del formulario
$(document).on('show.bs.modal','.formModalSelect',function(e){
	var thisId = $(this).attr('id');
	var element = $(e.relatedTarget).attr('elementId');
	var id = $(e.relatedTarget).attr('id');
	//$(this).find("select#clases").find('option:first').attr('disabled', 'disabled');
	$(this).find('.element').attr('element',element);	
	$(this).find('.id').attr('id',id);
	$(this).find('#msj-error').hide();
});

<!-- cierra el formulario cuando se da click en el boton de confirmacion y ejecuta el envio -->
$(document).on('click','.modal.fade.formModalSelect #confirmar',function(e){
	var thisParent =  $(this).parents('.formModalSelect').attr('id');
	if(thisParent != undefined ){
		var element = $('#'+thisParent).find('.element').attr('element');
		var id = $('#'+thisParent).find('.id').attr('id');
		var optionVal = $('#'+thisParent).find('.id').val();
		var optionText = $('#'+thisParent).find('.element').val();
		var cuenta_tipo = $('#'+thisParent).find('.cuenta_tipo').val();
		var value = $('#'+thisParent).find('select.select_dynamic#'+element ).val();
		if( value != null ){
			$('#'+thisParent).parent().find('input#'+id).val(optionVal);
			$('#'+thisParent).parent().find('label#'+id).text(optionText);
			$('#'+thisParent).parent().parent().find('select#tipo').val(cuenta_tipo);
			$('#'+thisParent).parent().parent().find('input#tipo').val(cuenta_tipo);
			$(".formModalSelect").modal('toggle');
		}else{
			var title = $('#'+thisParent).find('.modal-title').text();
			$('#'+thisParent).find('#msj').html(title);
			$('#'+thisParent).find('#msj-error').hide().fadeIn();
		}
	}
});

// realiza la carga automatica y dinamica de los select en la pestaña lista de la busqueda de cuentas
$(document).on('change','select.select_dynamic',function(event){
	var para = $(this).attr('para');
	var thisId = $(this).attr('id');
	var thisVal = $(this).val();
	var thisText = $(this).find('option:selected').text();
	var thisParent =  $(this).parents('.formModalSelect').attr('id');
	if(thisParent == undefined ){
		thisParent =  $(this).parents('form').attr('id');
	}
	$('#' +thisParent+ ' input.id').val(thisVal);
	$('#' +thisParent+ ' input.element').val(thisText);
	if(!para){
		return false;
	}
	vaciarSelects(thisId,thisParent,para,thisVal);
	if(!thisVal){
		return false;
	}
	//se obtiene el componente en el cual se esta generando el evento
	//se obtiene el id (event.target.value) y se envia concatenado a la url 
	//esta peticion tendra una respuesta y un estado
	$.get("/admin/pc/listas?cuenta="+para+"&id="+event.target.value+"", function(response, state){
		//se puede ver que es lo que esta recibiendo
		//console.log(response);
		
		//se insertan los elementos recibidos con formato de option dentro del select
		for(i=0; i<response.length; i++){
			$('#' +thisParent+ ' select#'+para+'').append('<option value="'+ response[i].id +'">'+ response[i].nombre +'</option>');
		}
	});
});

function vaciarSelects(thisId,thisParent,para,thisVal){
	//obtiene un array con los id de los selects que hay que limpiar segun la seleccion
	var vaciarSelects = listas[thisId].split(",");
	$.each(vaciarSelects, function( index, nombre ) {
		//se limpia el elemento antes de insertar la informacion
		var placeholder = $('#' +thisParent+ ' select#'+nombre+'').find('option[disabled]:first-child');
		$('#' +thisParent+ ' select#'+nombre+'').empty().attr('disabled', 'disabled').append(placeholder).val('');
	});
	if(thisVal){
		$('#' +thisParent+ ' select#'+para+'').removeAttr('disabled');
	}
}