@extends('layouts.app')

@section('body-class', 'profile-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="{{ $user->profilePhoto }}" alt="Circle Image" class="img-circle image-cropper img-responsive img-raised">
                    </div>
                    <div class="name">
                        <h3 class="title">{{ $user->name }}</h3>
                        <p>{{ $rol->name }}</p>
                    </div>
                   
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                </div>
                <hr>
                <div class="section landing-section">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center title">Datos de cuenta</h2>
                            <div class="text-center">
                                <a style="margin-right: 10px;" href="#">Cambiar contraseña</a> | <a style="margin-left: 10px;" href="#">Cambiar Foto</a>
                            </div>
                                
                            <form class="contact-form" method="POST" action="{{ url('/myaccount/edit') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="">
                                            <label class="control-label">Cambiar foto</label>
                                            <input type="file" name="photo">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Correo Electrónico</label>
                                            <input type="email" name="email" class="form-control"  value="{{ old('email', $user->email) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Phone</label>
                                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Usuario</label>
                                            <input type="text" name="username" class="form-control"  value="{{ old('username', $user->username) }}">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4 text-center">
                                        <button class="btn btn-primary btn-raised">
                                            Guardar Cambios
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
    </div>
</div>


@include('includes.footer')
@endsection
