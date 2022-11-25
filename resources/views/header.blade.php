@include('fetch-api-popup')
<nav class="navbar mt-3 sticky-top">
    <div class="container rounded header">
        <a href="{{ route('anime.main') }}" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
            <h3>Astral</h3>
            <img src="{{asset('images/logo/logo.png')}}" width="96" height="96" class="rounded-circle ms-4" alt="">
        </a>
        <a href="{{ route('anime.all')}}"><button class="btn search_button">All anime</button></a>
        @guest
        @if (Route::has('login'))
        <a href="{{ route('login') }}"><button class="btn search_button">{{ __('Login') }}</button></a>
        @endif

        @if (Route::has('register'))
        <a href="{{ route('register') }}"><button class="btn search_button">{{ __('Register') }}</button></a>
        @endif
        @else
        <div class="dropdown">
            <button class="btn search_button dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a> 
                </li>

                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        @endguest
        <div class="position-relative text-center"> <!-- me-5 style -->
            <form onsubmit="searchAnime(); return false;" action="" class="d-flex" method="get">
                <input id="searchForm" class="form-control me-2" type="search" pattern="^[a-zA-Z0-9\s]+$" placeholder="Search" aria-label="Search" required style="z-index: 2;">
                <button class="btn search_button" type="submit" style="z-index: 2;">Search</button>
            </form>
            <div id="result-container" class="result-container position-absolute rounded">
                <div id="loadingResult" class="loadingResult"></div>
                <div id="resultInfo" class=""></div>
            </div>
        </div>
    </div>
</nav>