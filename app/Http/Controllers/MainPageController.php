<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Anime;

class MainPageController extends Controller
{
    public function index() {
        $anime = Anime::find(1);
        dd($anime->name);
    }
}
