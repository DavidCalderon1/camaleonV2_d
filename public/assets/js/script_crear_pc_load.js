
$("#find_form_create").submit(function(e){
	e.preventDefault();
	var tipo_cuenta = $("#tipo_cuenta").val();
	Carga(tipo_cuenta);
});

//de acuerdo al tipo de cuenta seleccionada realiza la peticion y muestra el resultado
function Carga(ruta){
	var results = $(".load_form_create #results");
	var ruta = "/admin/pc/" + ruta + "/create";
	results.empty();
	$.get(ruta, function(res){
		results.append(res);
		$(".load_form_create #results .row").removeClass('row');
	});
}
