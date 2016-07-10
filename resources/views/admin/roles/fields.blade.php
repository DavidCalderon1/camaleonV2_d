@if( $ruta == 'permisos' )
<!-- Permission Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permission_title', 'Título:') !!}
    {!! Form::text('permission_title', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Permission Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permission_slug', 'Slug:') !!}
    {!! Form::text('permission_slug', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Permission Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permission_description', 'Descripción:') !!}
    {!! Form::textarea('permission_description', null, ['class' => 'form-control']) !!}
</div>
@endif

@if( $ruta == 'roles' )
<!-- Role Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_title', 'Título:') !!}
    {!! Form::text('role_title', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Role Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_slug', 'Slug:') !!}
    {!! Form::text('role_slug', null, ['class' => 'form-control', 'required']) !!}
</div>
@endif

@if( $ruta == 'roles' &&  $accion == 'edit' )
<!-- Roles Field -->
<div class="col-sm-6 form-group">
    {!! Form::label('Permissions[]', 'Permisos: ') !!}<i> (ctrl + click)</i>
    <select class="form-control full" id="Permissions[]" name="Permissions[]" multiple="multiple">
    @foreach($listPermissions as $id => $title)
        {{ $selected = '' }}
        @foreach($datos->permissions as $permission)
            @if($id == $permission->id)
                {{ $selected = 'selected' }}
            @endif
        @endforeach
        <option value="{{$id}}" {{ $selected }} >{{$title}}</option>
    @endforeach
    </select>
</div>
@elseif( isset($listPermissions))
<!-- listRoles Field -->
<div class="col-sm-6 form-group">
    {!! Form::label('Permissions[]', 'Permisos: ') !!}<i>(ctrl + click)</i>
    {!! Form::select('Permissions[]', $listPermissions, null, ['class' => 'form-control full', 'id' => 'Permissions[]', 'multiple' ])!!}
</div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.'.$ruta.'.index') !!}" class="btn btn-default">Cancelar</a>
</div>
