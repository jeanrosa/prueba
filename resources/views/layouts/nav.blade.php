<nav class="navbar navbar-expand-lg bg-body-tertiary p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route("user.index")}}"><strong>N</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route("notice.index")}}">Noticias</a>
                </li>
                
                @if (Auth::user()->rol_id == 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{route("user.index")}}">Usuarios</a>
                </li> 
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{route("logout")}}">Logout: <strong>{{ Auth::user()->name }}</strong></a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>