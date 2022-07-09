<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SMD Store</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        @include('components.navbar')

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">



                        @foreach($produtos as $produto)
                            <form action="{{route('cart.add')}}" method="post">
                                @csrf
                                <input type="text" name="quantidade" hidden value="1">
                                <input type="text" name="produto_id" hidden value="{{$produto->id}}">

                            <div class="col">
                                <div class="card shadow-sm">
                                    <img
                                        src="{{asset('storage/'.$produto->foto)}}"
                                        height="200"
                                    />
                                    <div class="card-body">
                                        <h5 class="card-text">{{$produto->descricao}}</h5>
                                        <h6 class="text-primary">R$ {{$produto->preco}}</h6>
                                        <div class="d-flex justify-content-end align-items-center">
                                            <div class="btn-group">
                                                    @auth
                                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Adicionar ao carrinho</button>
                                                    @else
                                                        <a href="{{route('login.view')}}" class="btn btn-sm btn-outline-secondary">Adicionar ao carrinho</a>
                                                    @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </form>
                        @endforeach


                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
