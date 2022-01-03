<?php

namespace App\Http\Controllers\Admin;

use App\Models\Film;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\User;
use App\Models\Genre;
use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminFilmController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_film');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFilmRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required'],
            'genre' => ['required'],

        ]);

        $film = new Film();
        $film->name = $request->name;
        $film->description = $request->description;
        $film->price = $request->price;
        $film->genre_id = $request->genre;

        if($film->save())
        {
            return redirect(route('admin_home'))->with("message", "Film added successfully");
        }
        else 
        {
            return back()->withErrors(["error" => "An error occured. Please try again."]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        $data = ["film" => $film];
        return view("admin.edit_film", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFilmRequest  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        $film->name = ($request->name != null) ? $request->name : $film->name;
        $film->description = ($request->description != null) ? $request->description : $film["description"];
        $film->price = ($request->price != null) ? $request->price : $film["price"];
        $film->genre_id = ($request->genre != null) ? $request->genre : $film["genre_id"];

        if($film->save())
        {
            return back()->with("message", "Film updated successfully");
        }
        else 
        {
            return back()->withErrors(["error" => "An error occured. Please try again."]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        if($film->delete())
        {
            return redirect(route('admin_home'))->with('message','Film successfully deleted'); //can't return back because the info on that page doesn't exist
        }
        else 
        {
            return back()->withErrors(["error" => "An error occured. Please try again."]);
        }
    }
}
