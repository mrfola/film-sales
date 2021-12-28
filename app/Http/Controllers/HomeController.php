<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FilmController;
use App\Models\Film;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $film = new FilmController();
        $data = ["films" => $film->index()];
        //var_dump($data);
        return view('home', $data);
    }
}
