<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Anime;

use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    public function index()
    {
        $popularAnime = Http::acceptJson()->get('http://127.0.0.1:3000/popular');

        $animeData = json_decode($popularAnime, true);

        $getAnimeDetails = 'http://127.0.0.1:3000/anime-details/';

        $topAiring = Http::acceptJson()->get('http://127.0.0.1:3000/top-airing');

        $topAiringData = json_decode($topAiring, true);
        
        $page = 1;

        // $jsonPopularAnime = file_get_contents($getpopularAnimes . '?page=' . $page);

        // $jsonAnimeDetails = file_get_contents($getAnimeDetails . $animeData['animeId']);

        // $animeDetails = json_decode($jsonAnimeDetails,true);

        //$animes = Anime::where('on_going', '=', '1')->get();

        return view('main', compact('animeData', 'getAnimeDetails', 'topAiringData'));
    }

    public function allAnimes(Request $request)
    {
        $page = $request->page;

        $popularAnime = Http::acceptJson()->get('http://127.0.0.1:3000/popular' . '?page=' . $page);

        $animeData = json_decode($popularAnime, true);

        $getAnimeDetails = 'http://127.0.0.1:3000/anime-details/';

        //$animes = Anime::where('on_going', '=', '1')->get();

        return view('all-animes', compact('animeData', 'getAnimeDetails', 'page'));
    }

    public function animePage(Request $request)
    {
        $animeId = $request->id;

        $animeDetails = Http::acceptJson()->get('http://127.0.0.1:3000/anime-details/' . $animeId);

        $animeData = json_decode($animeDetails, true);

        $vidcdnAnimeEpisodes = 'http://127.0.0.1:3000/vidcdn/watch/';

        $streamsbAnimeEpisodes = 'http://127.0.0.1:3000/streamsb/watch/';

        if ($firstEpisodeNum = array_search('0', array_column($animeData['episodesList'], 'episodeNum'))) {
        } else $firstEpisodeNum = array_search('1', array_column($animeData['episodesList'], 'episodeNum'));
        

        // Vidcdn

        if ($firstEpisodeNum) {
            $firstEpisodeUrlVidcdn =  Http::acceptJson()->get($vidcdnAnimeEpisodes . $animeData['episodesList'][$firstEpisodeNum]['episodeId']);

            $firstEpisodeDataVidcdn = json_decode($firstEpisodeUrlVidcdn, true);

            $firstEpisodeVidcdnSources = $firstEpisodeDataVidcdn['sources'][0]['file'];
            $firstEpisodeVidcdnSources_bk = $firstEpisodeDataVidcdn['sources_bk'][0]['file'];
        }

        else {
            $firstEpisodeVidcdnSources = 'nothing';
            $firstEpisodeVidcdnSources_bk = 'nothing';
        }

        $error = [
            "error" => []
        ];

        // Vidcdn

        // StreamSB сделать плюс 0 серия

        // $firstEpisodeUrlStreamsb = $streamsbAnimeEpisodes . $animeData['episodesList'][$firstEpisodeNum]['episodeId'];

        // $jsonFirstEpisodeStreamsb = file_get_contents($firstEpisodeUrlStreamsb);

        // $firstEpisodeDataStreamsb = json_decode($jsonFirstEpisodeStreamsb, true);

        // $firstEpisodeStreamsb = $firstEpisodeDataStreamsb['data'][0]['file'];

        $firstEpisodeStreamsb = "nothing";

        // StreamSB

        return view('anime-page', compact('animeData', 'animeId', 'vidcdnAnimeEpisodes', 'streamsbAnimeEpisodes', 'firstEpisodeVidcdnSources', 'firstEpisodeVidcdnSources_bk', 'firstEpisodeStreamsb'));
    }

    

    public function create()
    {

        $anime_arr = [
            [
                'name' => 'Anime name',
                'description' => 'desc',
                'type' => 'ТВ Сериал',
                'studio' => 'ufotable',
                'release_year' => 2021,
                'image' => 'anime.jpg',
                'on_going' => 1,
                'views' => 123,
            ],
            [
                'name' => 'another Anime name',
                'description' => 'another desc',
                'type' => 'ТВ Сериал',
                'studio' => 'ufotable',
                'release_year' => 2021,
                'image' => 'anime.jpg',
                'on_going' => 0,
                'image' => 'another anime.jpg',
                'views' => 321,
            ],
        ];

        foreach ($anime_arr as $item) {
            Anime::create($item);
        };
    }

    public function update()
    {
        $anime = Anime::find(3);
        dump($anime);
        $anime->update([
            'name' => 'updated',
        ]);
    }

    public function delete()
    {
        $anime = Anime::find(2);
        $anime->delete();

        $anime_with_trash = Anime::withTrashed()->find(2);
        $anime_with_trash->restore();
    }

    public function firstOrCreate()
    {
        $another_anime = [
            'name' => 'Anime name',
            'description' => 'desc',
            'type' => 'ТВ Сериал',
            'studio' => 'ufotable',
            'release_year' => 2021,
            'image' => 'anime.jpg',
            'on_going' => 1,
            'views' => 123,
        ];

        $anime = Anime::firstOrCreate(
            [
                'name' => 'Anime name'
            ],
            [
                'name' => 'ultra Anime name',
                'description' => 'ultra desc',
                'type' => 'ТВ Сериал',
                'studio' => 'ufotable',
                'release_year' => 2013,
                'image' => 'anime.jpg',
                'on_going' => 1,
                'views' => 123,
            ]
        );

        dump($anime->description);
    }

    public function updateOrCreate()
    {
        $another_anime = [
            'name' => 'Anime name',
            'description' => 'desc',
            'type' => 'ТВ Сериал',
            'studio' => 'ufotable',
            'release_year' => 2021,
            'image' => 'anime.jpg',
            'on_going' => 1,
            'views' => 123,
        ];

        $anime = Anime::updateOrCreate(
            [
                'name' => 'Anime name'
            ],
            [
                'name' => 'Anime name',
                'description' => 'ultra desc',
                'type' => 'ТВ Сериал',
                'studio' => 'ufotable',
                'release_year' => 2018,
                'image' => 'anime.jpg',
                'on_going' => 1,
                'views' => 123,
            ]
        );
        dump($anime->name);
        dump($anime->description);
    }
}
