@extends('layouts.app')

@section('title', 'Listado de categorías')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de usuarios</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/users/create') }}" class="btn btn-primary btn-round">Nuevo usuario</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-md-3 text-center">Nombre</th>
                                <th class="col-md-1 text-center">Usuario</th>
                                <th class="col-md-2 text-center">Correo eléctronico</th>
                                <th class="col-md-1 text-center">Rol</th>
                                <th class="col-md-1 text-center">status</th>
                                <th>Foto</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->rol->name}}</td>
                                <td>{{ $user->status==1?'Habilitado':'Deshabilitado' }}</td>
                                <td>
                                    <img src="{{ $user->profilePhoto }}" height="50">
                                </td>
                                <td class="td-actions text-right">
                                    <form method="post" action="{{ url('/admin/users/'.$user->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        
                                        <a href="{{ url('users/'.$user->id) }}" target="_blank" rel="tooltip" title="Ver categoría" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" rel="tooltip" title="Editar categoría" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@include('includes.footer')
@endsection
