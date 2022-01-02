<?php

namespace App\Http\Controllers\Admin;

use App\Models\Film;
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

    public function report()
    {
        //total number of monthly sales
        $films = Film::whereMonth('created_at', '=', date('1'))->whereYear('created_at', '2022')->get('price');
        $total_price = 0;
        foreach($films as $film)
        {   
            $total_price = $total_price + $film->price;
        }

        echo $total_price. "<br><br>";

        //total number of films purchased by customers
        $films = Film::get();
        $no_of_films = $film->count();
        echo $no_of_films."<br><br>";

        //Films that have Genre – ‘Action’
        $genre = Genre::where('name', 'Action')->get('id')->first();
        $genre_id = $genre->id;
        $films = Film::where('genre_id', $genre_id)->get();

        foreach($films as $film)
        {
            echo $film->name."<br>";
        }
        echo "<br>";

        //Fims that end with the character ‘s’
        $films = Film::where('name', 'LIKE', '%s')->get('name');
        foreach($films as $film)
        {
            echo $film."<br>";
        }
        echo "<br>";

        //Customers whose age is above 50
        $minDateToBeBornToBeFiftyYears = date('Y-m-d', strtotime('-50 years'));
        $users = User::whereDate('date_of_birth', '<=', $minDateToBeBornToBeFiftyYears)->get();

        foreach ($users as $user)
        {
            echo $user->date_of_birth."<br>";
        }

       
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
