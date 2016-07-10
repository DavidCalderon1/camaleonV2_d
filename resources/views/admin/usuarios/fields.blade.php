<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

@if(isset($user->deleted_at)) 
<!-- deleted_at Field -->
<div class="form-group col-sm-6">
    <label >Eliminado:</label>
    <label for="deleted_at" class="form-control">
    {!! Form::checkbox('deleted_at', '1', false, ['id' => 'deleted_at']) !!}
     Restaurar</label>
</div>
@endif

@if( isset($user))
<!-- Roles Field -->
<div class="col-sm-6 form-group">
    {!! Form::label('Roles', 'Roles: ') !!}<i> (ctrl + click)</i>
    <select class="form-control full" id="Roles[]" name="Roles[]" multiple="multiple">
    @foreach($listRoles as $id => $title)
        {{ $selected = '' }}
        @foreach($user->roles as $rol)
            @if($id == $rol->id)
                {{ $selected = 'selected' }}
            @endif
        @endforeach
        <option value="{{$id}}" {{ $selected }} >{{$title}}</option>
    @endforeach
    </select>
</div>
@else
<!-- listRoles Field -->
<div class="col-sm-6 form-group">
    {!! Form::label('listRoles', 'Roles: ') !!}<i> (ctrl + click)</i>
    {!! Form::select('Roles[]', $listRoles, null, ['class' => 'form-control full', 'id' => 'Roles[]', 'multiple' ])!!}
</div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.usuarios.index') !!}" class="btn btn-default">Cancelar</a>
</div>
