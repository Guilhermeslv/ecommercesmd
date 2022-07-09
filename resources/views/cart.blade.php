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

        <h1 class="my-5">Meu carrinho</h1>

        @empty($cart)
            <div class="alert alert-warning" role="alert">
                Carrinho Vazio
            </div>
        @else
            @foreach($cart->itens as $cartitem)
                <div class="card my-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row gap-3 align-items-center">
                                <h5>{{$cartitem->produto->descricao}}</h5>
                                <span class="text-muted">Quantidade: </span>
                                <form action="{{route('cart.update', $cartitem->id)}}" method="post">
                                    @csrf
                                    <div class="d-flex flex-row gap-2">
                                        <input type="number" name="quantidade" class="form-control" value="{{$cartitem->quantidade}}">
                                        <button class="btn btn-warning">Atualizar</button>
                                        {{$cartitem->produto->quantidade}}
                                    </div>
                                </form>
                            </div>

                            <div class="d-flex flex-row gap-2">
                                <div class="d-flex flex-column">
                                    <span class="text-muted">Valor unitário: {{$cartitem->produto->preco}}</span>
                                    <h5 class="text-primary">R$ {{$cartitem->quantidade * $cartitem->produto->preco}}</h5>
                                </div>
                                <div>
                                    <form action="{{route('cart.remove', $cartitem->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

                <div class="my-5 d-flex justify-content-between">
                    <div>
                        <span class="text-muted">Total</span>
                        <h3 class="text-primary">R$ {{$cart->total}}</h3>
                    </div>

                    <div>
                        <form action="{{route('cart.finish')}}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary">
                                Finalizar compra
                            </button>
                        </form>
                    </div>
                </div>
        @endempty



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
