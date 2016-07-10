<table class="table table-responsive" id="users-table">
    <thead>
        <th>Nombre</th>
        <th>Email</th>
        <th></th>
        <th>Roles</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            <td>
                @if($user->deleted_at)
                    <spam class="label label-danger" title="Eliminado">
                        <i class="glyphicon glyphicon-remove"></i>
                    </spam>
                @else
                    <spam class="label label-success" title="Activo">
                        <i class="glyphicon glyphicon-ok"></i>
                    </spam>
                @endif
            </td>
            <td>
                
                @foreach($user->roles as $rol)
                  <spam class="rol">{{$rol->role_title}}</spam >
                @endforeach

            </td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('admin.usuarios.show', [$user->id]) !!}" class='btn btn-default btn-sm' id='link_ver' title='Ver'><i class="glyphicon glyphicon-search"></i> Ver</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>