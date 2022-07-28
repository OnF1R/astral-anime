<nav class="navbar mt-3 sticky-top">
        <div class="container-fluid header">
            <a href="{{ route('anime.main') }}" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
                <h3>Astral</h3>
                <img src="{{asset('images/logo/logo.png')}}" width="96" height="96" class="rounded-circle ms-4" alt="">
            </a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>