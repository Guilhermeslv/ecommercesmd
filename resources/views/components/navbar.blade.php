<nav class="navbar navbar-dark bg-dark" aria-label="First navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">SMD Store</a>
        @auth()
            <div class="d-flex flex-row gap-2">
                @if(auth()->user()->admin)
                    <a role="button" href="{{route('adminPages.index')}}" class="btn btn-success">Admin</a>
                @endif
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Sair</button>
                </form>
            </div>
        @endauth

        @guest()
            <div>
                <a role="button" href="{{route('login.view')}}" class="btn btn-secondary">Login</a>
                <a role="button" href="{{route('register.view')}}" class="btn btn-primary">Cadastre-se</a>
            </div>
        @endguest
    </div>
</nav>
