@extends( isset($modal) ? 'forms.modal' : 'layouts.empty', ['tipo' => 'otro'])
	@section( isset($modal) ? 'modal_content' : 'data')
	  <div class="col-sm-6 form-group">
		  {!! Form::label('cuenta_tipo', 'Tipo: ') !!}
		  {!! Form::select('cuenta_tipo', config('options.pc_types'), null, ['class' => 'form-control full select_dynamic cuenta_tipo', 'para' => 'clases', 'name' => 'cuenta_tipo'])!!}
	  </div>

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