<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Anime;

class AnimeController extends Controller
{
    public function index() {
        $first_anime = Anime::find(1);
        $need_anime = Anime::where('release_year', 2022)->get();
        $all_animes = Anime::all();
        foreach ($all_animes as $anime) {
            dump($anime->name);
        }
        dump($need_anime);
    }

    public function create() {

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

        foreach($anime_arr as $item) {
            Anime::create($item);
        };
    }

    public function update() {
        $anime = Anime::find(3);
        dump($anime);
        $anime->update([
            'name' => 'updated',
        ]);
    }
    
    public function delete() {
        $anime = Anime::find(2);
        $anime->delete();

        $anime_with_trash = Anime::withTrashed()->find(2);
        $anime_with_trash->restore();
    }
    
    public function firstOrCreate() {
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

        $anime = Anime::firstOrCreate([
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
        ]);

        dump($anime->description);
    }

    public function updateOrCreate() {
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

        $anime = Anime::updateOrCreate([
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
        ]);
        dump($anime->name); 
        dump($anime->description); 
    }
}
