<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>SMD Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('components.navbar')

@if(\Illuminate\Support\Facades\Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{\Illuminate\Support\Facades\Session::get('message')}}
    </div>
@endif

<div class="container">

    <h1 class="my-5">Minhas compras</h1>

    @empty($cart)
        <div class="alert alert-warning" role="alert">
            Não há compras cadastradaas
        </div>
    @else
        @foreach($cart as $c)
            <div class="card my-3">
                <div class="card-body">
                    <span class="text-muted">Total</span>
                    <h3 class="text-primary">R$ {{$c->total}}</h3>

                    <h6>Produtos:</h6>

                    <ul>
                        @foreach($c->itens as $cartitem)
                            <li>{{$cartitem->produto->descricao}}</li>
                        @endforeach
                    </ul>


                </div>
            </div>
        @endforeach
    @endempty


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
