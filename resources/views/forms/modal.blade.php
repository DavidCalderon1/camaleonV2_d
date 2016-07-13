<div class="modal fade {{ $modal->class or 'formModal' }}" id="{{ $modal->id or '' }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="modalLabel">{{ $modal->title or '' }}</h4>
	  </div>
	  @include('layouts.alerts')
	  <div class="modal-body" id="modal-body">
		<!--los imput que guardan el id y el nombre correspondiente al elemento-->
		<input type="hidden" id="id" class="id">
		<input type="hidden" id="name" class="element" element="element">

		@yield('modal_content')
		
	  	<hr>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">{{$modal->buttonCancel or 'Cancelar' }}</button>
		<button type="button" class="btn btn-primary" modal-action="" id="confirmar">{{$modal->buttonConfirm or 'Confirmar' }}</button>
	  </div>
	</div>
  </div>
</div>