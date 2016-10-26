// realiza la carga automatica y dinamica del select para TERCERO / ACTIVO
$(document).on('change','.form_search #tipo_busqueda',function(event){
	var tipo = $(this).val();
	var formId = $(this).parents('form').attr('id');

	var filtrosMovimiento = {'SUCURSAL':'select', 'DETALLE':'input[type="text"]', 'CUENTAAUXILIAR':'select', 'TERCERO':'select', 'ACTIVO':'select', 'DEBE':'input[type="number"]', 'HABER':'input[type="number"]'};
	
	if( $('#'+ formId ).hasClass('search_movimiento') && filtrosMovimiento[tipo] != undefined ){
		$(filtrosMovimiento[tipo] +'#busqueda').attr('name',tipo);
		$('#' +formId+ ' #busqueda[name="'+tipo+'"]').val('');
		if (filtrosMovimiento[tipo] == 'select') {
			$('#' +formId+ ' #busqueda[name="'+tipo+'"]').empty();
			CambiarContenidoSelect( $(this) , tipo);	
		};
	}

	$('#'+ formId +' #busqueda').addClass('oculto').attr('disabled','disabled');
	$('#'+ formId +' #busqueda[name="'+ tipo +'"]').removeClass('oculto').removeAttr('disabled');

});


// realiza la carga automatica y dinamica de los select en la pestaña lista de la busqueda de cuentas
function CambiarContenidoSelect(origen,destinoName){
	var origenVal = origen.val();
	var origenParent =  origen.parents('form').attr('id');
	var urlDestino = $('#'+ origenParent +' input.urlDestino').val();
	var destinoVal = $('#'+ origenParent +' select[name="'+ destinoName +'"]').val();
	
	$('#' +origenParent+ ' select[name="'+destinoName+'"]').empty();
	if(!origenVal){
		return false;
	}
	//esta peticion tendra una respuesta y un estado
	$.get(urlDestino +"?listas="+ origenVal, function(response, state){
		//se puede ver que es lo que esta recibiendo
		//console.log(response);
		
		//se insertan los elementos recibidos con formato de option dentro del select
		for(i=0; i<response.length; i++){
			$('#'+ origenParent +' select[name="'+ destinoName +'"]').append('<option value="'+ response[i].id +'">'+ response[i].nombre +'</option>');
		}
	});
};

//es utilizado por el formulario de busqueda por parametro, se encarga del proceso de cargue del resultado de la busqueda
$(".form_search").submit(function(e){
	e.preventDefault();
	var formId = $(this).attr('id');
	if( $("#"+ formId +" #tipo_busqueda").length > 0 ){
		var urlDestino = $('#'+ formId).attr('action');
		var route = urlDestino + '?tipo=' + $("#"+ formId +" #tipo_busqueda").val();
		var search = '&busqueda='+ $("#"+ formId +" #busqueda[name='"+ $("#"+ formId +" #tipo_busqueda").val() +"']").val();
	}
	var results = $("#"+ formId).parents('.search_content').find(".results");
	CargaForm(route,results,search);
});

//de acuerdo al tipo de busqueda, realiza la peticion y muestra el resultado
// es usado por varios formularios: para cargar formularios de ver, editar o crear 
function CargaForm(route,results,search){
	search = search || "";
	results.empty();
	$.get(route + search, function(res){
		results.append(res);
		results.find(".row").removeClass('row');
	}).fail(function(msj) {
		results.prepend(msj);
	});
}

//se encarga de la paginacion por ajax, evita que se recargue la pagina por el link de los botones 
$(document).on('change','form.movimiento_contable #debe, form.movimiento_contable #haber',function(e){
	//prevenir que ese evento desencadene algo
	var thisId = $(this).attr('id');
	var thisVal = $(this).val();
	if (thisId == 'debe' && ( thisVal != '0' || thisVal != '' ) ) {
		$('form.movimiento_contable #haber').val('0');
	}else if(thisId == 'haber' && ( thisVal != '0' || thisVal != '' ) ) {
		$('form.movimiento_contable #debe').val('0');
	};
});