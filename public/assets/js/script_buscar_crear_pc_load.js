//es utilizado por el formulario de creacion, se encarga del proceso de cargue del formulario de creacion
$("#find_form_create").submit(function(e){
	e.preventDefault();
	var route = "/admin/pc/" + $("#subtipo_cuenta").val() + "/create";
	$(location).attr('href',route);
});



//se encarga de la paginacion por ajax, evita que se recargue la pagina por el link de los botones 
$(document).on('click','.pagination a',function(e){
	//prevenir que ese evento desencadene algo
	e.preventDefault();
	
	//captura el atributo href y lo divide, mostrando lo que esta despues del string 'page='
	//var page = $(this).attr('href').split('page=')[1];
	var nameParent = $(this).parents('.results').attr('name');
	//var route = "/admin/pc/" + $(".results[name='"+ nameParent +"'] #cuenta_busqueda").val();
	//var search = '?page='+ page;
	var route = $(this).attr('href').split(window.location.host)[1];
	var results = $(".results[name='"+ nameParent +"']");
	var search = '';
	CargaForm(route,results,search);
});

//es utilizado por el formulario de busqueda por parametro, se encarga del proceso de cargue del resultado de la busqueda
$("#search_param").submit(function(e){
	e.preventDefault();
	if( $("#cuenta_busqueda").length > 0 ){
		var tipo = '?tipo_cuenta='+ $("#parametros #cuenta_tipo").val();
		var route = "/admin/pc/" + $("#parametros #cuenta_busqueda").val();
		var search = tipo + '&busqueda='+ $("#parametros #busqueda").val();
	}else if( $("#tipo_busqueda").length > 0 ){
		var route = window.location.pathname + '?tipo=' + $("#parametros #tipo_busqueda").val();
		var search = '&busqueda='+ $("#parametros #busqueda").val();
	}
	var results = $("#parametros #results");
	CargaForm(route,results,search);
});

//es utilizado por el formulario de busqueda por listas o selects, se encarga del proceso de cargue del resultado de la busqueda
$("#search_list").submit(function(e){
	e.preventDefault();
	var tipo = '?tipo_cuenta='+ $("#lista #cuenta_tipo").val();
	var route = "/admin/pc/" + $("#lista #cuenta_busqueda").val();
	var search = tipo + '&listaid='+ $("#lista #cuenta_busqueda").attr('llave');
	var results = $("#lista #results");
	console.log("CargaForm("+route+","+results+","+search+")");
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

// realiza la carga automatica y dinamica de los select en la pestaña 'Lista' de la busqueda de cuentas
$("#lista select").each(function(){
	$(this).change(function(event){
		var para = $(this).attr('para');
		var thisId = $(this).attr('id');
		var thisValue = event.target.value;
		if(!para){
			return false;
		}
		if(!thisValue){
			//para = thisId;
		}
		//guarda el nombre de la lista que se selecciono para enviarla como busqueda 
		$("#lista #cuenta_busqueda").val(para).attr("llave",thisValue);
		

		//para cambiar la url	
		var cuenta_tipo = $(this).parents('form').find('#cuenta_tipo').val();
		var parametrosInput = 'tab=lista' + '&cuenta_tipo=' + cuenta_tipo + '&cuenta_busqueda=' + para + '&llave=' + thisValue;
		var nombrePath = window.location.pathname;

		$(this).parents('form').find('#parametrosUrl').val(parametrosInput);
		window.history.replaceState("object", nombrePath, nombrePath +'?'+ parametrosInput);

	});
});

// envia la informacion del formulario 
// es usado por varios formularios: para cargar formularios de ver, editar o crear 
function formEnviar(form,results,type,mostrarMsg){
	mostrarMsg = mostrarMsg || 'no';
	//var token = $('.form_delete input[name="_token"]').val();
	var route = $(form).attr('action');
	var inputData = $(form).serialize();
	var token = $(form).find('input[name="_token"]').val();
	console.log(form + '\n' + results);
	//se envia la peticion mediante el metodo DELETE con el id del genero
	$.ajax({
		url: route,
		type: 'POST',
		headers: {'X-CSRF-TOKEN': token},
		data: inputData,
		success: function(msj){
			if ( msj.status === 'success' ) {
				$(results + " #msj-success").find('#tipo').text(type);
				$(results + " #msj-success").fadeIn().append(msj.msg);
            }else{
            	//$(results).empty().append(msj);
            	if(mostrarMsg == 'si'){
            		$( results ).parent().find( "> #msg" ).empty().append( $(results + " #msj-success") );
	            	$( results ).empty();
	            	$( results ).parent().find( " #msj-success" ).fadeIn().find('#tipo').text(type);
            	}
            	$( results ).html(msj);
            }
		},
        error:function(msj){
        	var row = '';
            if ( msj.status === 422 ) {
				row = 'No se logro la '+ type +' del registro. <br>';
            }else if( msj.status === 500 ) {
            	row = msj.responseText;
            }else{
            	row = msj.responseText;
            }
            
            if( msj.responseJSON != undefined ){
            	row = '';
            	$.each(msj.responseJSON, function( index, value ) {
               		row = row + value + "<br>";
            	});
	        }

            $(results + " #msj").html(row);
            $(results + " #msj-error").fadeIn();
            var scrollPos =  $(results + " #msj-error").offset().top;
 			$(window).scrollTop(scrollPos);
        }
	}).fail(function(jqXHR, textStatus, errorThrown) {
        //de este modo se redirecciona a la pagina correspondiente
        if (jqXHR.getResponseHeader('Location') != null){ 
            window.Location= jqXHR.getResponseHeader('Location');
        };
    });
    return false;
}



//ejecuta la funcion de cambiarUrl enviando el elemento que ha cambiado de valor
$("#search_param select, #search_param input[type='text']").each(function(){
	$(this).change(function(event){
		if ($(this).is("input[type='text']") ) {
			$(this).val(($(this).val()).toUpperCase());
		}
		cambiarUrl( $(this) );
	});
});

//recibe el elemento que ha cambiado de valor para agregarlo a la url
function cambiarUrl(thisObj){
	var campo = thisObj.attr('name');
	var valor = thisObj.val();
	var nombrePath = window.location.pathname;
	var parametrosInput = thisObj.parents('form').find('#parametrosUrl').val();

	
	window.history.replaceState("object", nombrePath, nombrePath +'?'+ parametrosInput);

	thisObj.parents('form').find('#parametrosUrl').val(parametrosInput);

	var parametrosUrl = {};
	var campoCambiado = false;

	if (location.search) {
	    var parts = location.search.substring(1).split('&');
	    parametrosInput = '';
	    for (var i = 0; i < parts.length; i++) {
	        var nv = parts[i].split('=');
	        if (!nv[0]) continue;
	        if(nv[0] == campo){
	        	nv[1] = valor;
	        	campoCambiado = true;
	        }
	        parametrosInput = parametrosInput + ((parametrosInput)? '&' : '') + nv[0] +'='+ nv[1];
	        //guarda los parametros en un array
	        parametrosUrl[nv[0]] = nv[1] || true;
	        if (campoCambiado) {
	        	if ( thisObj.hasClass('select_dynamic') ) { break; }
	        }
	        
	    }
	}
	if (!campoCambiado) {
		parametrosInput = parametrosInput + ((parametrosInput)? '&' : '') + campo +'='+ valor;
	}
    
    thisObj.parents('form').find('#parametrosUrl').val(parametrosInput);

	window.history.replaceState("object", nombrePath, nombrePath +'?'+ parametrosInput);
	
};
