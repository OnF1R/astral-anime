<!-- Modal -->
@php
$jsonAnimeDetails = file_get_contents($getAnimeDetails . $animeData[$i]['animeId']);
$animeDetails = json_decode($jsonAnimeDetails,true);
@endphp
<div class="modal fade" id="{{ $animeData[$i]['animeId'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-5 position-relative"><img src="{{ $animeData[$i]['animeImg'] }}" alt="" class="img_main_anime_display_hot" style="height: 400px;">
                    <div class="position-absolute popup_buttons"><a href="{{ route('anime.page', ['id' => $animeData[$i]['animeId']])}}"><button type="button" class="btn btn-primary">Watch</button></a>
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Add to list
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Favorite</a></li>
                                <li><a class="dropdown-item" href="#">Watched</a></li>
                                <li><a class="dropdown-item" href="#">Will watch</a></li>
                                <li><a class="dropdown-item" href="#">Abandoned</a></li>
                            </ul>
                        </div>
                    </div>
                        
                            
                    <div class="col popup_anime_info pt-3">
                        <p><strong>Title: {{ $animeDetails['animeTitle'] }}</strong></p>
                        <p>@if(!empty($animeDetails['otherNames'])) Other names: {{ $animeDetails['otherNames'] }}@endif</p>
                        <p>Type: {{ $animeDetails['type'] }}</p>
                        <p>Release date: {{ $animeDetails['releasedDate'] }}</p>
                        <p>Status: {{ $animeDetails['status'] }}</p>
                        <p>Genres: @foreach($animeDetails['genres'] as $genre) <a href="">{{$genre}}</a> @endforeach</p>
                        <p>Episodes availible: {{ $animeDetails['totalEpisodes'] }}</p>
                        <p></p>
                    </div>
                    
                </div>
                <div class="row mt-4 m-2">
                    <div class="col popup_anime_synopsis p-2">
                        {{ $animeDetails['synopsis'] }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>