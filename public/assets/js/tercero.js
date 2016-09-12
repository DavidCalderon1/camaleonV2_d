$(document).ready(function () {

	$("input[name=tipo]").click(function(){
		var tipo = $(this).val();

		$.ajax({
			url: 'tercero_tipo',
			type: 'POST',
			data: '_token=' + $("input[name=_token]").val() + '&tipo=' + tipo
		}).done(function (tercero){
			$('#carga-form').html('');
			$('#carga-form').html(tercero);
		});
	});
});