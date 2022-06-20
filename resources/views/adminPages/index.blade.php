<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Pokemon Store</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        @include('components.adminHeader')

        <div class="container-fluid">
            <div class="row">
                @include('components.adminNavbar')

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Meus dados</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <button type="button" class="btn btn-sm btn-danger">Excluir meus dados</button>
                        </div>
                    </div>
                    <form action="/user/profile-information" method="post">
                        @csrf
                        @method('put')

                        <h5>Nome de usuário:</h5>
                            <input type="text" name="name" class="form-control my-2" value="{{auth()->user()->name}}"/>
                        <h5>Endereço: </h5>
                            <input type="text" name="address" class="form-control my-2" value="{{auth()->user()->address}}"/>
                        <h5>Email: </h5>
                            <input type="email" name="email" class="form-control my-2" value="{{auth()->user()->email}}"/>
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
