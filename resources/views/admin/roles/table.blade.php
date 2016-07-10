<table class="table table-responsive" id="roles-table">
    <thead>
        <th>Titulo</th>
        <th>Slug</th>
    @if( $ruta == 'roles' )
        <th>Permisos</th>
    @elseif( $ruta == 'permisos' )
        <th>Descripción</th>
    @endif
        <th colspan="3">Acción</th>
    </thead>
    <tbody> 
    @foreach($datos as $datos)
        <tr>
        @if( $ruta == 'roles' )
            <td>{!! $datos->role_title !!}</td>
            <td>{!! $datos->role_slug !!}</td>
            <td>
                @foreach($datos->permissions as $permission)
                  <spam class="rol">{{$permission->permission_title}}</spam >
                @endforeach
            </td>
        @elseif( $ruta == 'permisos' )
            <td>{!! $datos->permission_title !!}</td>
            <td>{!! $datos->permission_slug !!}</td>
            <td>{!! $datos->permission_description !!}</td>
        @endif

            <td>
                <div class='btn-group'>
                    <a href="{!! route('admin.'.$ruta.'.show', [$datos->id]) !!}" class='btn btn-default btn-sm' id='link_ver' title='Ver'><i class="glyphicon glyphicon-search"></i> Ver</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>