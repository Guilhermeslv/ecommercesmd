<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap py-2 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{route('home')}}">Pokemon Store</a>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger me-2">Sair</button>
            </form>
        </div>
    </div>
</header>
