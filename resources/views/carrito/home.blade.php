@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Carrito de compras</h2>

            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <!-- Tabs on Plain Card -->
                    <div class="card card-nav-tabs card-plain">
                        <div class="header header-primary">
                            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="active">
                                            <a href="#profile" data-toggle="tab">
                                                <i class="material-icons">dashboard</i>
                                                Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#historial" data-toggle="tab">
                                                <i class="material-icons">schedule</i>
                                                Historial
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="tab-content text-center">
                                <div class="tab-pane active" id="carrito">
                                     
                                    @if(auth()->user()->cart->details->count()>0)
                                    <div id="carrito">
                                        <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos.</p>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Nombre</th>
                                                    <th>Precio</th>
                                                    <th>Cantidad</th>
                                                    <th>SubTotal</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (auth()->user()->cart->details as $detail)
                                                <tr>
                                                    <td class="text-center">
                                                        <img src="{{ $detail->product->featured_image_url }}" height="50">
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a>
                                                    </td>
                                                    <td>$ {{ $detail->product->price }}</td>
                                                    <td>{{ $detail->quantity }}</td>
                                                    <td>$ {{ $detail->quantity * $detail->product->price }}</td>
                                                    <td class="td-actions">
                                                        <form method="post" action="{{ url('/cart') }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                                            
                                                            <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                                                <i class="fa fa-info"></i>
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

                                        <hr>



                                        <p><strong>Importe a pagar:</strong> {{ auth()->user()->cart->total }}</p>

                                        <div class="text-center">
                                            <form method="post" action="{{ url('/order') }}">
                                                {{ csrf_field() }}
                                                
                                                <button class="btn btn-primary btn-round">
                                                    <i class="material-icons">done</i> Realizar pedido
                                                </button>
                                            </form>
                                            
                                        </div>

                                    </div> <!-- #carrito-compras -->
                                    @else
                                        <h3 class="text-center"> Su carrito de compras se encuentra vacío</h2>
                                    @endif
                                </div>
                                <div class="tab-pane" id="historial">
                                    <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Ticket</th>
                                                    <th class="text-center">Fecha</th>
                                                    <th class="text-center">Estado</th>
                                                    <th class="text-center">Monto</th>
                                                    <th class="text-center">Detalles</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($carts  as $cart)
                                                    @if($cart->status!='Active')
                                                        <tr>
                                                        <td class="text-center">
                                                            {{ $cart->id }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $cart->order_date }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $cart->status }}
                                                        </td>
                                                        <td>$ {{ $cart->total }}</td>
                                                        <td class="td-actions">
                                                            <a href="{{ url('/cart/'.$cart->id) }}" target="_blank" rel="tooltip" title="Ver detalles" class="btn btn-default btn-simple btn-xs">
                                                                <i class="fa fa-eye"></i>
                                                            </a>                               
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Tabs on plain Card -->
                </div> <!-- .col-md-12 -->
            </div> <!-- .row -->
        </div>
    </div>
</div>


@include('includes.footer')
@endsection