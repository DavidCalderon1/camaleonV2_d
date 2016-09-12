// realiza la carga automatica y dinamica del select para TERCERO / ACTIVO
$(document).on('change','#search_param #tipo_busqueda',function(event){
	var tipo = $(this).val();

	$('#search_param #busqueda').addClass('oculto').attr('disabled','disabled');
	$('#search_param #busqueda[name="'+ tipo +'"]').removeClass('oculto').removeAttr('disabled');

});


//es utilizado por el formulario de busqueda por parametro, se encarga del proceso de cargue del resultado de la busqueda
$("#search_param").submit(function(e){
	e.preventDefault();
	if( $("#tipo_busqueda").length > 0 ){
		var route = window.location.pathname + '?tipo=' + $("#parametros #tipo_busqueda").val();
		var search = '&busqueda='+ $("#parametros #busqueda[name='"+ $("#parametros #tipo_busqueda").val() +"']").val();
	}
	var results = $("#parametros #results");
	CargaForm(route,results,search);
});

//de acuerdo al tipo de busqueda, realiza la peticion y muestra el resultado
// es usado por varios formularios: para cargar formularios de ver, editar o crear 
function CargaForm(route,results,search = ""){
	results.empty();
	$.get(route + search, function(res){
		results.append(res);
		results.find(".row").removeClass('row');
	}).fail(function(msj) {
		results.prepend(msj);
	});
}