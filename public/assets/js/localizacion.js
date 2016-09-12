$(document).ready(function () {
	$('#pais_id').change( function(event) {
		$.ajax({
			url: '/cities/listStates',
			type: 'POST',
			data: '_token=' + $("input[name=_token]").val() + '&id_pais=' + $("#pais_id option:selected").val(),
		}).done(function ( departamentos ){
			// console.log(JSON.stringify(departamentos));
			$('#departamento_id').html('');
			$('#ciudad_id').html('');
			$('#departamento_id').append($('<option></option>').text('Seleccione el departamento').val(''));
			$('#ciudad_id').append($('<option></option>').text('Seleccione la ciudad').val(''));
			$.each(departamentos, function(i,item) {
				$('#departamento_id').append("<option value=\""+ i +"\">" + item + "</option>");
			});
		});
	});

	$('#departamento_id').change( function(event) {
		$.ajax({
			url: '/cities/listCities',
			type: 'POST',
			data: '_token=' + $("input[name=_token]").val() + '&id_departamento=' + $("#departamento_id option:selected").val(),
		}).done(function ( ciudades ){
			// console.log(JSON.stringify(ciudades));
			$('#ciudad_id').html('');
			$('#ciudad_id').append($('<option></option>').text('Seleccione la ciudad').val(''));
			$.each(ciudades, function(i,item) {
				$('#ciudad_id').append("<option value=\""+ i +"\">" + item + "</option>");
			});
		});
	});
});