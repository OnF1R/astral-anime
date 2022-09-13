<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include ('headlinks')
    <link rel="stylesheet" href="{{ asset('css/own-carousel.css') }}">
    <script src="{{ asset('js/own-carousel.js') }}"></script>
    <title>Document</title>
</head>

<body>
    @include('header')
    <div class="main_anime_trend_container container-fluid mt-5 text-center fs-2 text-color-blue">TRENDING</div>
    <div class="main_anime_trend_container container-fluid mt-4  position-relative">
        <div class="container">
            <div class="own-carousel__container">
                <div class="row anime_block rounded text-center">
                    <div class="own-carousel__outer">
                        <div class="own-carousel">
                            @foreach ($topAiringData as $anime)
                            <div class="own-carousel__item">
                                <div class="col rounded_main_popular position-relative popular_anime_main scale m-2 p-0">
                                    <div class="works_item">
                                        <div class="img_container"><img loading="lazy" src="{{ $anime['animeImg'] }}" class="img_main_anime_display_hot works_image" alt=""></div>
                                        <div class="works_info">
                                            <div class="works_title">{{ $anime['animeTitle'] }}</div>
                                            <button name="{{ $anime['animeId'] }}" onclick="loadPopup(this)" type="button" class="btn main_page_watch_button" data-bs-toggle="modal" data-bs-target="#popupAnime">
                                                More...
                                            </button>
                                            <a href="{{ route('anime.page', ['id' => $anime['animeId']])}}"><button type="button" class="btn popup_watch_button mt-1">Watch</button></a>
                                        </div>
                                    </div>
                                    <!-- <object data="{{asset('images/svg/fire.svg')}}" width="64" height="64" class="hot-svg"> </object> -->
                                    <div class="col rounded mt-2">
                                        <p class="p-1 anime_name">{{ Str::limit($anime['animeTitle'], 20, $end = ' ...') }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="own-carousel__control">
                        <button class="control__prev control__prev__main"><</button>
                        <button class="control__next control__next__main">></button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="main_anime_trend_container container-fluid mt-5 text-center fs-2 text-color-blue">ANIME LIST</div>
    <div class="main_anime_list_container container-fluid mt-4 position-relative">
        <div class="container">
            @foreach($animeData as $anime)
            @if($loop->first || $loop->index % 5 == 0) <div class="row text-center"> @endif
                <div class="col rounded_main_popular position-relative popular_anime_main scale m-2 p-0">
                    <div class="works_item">
                        <div class="img_container"><img loading="lazy" src="{{ $anime['animeImg'] }}" class="img_main_anime_display_hot works_image" alt=""></div>
                        <div class="works_info">
                            <div class="works_title">{{ $anime['animeTitle'] }}</div>
                            <button name="{{ $anime['animeId'] }}" onclick="loadPopup(this);" type="button" class="btn main_page_watch_button" data-bs-toggle="modal" data-bs-target="#popupAnime">
                                More...
                            </button>
                            <a href="{{ route('anime.page', ['id' => $anime['animeId']])}}"><button type="button" class="btn popup_watch_button mt-1">Watch</button></a>
                        </div>
                    </div>
                    <!-- <object data="{{asset('images/svg/fire.svg')}}" width="64" height="64" class="hot-svg"> </object> -->
                    <div class="w-100"></div>
                    <div class="col rounded mt-2">
                        <p class="p-1 anime_name">{{ Str::limit($anime['animeTitle'], 20, $end = ' ...') }}</p>
                    </div>
                </div>
                <!-- Popup -->
                @if($loop->iteration % 5 == 0)
            </div> @endif
            @endforeach
        </div>
    </div>
    @include ('footer')
</body>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelector(".own-carousel__container").ownCarousel({
            itemPerRow: 5,
            itemWidth: 19.7,
            autoplay: 5000,
            nav: true,
            responsive: {
                1000: [4, 24],
                800: [3, 33],
                600: [2, 49],
                400: [1, 100]
            },
        });
        responsive();
    });
</script>
<script src="{{ asset('js/carousel-script.js') }}"></script>

</html>