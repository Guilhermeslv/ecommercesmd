<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SMD Store</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <div class="modal fade" id="modal-novo-produto">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nova categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('produto.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label class="mb-2">Nome do produto</label>
                                <input type="text" name="descricao" class="form-control" placeholder="Nome do produto">
                            </div>

                            <div class="form-group mb-3">
                                <label class="mb-2">Preço</label>
                                <input type="number" name="preco" class="form-control" placeholder="Preço do produto">
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Quantidade</label>
                                <input type="nuumber" name="quantidade" class="form-control" placeholder="Quantidade do produto">
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Foto do produto</label>
                                <input type="file" name="foto" class="form-control" placeholder="Foto do produto">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar produto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('components.adminHeader')

        <div class="container-fluid">
            <div class="row">
                @include('components.adminNavbar')

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Produtos</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-novo-produto">Novo produto</button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Foto</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col" class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos as $produto)
                                <tr>
                                    <td><img width="50" src="{{asset('storage/' . $produto->foto)}}" alt="">  </img></td>
                                    <td>{{$produto->descricao}}</td>
                                    <td>R$ {{$produto->preco}}</td>
                                    <td>{{$produto->quantidade}}</td>
                                    <td class="text-end">
                                        <div class="d-flex flex-row justify-content-end gap-2">
                                            <a href="{{route('produto.getOne', $produto->id)}}" role="button" class="btn btn-warning">Editar</a>

                                            <form action="{{route('produto.destroy', $produto->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button role="button" type="submit" class="btn btn-danger">Apagar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </main>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
