<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar mt-3 sticky-top">
        <div class="container header">
            <a href="{{ route('anime.index') }}" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
                <h3>Astral</h3>
                <img src="{{asset('images/logo/logo.png')}}" width="96" height="96" class="rounded-circle ms-4" alt="">
            </a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="main_anime_trend_container rounded container mt-4  position-relative">
        <div class="container_name_poster position-absolute">Trending</div>
            <div class="row anime_block rounded text-center">
                @for ($i = 0; $i < 5; $i++)
                <div class="col rounded_main_popular position-relative popular_anime_main scale m-2 p-0">
                    <div class="works_item">
                        <img src="{{ $animeData[$i]['animeImg'] }}"  class="img_main_anime_display_hot works_image" alt="">
                        <div class="works_info">
                            <div class="works_title">{{ $animeData[$i]['animeTitle'] }}</div>
                            <div class="works_text">{{ $animeData[$i]['releasedDate'] }}</div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{ $animeData[$i]['animeId'] }}">
                                More...
                            </button>
                        </div>
                    </div>
                        <object data="{{asset('images/svg/fire.svg')}}" width="64" height="64" class="hot-svg"> </object>
                        <div class="w-100"></div>
                    <div class="col rounded mt-2"><p class="p-1 anime_name">{{ $animeData[$i]['animeTitle'] }}</p></div>
                </div>
                @include('popup')
                @endfor
        </div>
    </div>

    <div class="main_news_container container mt-5 position-relative">
        <div class="container_name_poster position-absolute">News&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div class="row text-center align-items-center">
                @for ($i = 5; $i < 9; $i++)
                    <div class="col position-relative">
                        <img src="{{ $animeData[$i]['animeImg'] }}"  class="img_main_news" alt="">
                    </div>
                @endfor
            </div>
            <div class="row mt-3 text-center align-items-center">
                @for ($i = 9; $i < 10; $i++)
                        <div class="col position-relative">
                            <img src="{{ $animeData[$i]['animeImg'] }}"  class="img_main_news" alt="">
                        </div>
                @endfor
            </div>
    </div>
    <div class="main_anime_list_container container mt-4 position-relative">
        <div class="container_name_poster position-absolute">Anime list</div>
                <div class="row text-center">
                    @for ($i = 10; $i < 15; $i++)
                    <div class="col rounded_main_popular position-relative popular_anime_main scale m-2 p-0">
                    <div class="works_item">
                        <img src="{{ $animeData[$i]['animeImg'] }}"  class="img_main_anime_display_hot works_image" alt="">
                        <div class="works_info">
                            <div class="works_title">{{ $animeData[$i]['animeTitle'] }}</div>
                            <div class="works_text">{{ $animeData[$i]['releasedDate'] }}</div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{ $animeData[$i]['animeId'] }}">
                                More...
                            </button>
                        </div>
                    </div>
                        <object data="{{asset('images/svg/fire.svg')}}" width="64" height="64" class="hot-svg"> </object>
                        <div class="w-100"></div>
                    <div class="col rounded mt-2"><p class="p-1 anime_name">{{ $animeData[$i]['animeTitle'] }}</p></div>
                </div>
                @include('popup')
                @endfor
                </div>
                <div class="row text-center">
                    @for ($i = 15; $i < 20; $i++)
                    <div class="col rounded_main_popular position-relative popular_anime_main scale m-2 p-0">
                    <div class="works_item">
                        <img src="{{ $animeData[$i]['animeImg'] }}"  class="img_main_anime_display_hot works_image" alt="">
                        <div class="works_info">
                            <div class="works_title">{{ $animeData[$i]['animeTitle'] }}</div>
                            <div class="works_text">{{ $animeData[$i]['releasedDate'] }}</div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{ $animeData[$i]['animeId'] }}">
                                More...
                            </button>
                        </div>
                    </div>
                        <object data="{{asset('images/svg/fire.svg')}}" width="64" height="64" class="hot-svg"> </object>
                        <div class="w-100"></div>
                    <div class="col rounded mt-2"><p class="p-1 anime_name">{{ $animeData[$i]['animeTitle'] }}</p></div>
                </div>
                @include('popup')
                @endfor
                </div>
                        <!-- <div class="works_item">
                            <img src="{{asset('images/poster2.jpg')}}" class="img_main_anime_display_hot works_image" alt="">
                            <div class="works_info">
                                <div class="works_title">САО</div>
                                <div class="works_text">Описание</div>
                            </div>
                        </div> -->
        </div>
    </div>
    <footer class="mt-4">
        <div class="footer_info container">

        </div>
        <div class="footer_link container navbar-fixed-bottom">

        </div>
    </footer>
</body>
</html>