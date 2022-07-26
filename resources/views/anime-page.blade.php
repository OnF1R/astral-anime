<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include ('headlinks')
    <title>{{$animeData['animeTitle']}}</title>
</head>
<body>
    @include ('header')
    <div class="container anime_page_background mt-5">
        <div class="row anime_page_info_background pt-5">
            <div class="col-4 anime_page_img_block">
                <img src="{{$animeData['animeImg']}}" class="anime_page_img" alt="">
            </div>
            <div class="col anime_page_info">
                <p style="font-size: 150%"><strong>Title: {{ $animeData['animeTitle'] }}</strong></p>
                <p>@if(!empty($animeData['otherNames'])) Other names: {{ $animeData['otherNames'] }}@endif</p>
                <p>Type: {{ $animeData['type'] }}</p>
                <p>Release date: {{ $animeData['releasedDate'] }}</p>
                <p>Status: {{ $animeData['status'] }}</p>
                <p>Genres: @foreach($animeData['genres'] as $genre) <a href="">{{$genre}}</a> @endforeach</p>
                <p>Episodes availible: {{ $animeData['totalEpisodes'] }}</p>
                <a href="#video_player"><button type="button" class="btn btn-primary">Play</button></a>
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Add to list</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Favorite</a></li>
                            <li><a class="dropdown-item" href="#">Watched</a></li>
                            <li><a class="dropdown-item" href="#">Will watch</a></li>
                            <li><a class="dropdown-item" href="#">Abandoned</a></li>
                        </ul>
                </div>
            </div>
        <hr style="color: #8470FF">
        
        <div class="row mt-5">
            <div class="col anime_page_synopsis py-4 px-3">
                <p>{{ $animeData['synopsis'] }}</p>
            </div>
        </div>
        <div id="video_player" class="anime_page_video_player mt-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="vidcdn-tab" data-bs-toggle="tab" data-bs-target="#vidcdn" type="button" role="tab" aria-controls="vidcdn" aria-selected="true">
                    VIDCDN
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="streamsb-tab" data-bs-toggle="tab" data-bs-target="#streamsb" type="button" role="tab" aria-controls="streamsb" aria-selected="false">StreamSB</button>
            </li>
            </ul>
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="vidcdn" role="tabpanel" aria-labelledby="vidcdn-tab">
                <video id="player" width="100%" height="auto" autoplay="autoplay" controls src="https://goload.io/streaming.php?id=MjU2MTU=&title=Naruto+Episode+220&typesub=SUB"></video>
            </div>
            <div class="tab-pane fade" id="streamsb" role="tabpanel" aria-labelledby="streamsb-tab">
                <video id="player_2" width="100%" height="auto" autoplay="autoplay" controls>
                    <source src="https://goload.io/streaming.php?id=MjU2MTU=&title=Naruto+Episode+220&typesub=SUB" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                    <source src="https://goload.io/streaming.php?id=MjU2MTU=&title=Naruto+Episode+220&typesub=SUB" type='video/webm; codecs="vp8, vorbis"'>
                </video>
            </div>
            </div>
        </div>
    </div>
    @include ('footer')
</body>
</html>