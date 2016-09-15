@extends( isset($modal) ? 'forms.modal' : 'layouts.empty', ['tipo' => 'otro'])

	@section( isset($modal) ? 'modal_content' : 'data')
	  
	  @yield('urlDestino') 
	  @yield('first_select') 

	  @if( isset($lists))
		@foreach ($lists as $key => $list)
			<div class="col-sm-6 form-group">
				<label for="{{ $list->id }}">{{ $list->label }}: </label>
				<select class="form-control full select_dynamic" id="{{ $list->id }}" name="{{ $list->id }}" para="{{ $list->para }}" disabled>
					<option value="" disabled selected>{{ $list->placeholder }}</option>
				</select>
			</div>
		@endforeach
	  @endif
	@endsection