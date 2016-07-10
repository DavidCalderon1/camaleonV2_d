@extends( isset($modal) ? 'forms.modal' : 'layouts.empty', ['tipo' => 'otro'])
	@section( isset($modal) ? 'modal_content' : 'data')
	  @if( isset($first_select))
		<div class="col-sm-6 form-group">
			<!-- Field -->
		    {!! Form::label($first_select->id, $first_select->label.': ') !!}
		    {!! Form::select($first_select->id, $first_select->list, null, ['class' => 'form-control full select_dynamic', 'para' => $first_select->para, 'name' => $first_select->id, 'placeholder' => $first_select->placeholder ])!!}
		</div>
	  @endif

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