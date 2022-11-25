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


    <div class="main_anime_trend_container container-fluid mt-5 text-center fs-2 text-color-blue">FILTER</div>
    <div class="main_anime_list_container container-fluid mt-4 position-relative">
        <div class="container">
            <form>
                <div class="mb-3">
                    <label for="genreSelector" class="form-label">Genre</label>
                    <select name="genre" id="genreSelect">
                        <option value="action">Action</option>
                        <option value="adventure">Adventure</option>
                        <option value="cars">Cars</option>
                        <option value="comedy">Comedy</option>
                        <option value="crime">Crime</option>
                        <option value="dementia">Dementia</option>
                        <option value="demons">Demons</option>
                        <option value="drama">Drama</option>
                        <option value="dub">Dub</option>
                        <option value="ecchi">Ecchi</option>
                        <option value="family">Family</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="game">Game</option>
                        <option value="gourmet">Gourmet</option>
                        <option value="harem">Harem</option>
                        <option value="historical">Historical</option>
                        <option value="horror">Horror</option>
                        <option value="josei">Josei</option>
                        <option value="kids">Kids</option>
                        <option value="magic">Magic</option>
                        <option value="martial-arts">Martial arts</option>
                        <option value="mecha">Mecha</option>
                        <option value="military">Military</option>
                        <option value="Mmusic">Mmusic</option>
                        <option value="mystery">Mystery</option>
                        <option value="parody">Parody</option>
                        <option value="police">Police</option>
                        <option value="romance">Romance</option>
                        <option value="samurai">Samurai</option>
                        <option value="school">School</option>
                        <option value="sci-fi">Sci-fi</option>
                        <option value="seinen">Seinen</option>
                        <option value="shoujo">Shoujo</option>
                        <option value="shoujo-ai">Shoujo-ai</option>
                        <option value="shounen">Shounen</option>
                        <option value="shounen-ai">Shounen-ai</option>
                        <option value="slice-of-Life">Slice of Life</option>
                        <option value="space">Space</option>
                        <option value="sports">Sports</option>
                        <option value="super-power">Super power</option>
                        <option value="supernatural">Supernatural</option>
                        <option value="suspense">Suspense</option>
                        <option value="thriller">Thriller</option>
                        <option value="vampire">Vampire</option>
                        <option value="yaoi">Yaoi</option>
                        <option value="yuri">Yuri</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ReleaseDateInput" class="form-label">Password</label>
                    <input type="number" min="1900" max="2099" step="1" value="2018" />
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn search_button">Search</button>
            </form>
        </div>
    </div>

    <div class="main_anime_trend_container container-fluid mt-5 text-center fs-2 text-color-blue">ANIME LIST</div>
    <div class="main_anime_list_container container-fluid mt-4 position-relative">
        <div class="container">
            @foreach($animeData as $anime)
            @if($loop->first || $loop->index % 5 == 0) <div class="row justify-content-center text-center"> @endif
                <div class="col align-self-center rounded_main_popular position-relative popular_anime_main scale m-2 p-0">
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
                    <div class="w-100"></div>
                    <div class="col rounded mt-2">
                        <p class="p-1 anime_name">{{ Str::limit($anime['animeTitle'], 20, $end = ' ...') }}</p>
                    </div>
                </div>
                @if($loop->iteration % 5 == 0)
            </div> @endif
            @endforeach
        </div>
        <div class="container text-center mt-2">
            <div class="own-carousel__container">
                <div class="own-carousel__outer">
                    <div class="own-carousel">
                        @for ($i = 1; $i < 572; $i++) <div class="own-carousel__item">
                            <a href="{{ route('anime.all', ['page' => $i])}}"><button class="btn popup_watch_button">{{$i}}</button></a>
                    </div>
                    @endfor
                </div>
            </div>
            <div class="own-carousel__control">
                <button class="control__prev">«</button>
                <button class="control__next">»</button>
            </div>

        </div>
    </div>
    </div>

    @include ('footer')
    @include('fetch-api-popup')
</body>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelector(".own-carousel__container").ownCarousel({
            itemPerRow: 20,
            itemWidth: 5,
            loop: false,
            nav: true,
            draggable: false,
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

</html>