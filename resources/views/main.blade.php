<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include ('headlinks')
    <title>Document</title>
</head>
<body>
    @include('header')
    <div class="main_anime_trend_container container-fluid mt-5 text-center fs-2 text-color-blue">TRENDING</div>
    <div class="main_anime_trend_container container-fluid mt-4  position-relative">
        @foreach ($topAiringData as $anime)
        @include('popup')
        @endforeach
        <div class="container">
            <div class="row anime_block rounded text-center">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                    @foreach ($topAiringData as $anime)
                        @if ($loop->first) <div class="carousel-item active"> @else <div class="carousel-item"> @endif
                        <div class="col rounded_main_popular position-relative popular_anime_main scale m-2 p-0">
                            <div class="works_item">
                                <img src="{{ $anime['animeImg'] }}"  class="img_main_anime_display_hot works_image" alt="">
                                <div class="works_info">
                                    <div class="works_title">{{ $anime['animeTitle'] }}</div>
                                    <button type="button" class="btn main_page_watch_button" data-bs-toggle="modal" data-bs-target="#id-{{$anime['animeId']}}">
                                        More...
                                    </button>
                                </div>
                            </div>
                                <!-- <object data="{{asset('images/svg/fire.svg')}}" width="64" height="64" class="hot-svg"> </object> -->
                                <div class="w-100"></div>
                            <div class="col rounded mt-2"><p class="p-1 anime_name">{{ $anime['animeTitle'] }}</p></div>
                        </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
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
                                <img src="{{ $anime['animeImg'] }}" class="img_main_anime_display_hot works_image" alt="">
                                <div class="works_info">
                                    <div class="works_title">{{ $anime['animeTitle'] }}</div>
                                    <button type="button" class="btn main_page_watch_button" data-bs-toggle="modal" data-bs-target="#id-{{$anime['animeId']}}">
                                        More...
                                    </button>
                                </div>
                            </div>
                                <!-- <object data="{{asset('images/svg/fire.svg')}}" width="64" height="64" class="hot-svg"> </object> -->
                                <div class="w-100"></div>
                            <div class="col rounded mt-2"><p class="p-1 anime_name">{{ $anime['animeTitle'] }}</p></div>
                        </div>
                @include('popup')
                @if($loop->iteration % 5 == 0) </div> @endif
                @endforeach
        </div>
    </div>
    @include ('footer')
</body>
<script src="{{ asset('js/carousel-script.js') }}"></script>
</html>