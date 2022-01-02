<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\FilmController;
use App\Models\Film;
use App\Http\Controllers\Controller;


class AdminHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin_auth:admin');
    }

    public function index()
    {
        $film = Film::orderBy('id', 'DESC')->get();
        $data = ["films" => $film];
        return view('admin.home', $data);
    }
}
