<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>SMD Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('components.adminHeader')

<div class="container-fluid">
    <div class="row">
        @include('components.adminNavbar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Atualizar produto</h1>
            </div>
            <form action="{{route('categoria.update', $categoria->id)}}" enctype="multipart/form-data" method="post">
                @csrf
                @method('patch')
                <input type="text" hidden name="name" value="{{$categoria->id}}"/>
                <h5>Nome da categoria:</h5>
                <input type="text" name="descricao" class="form-control my-2" value="{{$categoria->descricao}}"/>
                <div class="d-flex col-12 w-100">
                    <button type="submit" class="btn btn-warning my-2 align-self-end">Atualizar dados</button>
                </div>
            </form>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
