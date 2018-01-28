@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar usuario</h2>

             @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="contact-form" method="POST" action="{{ url('/admin/users/'.$user->id.'/edit') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <label class="control-label">Foto</label>
                            <input type="file" name="photo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Usuario</label>
                            <input type="text" name="username" class="form-control"  value="{{ old('username',$user->username) }}">
                        </div>
                    </div>
               
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control"  value="{{ old('email',$user->email) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone',$user->phone) }}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            <select class="form-control" name="userrol_id">
                            @foreach($roles as $rol)
                                @if($user->userrol_id==$rol->id)
                                    <option value="{{ $rol->id }}" selected>{{ $rol->name }}</option>
                                @else
                                    <option value="{{ $rol->id }}" >{{ $rol->name }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                    </div>

  
                </div>
                <input type="hidden" name="password" class="form-control" value="secret" >
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 text-center">
                        <button class="btn btn-primary btn-raised">
                            Guardar
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>

</div>

@include('includes.footer')
@endsection
