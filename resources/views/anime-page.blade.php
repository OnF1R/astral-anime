<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include ('headlinks')
    <title>{{$animeData['animeTitle']}}</title>
    <link href="{{ asset('css/videojs-overlay.css') }}" rel='stylesheet'>
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
    <div id="videoContainer" class="container">
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
                    <div class="intro">
                        <div class="popout-video">
                            <div class="my-5 embed-responsive embed-responsive-16by9 position-relative" id="video-container">
                                <video onloadeddata="showNextEpisodeButton(); videoPopup();" name="1" id="video" class="embed-responsive-item video-js vjs-default-skin" preload="auto" controls></video>
                            </div>
                        </div>
                    </div>
                    <div class="container position-relative">
                        <div class="anime_page_series">
                            <div class="row anime_block rounded text-center">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-interval="10000000" data-bs-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        @for ($i = $animeData['totalEpisodes'] - 1; $i >= 0; $i--)
                                        @if ($i == $animeData['totalEpisodes']-1) <div class="carousel-item active"> @else <div class="carousel-item"> @endif
                                                <div class="col anime_page_episode_link_block">
                                                    <a id="{{$animeData['episodesList'][$i]['episodeNum']}}" class="anime_page_episode_link" onclick="changeEpisode(this)" href="#video">Episode: {{$animeData['episodesList'][$i]['episodeNum']}}</a>
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

                        </script>
                    </div>
                </div>
            </div>
        </div>
        <link href="https://vjs.zencdn.net/5.19.2/video-js.css" rel="stylesheet"><!-- https://videojs.com -->
        <style type="text/css">
            .video-js {
                font-size: 1rem;
                /* font-family: inherit; */
            }

            .video-js ul,
            .vjs-menu .vjs-menu-content {
                /* font-family: 'Poppins'; */
            }


            .video-js .vjs-big-play-button {
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                border-color: #5FCEF5;
                color: #5FCEF5;
            }

            .video-js:hover .vjs-big-play-button,
            .video-js .vjs-big-play-button:focus {
                border-color: #5FCEF5;
                color: white;
                transition: 0.4s;
                background-color: rgba(43, 51, 63, 0.7);
            }

            /* .video-js:hover .vjs-big-play-button:before, .video-js:hover .vjs-play-control:before {
                color: white;
                transition: 0.3s;
            } */

            .video-dimensions {
                width: auto;
                height: 730px;
            }

            .video-js .vjs-overlay-background {
                width: auto;
                padding: 10px 15px;
                background-color: rgba(95, 206, 245, 0.6);
            }

            /* .vjs-icon-play:before, .video-js .vjs-big-play-button:before, .video-js .vjs-play-control:before {
                color: #5FCEF5;
                transition: 0.3s;
                
            } */
        </style>
        <script src="https://vjs.zencdn.net/5.19.2/video.js"></script><!-- https://videojs.com -->
        <script src="{{ asset('js/hls.min.js') }}"></script><!-- https://github.com/video-dev/hls.js -->
        <script src="{{ asset('js/videojs5-hlsjs-source-handler.min.js') }}"></script><!-- https://github.com/streamroot/videojs-hlsjs-plugin -->
        <script src="{{ asset('js/vjs-quality-picker.js') }}"></script><!-- https://github.com/streamroot/videojs-quality-picker -->
        <script>
            var player = videojs('video');
            player.qualityPickerPlugin();

            player.src({
                src: '{{$firstEpisodeVidcdnSources}}',
                type: 'application/x-mpegURL'
            });

            player.play();
            player.pause();
        </script>
</body>
@include ('footer')
<script>
    function changeEpisodeButton() {
        var episode = document.getElementById('video').getAttribute('name');
        episode++;
        var link = '{{$vidcdnAnimeEpisodes}}{{$animeId}}-episode-' + episode;

        var request = new XMLHttpRequest();
        request.open('GET', link);
        request.responseType = 'json';
        request.send();
        request.onload = function() {
            var episodeUrl = request.response;

            var player = videojs('video');

            player.qualityPickerPlugin();

            player.src({
                src: episodeUrl['sources'][0]['file'],
                type: 'application/x-mpegURL'
            });
            player.pause();
            document.getElementById('video').setAttribute('name', episode);
            document.getElementById('nextEpisodeButton').remove();
            document.getElementById('nextEpisodeButtonControlBar').remove();
        }
    }

    function changeEpisode(el) {
        var episode = el.id;
        var link = '{{$vidcdnAnimeEpisodes}}{{$animeId}}-episode-' + episode;
        var request = new XMLHttpRequest();
        request.open('GET', link);
        request.responseType = 'json';
        request.send();
        request.onload = function() {
            var episodeUrl = request.response;

            var player = videojs('video');

            player.qualityPickerPlugin();

            player.src({
                src: episodeUrl['sources'][0]['file'],
                type: 'application/x-mpegURL'
            });
            player.pause();
            document.getElementById('video').setAttribute('name', episode);
            document.getElementById('nextEpisodeButton').remove();
            document.getElementById('nextEpisodeButtonControlBar').remove();
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

            var player = videojs('video');

            player.qualityPickerPlugin();

            player.src({
                src: episodeUrl['sources'][0]['file'],
                type: 'application/x-mpegURL'
            });
            player.pause();
            document.getElementById('video').setAttribute('name', episode);
            document.getElementById('nextEpisodeButton').remove();
            document.getElementById('nextEpisodeButtonControlBar').remove();
        }

    }

    function showNextEpisodeButton() {
        var episodeNum = document.getElementById('video').getAttribute('name');
        var player = window.player = videojs('video');
        if (Number(episodeNum) != Number('{{$animeData["totalEpisodes"]}}')) {
            player.overlay({
                content: '<a onclick="changeEpisodeButton(); return false;" style="text-decoration: none; color: #5FCEF5" title="Show next episode">Next Episode</a>',
                debug: false,
                overlays: [{
                    start: Math.floor(player.duration() - 95),
                    end: 'end',
                    align: 'bottom-right'
                }]
            });
        } else {
            player.overlay({
                content: '<a onclick="changeEpisodeButton(); return false;" style="text-decoration: none; color: #5FCEF5" title="Show next episode">Next Episode</a>',
                debug: false,
                overlays: [{
                    start: 'end',
                    end: 'end',
                    align: 'bottom-right'
                }]
            });
        }
        // el.onloadeddata = function(event) {
        //     const {
        //         videoHeight,
        //         videoWidth,
        //         duration
        //     } = event.srcElement
        //     console.log(duration)
        //     var episodeCurrentTime = setInterval(function() {
        //         console.log(el.currentTime);
        //         if (el.currentTime > duration - 100) {
        //             clearInterval(episodeCurrentTime);
        //             let nextEpisodeButton = document.createElement('div');
        //             let nextEpisodeButtonText = document.createElement('p');
        //             let buttonText = document.createTextNode("Next episode ->");
        //             nextEpisodeButton.setAttribute("class", "position-absolute");
        //             nextEpisodeButton.setAttribute("id", "nextEpisodeButton");
        //             nextEpisodeButton.style.top = "50%";
        //             nextEpisodeButton.style.left = "50%";

        //             nextEpisodeButton.style.backgroundColor = "red";
        //             nextEpisodeButtonText.appendChild(buttonText);
        //             nextEpisodeButton.appendChild(nextEpisodeButtonText);
        //             document.getElementById('video').appendChild(nextEpisodeButton);
        //             var player = videojs('video');
        //             var myButton = player.controlBar.addChild("button", {});
        //             var myButtonDom = myButton.el();
        //             myButtonDom.innerHTML = '>>';
        //             myButtonDom.setAttribute("id", "nextEpisodeButtonControlBar")
        //             myButtonDom.onclick = function() {
        //                 alert('Hello')
        //             };


        //         }
        //     }, 5000);
        // }
    }
</script>
<script src="{{ asset('js/carousel-script.js') }}"></script>
<script src="{{ asset('js/videojs-overlay.js') }}"></script>
<script>
    function videoPopup() {
        const introContainer = document.querySelector('.intro');
        const videoContainer = introContainer.querySelector('.popout-video');
        const video = videoContainer.querySelector('video');
        const videoPlayer = videoContainer.querySelector('#video');
        let videoHeight = videoContainer.offsetHeight;
        let videoWidth = videoContainer.offsetWidth;
        console.log(videoHeight,videoWidth);
        let rect = videoContainer.getBoundingClientRect();
        console.log(rect.top, rect.right, rect.bottom, rect.left);
        let coord = Math.round(rect.bottom + pageYOffset);
        const closeVideoBtn = document.querySelector('.close-video');

        let popOut = true;

        introContainer.style.height = `${videoHeight}px`;

        window.addEventListener('scroll', function(e) {
            if (window.scrollY > coord) {
                // only pop out the video if it wasnt closed before
                if (popOut) {
                    videoContainer.classList.add('popout-video--popout');
                    // set video container off the screen for the slide in animation
                    videoContainer.style.top = `-${videoHeight}px`;
                    videoPlayer.style.width = '640px';
                    videoPlayer.style.height = '360px';
                    videoPlayer.style.marginTop = `96px`;
                }
            } else {
                videoContainer.classList.remove('popout-video--popout');
                videoContainer.style.top = `0px`;
                videoPlayer.style.marginTop = `0px`;
                videoPlayer.style.width = `${videoWidth}px`;
                videoPlayer.style.height = `${videoHeight}px`;
                popOut = true;
            }
        });

        // close the video and prevent from opening again on scrolling + pause the video
        closeVideoBtn.addEventListener('click', function() {
            videoContainer.classList.remove('popout-video--popout');
            video.pause();
            popOut = false;
        });

        window.addEventListener('resize', function() {
            videoHeight = videoContainer.offsetHeight;
            introContainer.style.height = `${videoHeight}px`;
        });
    }
</script>

</html>