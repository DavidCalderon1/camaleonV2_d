
{{--*/ $PcSelectParametros = new PcSelectParametros /*--}}
{{--*/ $selectData = $PcSelectParametros->selectedData($ruta) /*--}}
{{--*/ $prevKey = $selectData->$ruta->prevKey /*--}}
{{--*/ $modalData = $PcSelectParametros->modalWindowData($ruta,$prevKey) /*--}}


@section('urlDestino')
	{{-- este input guarda la url a la que se enviaran las peticiones para llenar los select --}}
	<input type="hidden" id="urlDestino" class="urlDestino" value="/admin/pc/listas?modulo={{ $ruta }}&cuenta">
@endsection

{{--siempre tiene que haber un primer select que contenga datos precargados con el cual se iniciara el proceso--}}
@section('first_select')
	<div class="fieldbox select">
	  	{!! Form::label('cuenta_tipo', 'Tipo ') !!}
	  	{!! Form::select('cuenta_tipo', config('options.pc_types'), null, ['class' => 'form-control full select_dynamic cuenta_tipo', 'para' => 'clases'])!!}
  	</div>
  	
@endsection

{{-- se estructura el campo de texto, el label y el boton para la ejecucion de la ventana modal --}}
{{-- y se envian los array con los datos para la ventana modal y los select dinamicos --}}
@if( $prevKey != '' && $selectData->$ruta->modal == 'si' ) 

    <div class="fieldbox dynamic">
    	<div class="select_dynamic">
    		<div class="hidden">{!! Form::label($selectData->$ruta->fkId, $selectData->$prevKey->label.'') !!}</div>
		    <label class="form-control text-uppercase selectDynamic llave-label" id="{{ $selectData->$ruta->fkId }}">
			    @if( isset($pcCuenta->cuenta_fk_nombre) && $pcCuenta->cuenta_fk_nombre != '')
					{{ $pcCuenta->cuenta_fk_nombre }} 
		    	@else
		    		{{ $selectData->$ruta->fkNombre }}
		    	@endif
		    </label>
		    <button data-toggle="modal" data-target="#modal{{$ruta}}" elementId="{{ $selectData->$prevKey->id }}" class="btn btn-primary selectDynamic" id="{{ $selectData->$ruta->fkId }}" title="{{ $selectData->$prevKey->placeholder }}" peticion="ajax" type="button"><i class="iconfont icon-search"></i> </button>
    	</div>
	</div>

	{!! Form::hidden($selectData->$ruta->fkId, null, ['class' => 'number llave', 'placeholder' => $selectData->$ruta->fkNombre, 'required' ])!!} 
	
	{{-- se asgina la variable $lists con la lista de los datos para armar los select --}}
	{{--*/ $lists = $PcSelectParametros->removerElementosExtra($selectData, $prevKey) /*--}}
    @include('forms.modal_select', ['modal' => $modalData, 'lists' => $lists ])

@elseif( $selectData->$ruta->modal == 'no' )

	{{-- se asgina la variable $lists con la lista de los datos depurados para armar los select --}}
	{{--*/ $lists = $PcSelectParametros->removerElementosExtra($selectData, $prevKey) /*--}}
	@include('forms.modal_select', ['lists' => $lists ])

@endif

<script type="text/javascript">

    $(document).ready(function(){
        $(".fieldbox.select").animateSelect();
    });

</script>