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
                        <p>{{ $user->rol->name }}</p>
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
                    <hr>

                     <h2 class="text-center title" style="margin-bottom: 0px; margin-top: 30px;">Métodos de pago</h2>
                     <div class="text-center">
                        <a href="#" data-toggle="modal" data-target="#modalAddCard">
                            <i class="material-icons">add</i> Agregar tarjeta
                        </a>
                     </div>
                </div>
            </div>
    </div>
</div>
</div>


<div class="modal fade" id="modalAddCard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Ingrese los datos de su tarjeta de débito o crédito</h4>
      </div>
      <form action="#" id="payment-form">
        {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name="token_id" id="token_id">
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group label-floating">
                        <label>Nombre del titular</label><input type="text" placeholder="Como aparece en la tarjeta" value="Josue Garcia" autocomplete="off" name="name" data-openpay-card="holder_name" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label>Número de tarjeta</label>
                            <input type="text" autocomplete="off" data-openpay-card="card_number" value="4111111111111111" class="form-control"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 ">
                        <div class="form-group label-floating">
                            <label>Mes de expiración</label>
                            <input type="text" class="form-control" placeholder="MM" data-openpay-card="expiration_month" value="09">
                        </div>
                    </div>
                    <div class="col-md-3 form-group label-floating">
                        <label>Año de expiración</label>
                        <input type="text" placeholder="YY" data-openpay-card="expiration_year" value="22" class="form-control">
                    </div>
                    <div class="col-md-4 form-group label-floating"><label>Código de seguridad</label>
                        <div class="sctn-col half l"><input type="text" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2" value="657" class="form-control"></div>
                    </div>
                </div>
                    <label class="form-control">Tus pagos se realizan de forma segura con encriptación de 256 bits</label>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
            <button type="button" id="pay-button" class="btn btn-info btn-simple">Agregar tarjeta</button>
          </div>
      </form>
    </div>  
  </div>
</div>   

@include('includes.footer')
@endsection
@section('scripts')
<script>
     $(document).ready(function() {
            OpenPay.setId('mzi3n9jplzsfvk30dqlb');
            OpenPay.setApiKey('pk_991ffb3972c64b91ad85ffe5e6c4a04e');
            OpenPay.setSandboxMode(true);
            //Se genera el id de dispositivo
            var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");
            
            $('#pay-button').on('click', function(event) {
                event.preventDefault();
                $("#pay-button").prop( "disabled", true);
                OpenPay.token.extractFormAndCreate('payment-form', sucess_callbak, error_callbak);                
            });

            var sucess_callbak = function(response) {
              var token_id = response.data.id;
              $('#token_id').val(token_id);
              //alert(token_id);
              $('#payment-form').submit();
            };

            var error_callbak = function(response) {
                var desc = response.data.description != undefined ? response.data.description : response.message;
                alert("ERROR [" + response.status + "] " + desc);
                $("#pay-button").prop("disabled", false);
            };

        });
</script>
@endsection
