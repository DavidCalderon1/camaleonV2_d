@if( $ruta == 'permisos' )
    <!-- Permission Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('permission_title', 'Título:') !!}
        <p>{!! $datos->permission_title !!}</p>
    </div>

    <!-- Permission Slug Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('permission_slug', 'Slug:') !!}
        <p>{!! $datos->permission_slug !!}</p>
    </div>

    <!-- Permission Description Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('permission_description', 'Descripción:') !!}
        <p>{!! $datos->permission_description !!}</p>
    </div>
@endif

@if( $ruta == 'roles' )
    <!-- Role Title Field --> 
    <div class="form-group col-sm-6">
        {!! Form::label('role_title', 'Título:') !!}
        <p>{!! $datos->role_title !!}</p>
    </div>

    <!-- Role Slug Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('role_slug', 'Slug:') !!}
        <p>{!! $datos->role_slug !!}</p>
    </div>

    <!-- Permisos Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Permissions', 'Permisos:') !!}
        <p>
        @foreach($datos->permissions as $permission)
          <spam class="rol">{{$permission->permission_title}}</spam >
        @endforeach
        </p>
    </div>
@endif