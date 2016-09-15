//este array se usara para devolver al estado inicial los selects de la busqueda dinamica
var listas = {"cuenta_tipo":"clases,grupos,cuentas,subcuentas,cuentasauxiliares", 
"clases":"grupos,cuentas,subcuentas,cuentasauxiliares", "grupos":"cuentas,subcuentas,cuentasauxiliares", 
"cuentas":"subcuentas,cuentasauxiliares", "subcuentas":"cuentasauxiliares"};

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


//se encarga de colocar el id inicial para el campo codigo a partir de la seleccion en el grupo de listas
$(document).on('change','input.llave',function(e){
	e.preventDefault();
    //captura la clase del formulario donde esta el elemento
    var formClass = $(this).parents('form').attr('class');
    //captura el texto donde viene el codigo para luego extraerlo
    var codigoText = $(this).parent().find('label.llave-label').text();
    //el codigo se recibe unido al nombre por un espacio ' ' y se basa en eso para separarlo
    codigoText = codigoText.substring( 0, codigoText.indexOf(' ') );
	var minCodigo = ( (codigoText.length > 1) ? '00' : '0');
    $('form.' + formClass + ' input.codigo').val(codigoText).attr('min',codigoText + minCodigo);
});

function reemplazarValores(contenedorId){
	//especifico de plan de cuentas
	var cuenta_tipo = $('#'+contenedorId).find('.cuenta_tipo').val();
	$('#'+contenedorId).parent().parent().find('select#tipo').val(cuenta_tipo);
	$('#'+contenedorId).parent().parent().find('input#tipo').val(cuenta_tipo);
};

<!-- cierra el formulario cuando se da click en el boton de confirmacion y ejecuta el envio -->
$(document).on('click','.modal.fade.formModalSelect #confirmar',function(e){
	var thisParent =  $(this).parents('.formModalSelect').attr('id');
	if(thisParent != undefined ){
		var element = $('#'+thisParent).find('.element').attr('element');
		var id = $('#'+thisParent).find('.id').attr('id');
		var optionVal = $('#'+thisParent).find('.id').val();
		var optionText = $('#'+thisParent).find('.element').val();
		var value = $('#'+thisParent).find('select.select_dynamic#'+element ).val();
		if( value != null ){
			$('#'+thisParent).parent().find('input#'+id).val(optionVal);
			$('#'+thisParent).parent().find('label#'+id).text(optionText).change();
			$('#'+thisParent).parent().find('input#'+id).change();
			reemplazarValores(thisParent);
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
	var urlDestino = $('#' +thisParent+ ' input.urlDestino').val();
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
	$.get(urlDestino + "="+para+"&id="+event.target.value+"", function(response, state){
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