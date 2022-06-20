<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SMD Store</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <div class="modal fade" id="modal-nova-categoria">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nova categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('categoria.store')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label class="mb-2">Descrição</label>
                                <input type="text" name="descricao" class="form-control" placeholder="Descrição">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar categoria</button>
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
                        <h1 class="h2">Categorias</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-nova-categoria">Nova categoria</button>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Categoria</th>
                                <th scope="col" class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($categorias as $categoria)
                                <tr>
                                    <td>{{$categoria->descricao}}</td>
                                    <td class="text-end">
                                        <div class="d-flex flex-row justify-content-end gap-2">
                                            <a href="{{route('categoria.getOne', $categoria->id)}}" role="button" class="btn btn-warning">Editar</a>
                                            <form action="{{route('categoria.destroy', $categoria->id)}}" method="POST">
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
