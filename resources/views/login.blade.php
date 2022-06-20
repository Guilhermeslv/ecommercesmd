<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SMD Store</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        @include('components.navbar')

        <div class="container d-flex justify-content-center" style="height: 90vh;">

            <div class="col-8 w-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">
                <form action="/login" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="Usuário">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="password" class="form-control" placeholder="Senha">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Login"/>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
