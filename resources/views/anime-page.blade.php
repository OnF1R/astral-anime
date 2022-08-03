<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include ('headlinks')
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <title>{{$animeData['animeTitle']}}</title>
</head>

<body>
    @include ('header')
    <div class="container-fluid py-5 anime_page_background">
        <div class="container anime_page_rounded anime_page_info_background">
            <div class="row py-4 mb-4">
                <div class="col-4 anime_page_info anime_page_img_block">
                    <img loading="lazy" src="{{$animeData['animeImg']}}" class="anime_page_rounded anime_page_img" alt="">
                </div>
                <div class="col anime_page_info">
                    <p style="font-size: 150%"><strong>Title: {{ $animeData['animeTitle'] }}</strong></p>
                    <p>@if(!empty($animeData['otherNames'])) Other names: {{ $animeData['otherNames'] }}@endif</p>
                    <p>Type: {{ $animeData['type'] }}</p>
                    <p>Release date: {{ $animeData['releasedDate'] }}</p>
                    <p>Status: {{ $animeData['status'] }}</p>
                    <p>Genres: @foreach($animeData['genres'] as $genre) <a href="">{{$genre}}</a> @endforeach</p>
                    <p>Episodes availible: {{ $animeData['totalEpisodes'] }}</p>
                    <a href="#video_player"><button type="button" class="btn anime_page_watch_button">Watch</button></a>
                    <button class="btn anime_page_watch_button dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Add to list</button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Favorite</a></li>
                        <li><a class="dropdown-item" href="#">Watched</a></li>
                        <li><a class="dropdown-item" href="#">Will watch</a></li>
                        <li><a class="dropdown-item" href="#">Abandoned</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container anime_page_rounded anime_page_info_background mt-3">
            <div class="row">
                <div class="col anime_page_synopsis py-4 px-3">
                    <p>{{$animeData['synopsis']}}</p>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <!-- <script>
            fetch("https://gogoanime.herokuapp.com/vidcdn/watch/naruto-episode-220")
                .then((response) => response.json())
                .then((animelist) => console.log(animelist));
        </script> -->

        <div id="video_player" class="anime_page_video_player mt-5">
            <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
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
                    <video id="video-{{$animeId}}" loading="lazy" width="100%" height="auto" preload="none" controls class="videoCentered"></video>
                    <script>
                        if (Hls.isSupported()) {
                            var video = document.getElementById('video-{{$animeId}}');
                            var hls = new Hls();
                            hls.loadSource('{{$firstEpisodeVidcdnSources}}');
                            hls.loadSource('{{$firstEpisodeVidcdnSources_bk}}');
                            hls.attachMedia(video);
                        }
                    </script>
                    <div class="container position-relative">
                        <div class="anime_page_series">
                            <div class="row anime_block rounded text-center">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-interval="false" data-bs-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        @for ($i = $animeData['totalEpisodes'] - 1; $i >= 0; $i--)
                                        @if ($i == $animeData['totalEpisodes']-1) <div class="carousel-item active"> @else <div class="carousel-item"> @endif
                                                <div class="col anime_page_episode_link_block">
                                                    <a id="{{$animeData['episodesList'][$i]['episodeId']}}" class="anime_page_episode_link" onclick="changeEpisode(this)" href="#video_player">Episode: {{$animeData['episodesList'][$i]['episodeNum']}}</a </div>
                                                </div>
                                            </div>
                                            @endfor
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
                    </div>
                    <div class="row mt-4 text-center">
                        <form id="changeEpisodeForm" onsubmit="changeEpisodeForm(); return false;">
                            <div class="col">
                                <label class="form-label px-2">Change episode to:</label>
                                <input id="changeEpisodeInput" type="number" class="form-control anime_page_episode_num_form px-2" required>
                                <button type="submit" class="btn btn-primary px-2">Change</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="streamsb" role="tabpanel" aria-labelledby="streamsb-tab">
                        <video loading="lazy" id="video-{{$animeId}}-2" width="100%" height="auto" preload="none" controls class="videoCentered"></video>
                        <script>
                            if (Hls.isSupported()) {
                                var video = document.getElementById('video-{{$animeId}}-2');
                                var hls = new Hls();
                                hls.loadSource('{{$firstEpisodeStreamsb}}');
                                hls.attachMedia(video);
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        @include ('footer')
</body>
<script>
    function changeEpisode(el) {
        var episode = el.id;
        var request = new XMLHttpRequest();
        request.open('GET', '{{$vidcdnAnimeEpisodes}}' + episode);
        request.responseType = 'json';
        request.send();
        request.onload = function() {
            var episodeUrl = request.response;
            var video = document.getElementById('video-{{$animeId}}');
            if (Hls.isSupported()) {
                var hls = new Hls();
                hls.loadSource(episodeUrl['sources'][0]['file']);
                hls.attachMedia(video);
            }
        }
    }

    function changeEpisodeForm() {
        var episode = document.getElementById('changeEpisodeInput').value;
        var request = new XMLHttpRequest();
        request.open('GET', '{{$vidcdnAnimeEpisodes}}{{$animeId}}-episode-' + episode);
        request.responseType = 'json';
        request.send();
        request.onload = function() {
            var episodeUrl = request.response;
            var video = document.getElementById('video-{{$animeId}}');
            if (Hls.isSupported()) {
                var hls = new Hls();
                hls.loadSource(episodeUrl['sources'][0]['file']);
                hls.attachMedia(video);
            }
        }
    }
</script>
<script src="{{ asset('js/carousel-script.js') }}"></script>

</html>