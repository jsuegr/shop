@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Detalle de compras</h2>

            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif

        
            <hr>
            @if($cart->details->count()>0)
            <div id="carrito">
                <p>Tu carrito de compras presenta {{ $cart->details->count() }} productos.</p>

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
                        @foreach ($cart->details as $detail)
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
                                <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <p><strong>Importe a total:</strong> {{ $cart->total }}</p>
            </div> <!-- #carrito-compras -->
            @else
                <h3 class="text-center"> Su carrito de compras se encuentra vacío</h2>
            @endif
        </div>

    </div>
</div>

@include('includes.footer')
@endsection